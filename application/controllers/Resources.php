<?php
class Resources extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('resources_model');
    }

    public function index()
    {
        $data['page_title'] = 'Resources';
        $data['resources'] = $this->resources_model->get_frequenty_accessed_resources();
        load_view('resources/index', $data);
    }

    public function resource()
    {
        $data['page_title'] = 'Resources';

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            load_view('resources/resources', $data);
        }
        else
        {
            redirect('resources');
        }
    }
}