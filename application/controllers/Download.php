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
                $entry = ['downloads' => $resource['resource_downloads'] + 1];
                $this->load->model('moderation_model');
                $this->moderation_model->update_resource($resource_id, $entry);
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

    public function app()
    {
        $file = './assets/app/campus-space.apk';
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
}