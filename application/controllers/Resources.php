<?php
class Resources extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Resources';
        load_view('resources/index', $data);
    }

    public function resource()
    {
        $data['page_title'] = 'Resources';
        load_view('resources/resources', $data);
    }
}