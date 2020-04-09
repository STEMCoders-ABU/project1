<?php
class Admin extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('moderation_model');
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

                if ($password == $admin_data['password'])
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
}