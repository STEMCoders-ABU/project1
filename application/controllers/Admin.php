<?php
class Admin extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('moderation_model');
        $this->load->helper('email');
    }

    public function index()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');
            
        $data['page_title'] = 'Administration';
        load_view('admin/index', $data);
    }

    function login()
    {
        $data['page_title'] = 'Administration';
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
			load_view('admin/login',  $data);
		else
		{
            
		    if ($this->session->has_userdata('admin_logged'))
                redirect('index');

            $username = get_post('username');

            if ($this->moderation_model->admin_exists($username))
            {
                $admin_data = $this->moderation_model->get_admin_data($username);
                $password = get_post('password');

                if (password_verify($password, $admin_data['password']))
                {
                    $session_data =
                    [
                        'admin_username' => $username,
                        'admin_logged' => TRUE,
                    ];

                    $this->session->set_userdata($session_data);
                    redirect('admin');
                }
                else
                {
                    $data['custom_error'] = 'Invalid username or password!';
                    load_view('admin/login',  $data);
                }
            }
            else
            {
                $data['custom_error'] = 'Invalid username or password!';
                load_view('admin/login',  $data);
            }
        }
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('index');
    }

    function add_faculty()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');
            
        $data['page_title'] = 'Administration';

        $this->form_validation->set_rules('faculty_name', 'Faculty Name', 'required|max_length[60]|is_unique[faculties.faculty]',
        ['is_unique' => 'A faculty with the same given name already exists!']);

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $faculty = get_post('faculty_name');
            
            $this->moderation_model->add_faculty($faculty);
            $this->session->set_flashdata('flash_message', 'A new faculty is added successfully!');
            load_view('admin/index', $data);
        }
    }

    function update_faculty()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');

        $data['page_title'] = 'Administration';

        $this->form_validation->set_rules('faculty_name', 'New Faculty Name', 'required|max_length[60]|is_unique[faculties.faculty]',
        ['is_unique' => 'A faculty with the same given name already exists!']);
        $this->form_validation->set_rules('faculty', 'Old Faculty ID', 'required');

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $faculty = get_post('faculty_name');
            
            $faculty_id = get_post('faculty');
            $this->moderation_model->update_faculty($faculty_id, $faculty);
            $this->session->set_flashdata('flash_message', 'Faculty name has been changed successfully!');
            load_view('admin/index', $data);
        }
    }

    function remove_faculty()
    {
        if(!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');

        $data['page_title'] = 'Administration';

        $this->form_validation->set_rules('faculty', 'Faculty ID', 'required');

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $faculty_id = get_post('faculty');
            $this->moderation_model->remove_faculty($faculty_id);
            $this->session->set_flashdata('flash_message', 'Faculty is deleted!');
            load_view('admin/index', $data);
        }
    }

    function add_department()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');
            
        $data['page_title'] = 'Administration';
    
        $this->form_validation->set_rules('department_name', 'Department Name', 'required|max_length[60]|is_unique[departments.department]',
        ['is_unique' => 'A department with the same given name already exists!']);
        $this->form_validation->set_rules('faculty', 'Faculty ID', 'required');

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $department = get_post('department_name');
            $faculty_id = get_post('faculty');

            $this->moderation_model->add_department($department, $faculty_id);
            $this->session->set_flashdata('flash_message', 'New Department name has been added successfully!');
            load_view('admin/index', $data);
        }
    }

    function update_department()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');
            
        $data['page_title'] = 'Administration';
    
        $this->form_validation->set_rules('department_name', 'Department Name', 'required|max_length[60]|is_unique[departments.department]',
        ['is_unique' => 'A department with the same given name already exists!']);
        $this->form_validation->set_rules('department', 'Department ID', 'required');
        $this->form_validation->set_rules('faculty', 'Faculty ID', 'required');

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $department = get_post('department_name');
            $department_id = get_post('department');
            $faculty_id = get_post('faculty');

            $this->moderation_model->update_department($department_id, $department, $faculty_id);
            $this->session->set_flashdata('flash_message', 'Department name has been changed successfully!');
            load_view('admin/index', $data);
        }
    }

    function add_moderator()
    {
        if (!($this->session->has_userdata('admin_logged')))
            redirect('admin/login');
            
        $data['page_title'] = 'Administration';
    
        $this->form_validation->set_rules('faculty', 'Faculty ID', 'required');
        $this->form_validation->set_rules('department', 'Department ID', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|is_unique[moderators.username]',
        ['is_unique' => 'Username already taken!']);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|valid_email|is_unique[moderators.email]',
        ['is_unique' => 'An account with the same email address exists!']);
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|max_length[50]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|max_length[11]|is_unique[moderators.phone]',
        ['is_unique' => 'An account with the same phone number exists!']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[70]');

        if ($this->form_validation->run() == FALSE)
            load_view('admin/index', $data);
        else
        {
            $entries = 
            [
                'username' => get_post('username'),
                'email' => get_post('email'),
                'password' => password_hash(get_post('password'), PASSWORD_DEFAULT),
                'full_name' => get_post('full_name'),
                'gender' => get_post('gender'),
                'phone' => get_post('phone'),
                'faculty_id' => get_post('faculty'),
                'department_id' => get_post('department'),
                'level_id' => get_post('level'),
            ];

            if(!($this->moderation_model->is_moderator_unique($entries['department_id'])))
            {
                $this->moderation_model->add_moderator($entries);
                $this->session->set_flashdata('flash_message', 'A new moderator has been added successfully!');
                load_view('admin/index', $data);
            }
            else
            {
                $data['custom_error'] = 'A moderator from the same department exists!';
                load_view('admin/index',  $data);
            }
        }
    }
}