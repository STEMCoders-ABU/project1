<?php
class resources_page extends CI_Controller
{
    public function resources()
    {
        $data['page_title'] = 'resources';
        load_view('resources_page/resources', $data);
    }
}