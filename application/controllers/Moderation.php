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
        load_view('moderation/add_resource', $data);
    }

    function manage_resource()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        load_view('moderation/manage_resource', $data);
    }

    function add_news()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');

        $data['page_title'] = 'Moderation';
        load_view('moderation/add_news', $data);
    }

    function manage_news()
    {
        if (!($this->session->has_userdata('logged')))
            redirect('moderation/login');
            
        $data['page_title'] = 'Moderation';
        load_view('moderation/manage_news', $data);
    }
}