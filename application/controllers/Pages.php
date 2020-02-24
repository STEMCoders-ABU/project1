<?php
class Pages extends CI_Controller
{
    public function index()
    {
        $data['page_title'] = 'Home';
        load_view('pages/index', $data);
    }
}