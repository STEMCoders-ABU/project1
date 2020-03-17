<?php
class Pages extends CI_Controller
{
    public function index()
    {
        $data['page_title'] = 'Home';
        load_view('pages/index', $data);
    }

    public function about()
    {
        $data['page_title'] = 'About';
        load_view('pages/about', $data);
    }
    public function resources()
    {
        $data['page_title'] = 'Resources';
        load_view('pages/resources', $data);
    }
}