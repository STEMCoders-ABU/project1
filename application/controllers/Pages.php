<?php
class Pages extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('resources_model');
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['page_title'] = 'Home';
        $data['news'] = $this->news_model->get_latest_news();

        load_view('pages/index', $data);
    }

    public function about()
    {
        $data['page_title'] = 'About';
        load_view('pages/about', $data);
    }

    function news_sub()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');

        if ($this->form_validation->run() == FALSE)
            echo 'Please enter a valid email!';
        else
        {
            $faculty_id = get_post('faculty_id');
            $department_id = get_post('department_id');
            $level_id = get_post('level_id');
            $email = get_post('email');
            
            $entries = 
            [
                'faculty_id' => $faculty_id,
                'department_id' => $department_id,
                'level_id' => $level_id,
                'email' => $email,
            ];

            if ($this->news_model->subscription_exists($entries))
                echo "You're already subscribed with this combination. You can still subscribe with other combinations of faculty, department and level.";
            else
            {
                $this->news_model->add_subscription($entries);
                echo "You have successfully subscribed for news/updates notifications. You can unsubscribe at anytime via notification emails.";
            }
        }
    }

    function resources_sub()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');

        if ($this->form_validation->run() == FALSE)
            echo 'Please enter a valid email!';
        else
        {
            $faculty_id = get_post('faculty_id');
            $department_id = get_post('department_id');
            $level_id = get_post('level_id');
            $email = get_post('email');
            
            $entries = 
            [
                'faculty_id' => $faculty_id,
                'department_id' => $department_id,
                'level_id' => $level_id,
                'email' => $email,
            ];

            if ($this->resources_model->subscription_exists($entries))
                echo "You're already subscribed with this combination. You can still subscribe with other combinations of faculty, department and level.";
            else
            {
                $this->resources_model->add_subscription($entries);
                echo "You have successfully subscribed for resources notifications. You can unsubscribe at anytime via notification emails.";
            }
        }
    }
}