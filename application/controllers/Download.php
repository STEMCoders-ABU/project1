<?php
class Download extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
	}

    public function resource ($resource_id)
    {
        $this->load->model('resources_model');
        $resource = $this->resources_model->get_resource($resource_id);

        if ($resource)
        {
            $file = './assets/resources/files/' . $resource['resource_file'];
            if (file_exists($file))
            {
                force_download($file, NULL);
            }
            else
            {
                $data['page_title'] = 'File Not Found';
                load_view('download/file_not_found', $data);
            }
        }
        else
        {
            $data['page_title'] = 'File Not Found';
            load_view('download/file_not_found', $data);
        }
    }
}