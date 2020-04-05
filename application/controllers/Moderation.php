<?php
class Moderation extends CI_Controller
{
    
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('moderation_model');
    }
    
    function index()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');
            
        $data['page_title'] = 'Moderation';
        load_view('moderation/index', $data);
    }

    function login()
    {
        $data['page_title'] = 'Moderation';
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
			load_view('moderation/login',  $data);
		else
		{
            
		    if ($this->session->has_userdata('logged'))
                redirect('index');

            $username = get_post('username');

            if ($this->moderation_model->moderator_exists($username))
            {
                $moderator_data = $this->moderation_model->get_moderator_data($username);
                $password = get_post('password');

                if ($password == $moderator_data['password'])
                {
                    $session_data =
                    [
                        'username' => $username,
                        'logged' => TRUE,
                        'department_id' => $moderator_data['department_id'],
                        'level_id' => $moderator_data['level_id'],
                    ];

                    $this->session->set_userdata($session_data);
                    redirect('moderation');
                }
                else
                {
                    $data['custom_error'] = 'Invalid username or password!';
                    load_view('moderation/login',  $data);
                }
            }
            else
            {
                $data['custom_error'] = 'Invalid username or password!';
                load_view('moderation/login',  $data);
            }
        }
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('index');
    }
    
    function add_resource()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        
        $this->form_validation->set_rules('resource_name', 'Resource Name', 'required|max_length[50]|is_unique[resources.title]',
        ['is_unique' => 'This resource name already exists!']);
        $this->form_validation->set_rules('resource_desc', 'Description', 'required|max_length[2000]');
        
        if ($this->form_validation->run() == FALSE)
            load_view('moderation/add_resource',  $data);
        else
        {
            $category_id = get_post('category');

            $config['upload_path'] = './assets/resources/files/';
			$config['file_name'] = url_title(strtolower(get_post('resource_name')));
            $config['allowed_types'] = get_allowed_file_types($category_id);
            $config['max_size'] = get_max_file_size($category_id);

            $this->load->library('upload', $config);
			if (! $this->upload->do_upload('resource_file'))
			{
				$data['custom_error'] = 'The following errors occured:<br>' . $this->upload->display_errors();
				load_view('moderation/add_resource', $data);
			}
            else
            {
                $entries =
                [
                    'title' => get_post('resource_name'),
                    'course_id' => get_post('course'),
                    'level_id' => $this->session->userdata('level_id'),
                    'category_id' => $category_id,
                    'description' => get_post('resource_desc'),
                    'file' => $this->upload->data('file_name'),
                ];

                $this->moderation_model->add_resource($entries);
                $this->session->set_flashdata('resource_added', 'The resource was added successfully!');
                load_view('moderation/add_resource', $data);
            }
        }
    }

    function manage_resource ($category_id = 0, $course_id = 0, $items_offset = 0)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            redirect('moderation/manage_resource/' . get_post('category') . '/' . get_post('course'));
        }
        else
        {
            $items_per_page = 30;
            $total_items = count($this->moderation_model->get_resources($category_id, $course_id));

            $this->load->library('pagination');

            $pagination_config = get_pagination_config(base_url('moderation/manage_resource/' . $category_id . '/' . $course_id),
                $total_items, $items_per_page);
            //$pagination_config['uri_segement'] = 4;

            $this->pagination->initialize($pagination_config);

            $data['resources'] = $this->moderation_model->get_limited_resources($category_id, $course_id, $items_per_page, $items_offset);
            $data['pagination'] = $this->pagination->create_links();
            load_view('moderation/manage_resource', $data);
        }
    }

    function add_news()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        
        $this->form_validation->set_rules('news_title', 'News Title', 'required|max_length[200]|is_unique[news.title]',
        ['is_unique' => 'This news title already exists!']);
        $this->form_validation->set_rules('news_content', 'Description', 'required|max_length[5000]');
        
        if ($this->form_validation->run() == FALSE)
            load_view('moderation/add_news',  $data);
        else
        {
            $entries = 
            [
                'title' => get_post('news_title'),
                'content' => get_post('news_content'),
                'category_id' => get_post('category'),
                'department_id' => $this->session->userdata('department_id'),
                'level_id' => $this->session->userdata('level_id'),
            ];

            $this->moderation_model->add_news($entries);
            $this->session->set_flashdata('news_added', 'The news was added successfully!');
            load_view('moderation/add_news',  $data);
        }
    }

    function manage_news ($category_id = 0, $items_offset = 0)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            redirect('moderation/manage_news/' . get_post('category'));
        }
        else
        {
            $items_per_page = 30;
            $total_items = count($this->moderation_model->get_news_items($category_id));

            $this->load->library('pagination');

            $pagination_config = get_pagination_config(base_url('moderation/manage_news/' . $category_id),
                $total_items, $items_per_page);
            
            $this->pagination->initialize($pagination_config);

            $data['news'] = $this->moderation_model->get_limited_news_items($category_id, $items_per_page, $items_offset);
            $data['pagination'] = $this->pagination->create_links();
            load_view('moderation/manage_news', $data);
        }
    }

    function add_course()
    {
        $data['page_title'] = 'Moderation';

        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $this->form_validation->set_rules('course_title', 'Course Title', 'required|min_length[4]|max_length[60]|is_unique[courses.course_title]',
            ['is_unique' => 'This course title is already added!']);
        $this->form_validation->set_rules('course_code', 'Course Code', 'required|min_length[3]|max_length[12]|is_unique[courses.course_code]',
            ['is_unique' => 'This course code is already added!']);
        
        if ($this->form_validation->run() == FALSE)
			load_view('moderation/index',  $data);
		else
		{
            $entries = 
            [
                'course_title' => get_post('course_title'),
                'course_code' => get_post('course_code'),
                'department_id' => $this->session->userdata('department_id'),
                'level_id' => $this->session->userdata('level_id'),
            ];

            $this->moderation_model->add_course($entries);
            $this->session->set_flashdata('course_added', 'The course was added successfuly!');
            load_view('moderation/index',  $data);
        }
    }

    function edit_resource ($resource_id)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        $data['resource'] = $this->moderation_model->get_resource($resource_id);

        $this->form_validation->set_rules('resource_name', 'Resource Name', 'required|max_length[50]');
        $this->form_validation->set_rules('resource_desc', 'Description', 'required|max_length[2000]');
        
        if ($this->form_validation->run() == FALSE)
            load_view('moderation/edit_resource',  $data);
        else
        {
            $entries = 
            [
                'title' => get_post('resource_name'),
                'course_id' => get_post('course'),
                'description' => get_post('resource_desc'),
            ];

            $this->moderation_model->update_resource($resource_id, $entries);
            $this->session->set_flashdata('resource_modified', 'The resource was modified successfuly!');
            load_view('moderation/edit_resource',  $data);
        }
    }

    function remove_resource ($resource_id)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';

        $resource = $this->moderation_model->get_resource($resource_id);
        $resource_file = './assets/resources/files/' . $resource['file'];

        $data['resource'] = $resource;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->moderation_model->remove_resource($resource_id);
            unlink($resource_file);

            $this->session->set_flashdata('resource_removed', 'The resource was removed successfuly!');
            redirect('moderation/manage_resource');
        }
        else
        {
            load_view('moderation/remove_resource',  $data);
        }
    }

    function edit_news ($news_id)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        $data['news_item'] = $this->moderation_model->get_news_item($news_id);

        $this->form_validation->set_rules('news_title', 'News Title', 'required|max_length[200]');
        $this->form_validation->set_rules('news_content', 'Description', 'required|max_length[5000]');
        
        if ($this->form_validation->run() == FALSE)
            load_view('moderation/edit_news',  $data);
        else
        {
            $entries = 
            [
                'title' => get_post('news_title'),
                'category_id' => get_post('category'),
                'content' => get_post('news_content'),
            ];

            $this->moderation_model->update_news_item($news_id, $entries);
            $this->session->set_flashdata('news_modified', 'The news/update was modified successfuly!');
            load_view('moderation/edit_news',  $data);
        }
    }

    function remove_news ($news_id)
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';

        $news_item = $this->moderation_model->get_news_item($news_id);

        $data['news_item'] = $news_item;

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->moderation_model->remove_news_item($news_id);
            $this->session->set_flashdata('news_removed', 'The news/update was removed successfuly!');
            redirect('moderation/manage_news');
        }
        else
        {
            load_view('moderation/remove_news',  $data);
        }
    }

    public function reset_password ($verification_code = NULL)
	{
		$data['page_title'] = 'Reset Password';

		if ($verification_code == NULL)
		{
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');

			if ($this->form_validation->run() == FALSE)
				load_view('moderation/reset_password', $data);
			else
			{
				$email = get_post('email');
				if ($this->moderation_model->moderator_email_exists($email))
				{
					if ($this->moderation_model->requested_password_reset($email))
					{
						$reset_data = $this->moderation_model->get_verification_data ($email);
						$data['code_already_sent'] = TRUE;
						$data['id'] = $reset_data['id'];
						$data['verification_code'] = $reset_data['verification_code'];
						load_view('moderation/reset_password_code_sent', $data);
					}
					else
					{
						$temp = openssl_random_pseudo_bytes(16);
						$verification_code = bin2hex($temp);
						$this->moderation_model->insert_verification_data($email, $verification_code);
						
						$this->load->library('email');
						$link = site_url('moderation/reset_password/' . $verification_code);

						$message = <<<_END
							<p>Hello!<br> You requested a password reset for your Campus Space Moderator account.</p>
							<p>Click here {$link} to reset your password now.</p>

							<p>
								You received this email because a password reset was requested for the account of which this email address was registered with.
								If you did not make such request, please ignore this email completely!
							</p>
_END;

						$this->email->from('admin@campusspace.com.ng', 'Campus Space');
						$this->email->to($email);
						$this->email->subject('Password Reset');
						$this->email->message(generate_email_page($message));

						if ($this->email->send())
						{
							$reset_data = $this->moderation_model->get_verification_data ($email);
							$data['code_sent'] = TRUE;
							$data['id'] = $reset_data['id'];
							$data['verification_code'] = $verification_code;
							load_view('moderation/reset_password_code_sent', $data);
						}
						else
						{
							$data['custom_error'] = 'Your email address is not reachable, please try again later!';
							load_view('moderation/reset_password', $data);
						}
					}
				}
				else
				{
					$data['custom_error'] = 'This email is not registered!';
					load_view('moderation/reset_password', $data);
				}
			}
		}
		else
		{
			$reset_data = $this->moderation_model->get_verification_data_via_code($verification_code);
			if ($reset_data)
			{
				$email = $reset_data['email'];
				$data['email'] = $email;
				load_view('moderation/finish_password_reset', $data);
			}
			else
			{
				redirect();
			}
		}
	}

	public function resend_verification_link ($id)
	{
		$data['page_title'] = 'Reset Password';

		$reset_data = $this->moderation_model->get_verification_data_via_id ($id);
		if (! $reset_data)
		{
			redirect();
			return;
		}

		$email = $reset_data['email'];
		$verification_code = $reset_data['verification_code'];

		$this->load->library('email');
		$link = site_url('moderation/reset_password/' . $verification_code);

		$message = <<<_END
			<p>Hello!<br> You requested a password reset for your Campus Space Moderator account.</p>
			<p>Click here {$link} to reset your password now.</p>

			<p>
				You received this email because a password reset was requested for the account of which this email address was registered with.
				If you did not make such request, please ignore this email completely!
			</p>
_END;

        $this->email->from('admin@campusspace.com.ng', 'Campus Space');
		$this->email->to($email);
		$this->email->subject('Password Reset');
		$this->email->message(generate_email_page($message));

		if ($this->email->send())
		{
			$data['code_resent'] = TRUE;
			$data['id'] = $id;
			$data['verification_code'] = $verification_code;
			load_view('moderation/reset_password_code_sent', $data);
		}
		else
		{
			$data['custom_error'] = 'Your email address is not reachable, please try again later!';
			load_view('moderation/reset_password', $data);
		}
	}

	public function finish_password_reset()
	{
		$data['page_title'] = 'Reset Password';
		$data['email'] = get_post('email');

		$this->form_validation->set_rules('npassword', 'New Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[npassword]');
		
		if ($this->form_validation->run() == FALSE)
			load_view('moderation/finish_password_reset', $data);
		else
		{
			$email = $data['email'];

			if ($this->moderation_model->moderator_email_exists($email))
			{
				$password = get_post('npassword');
		
				if ($this->moderation_model->update_moderator($email, ['password' => $password]))
				{
					$this->moderation_model->remove_verification_data($email);
					$this->session->set_flashdata('password_reset', 'Your password reset was successful. You can login now!');
					redirect('moderation/login');
				}
				else
				{
					$data['custom_error'] = 'An internal error occured. Please try again.';
					load_view('moderation/finish_password_reset', $data);
				}
			}
			else
			{
				redirect();
			}
		}
	}
}