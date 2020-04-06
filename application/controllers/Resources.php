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
            $resource_categories_ids = $this->resources_model->get_resource_categories_ids();
            $sidebar_contents = [];

            $faculty_id = get_post('faculty');
            $department_id = get_post('department');
            $level_id = get_post('level');
            $restrictions = 
            [
                'resources.faculty_id' => $faculty_id,
                'resources.department_id' => $department_id,
                'resources.level_id' => $level_id,
            ];

            foreach ($resource_categories_ids as $resource_category_id)
            {
                $group['header'] = $this->resources_model->get_resource_catgory_title($resource_category_id['id']) . 's';
                $group['contents'] = $this->resources_model->get_courses_for_category($resource_category_id['id'], $restrictions);
                $sidebar_contents[] = $group;
            }

            $data['sidebar_contents'] = $sidebar_contents;
            load_view('resources/resources', $data);
        }
        else
        {
            redirect('resources');
        }
    }
}