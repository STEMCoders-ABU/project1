<?php
class Resources extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Resources';
        load_view('resources/resources', $data);
    }

    public function comments()
    {
        $data['page_title'] = 'Resources';
        load_view('resources/comments', $data);
    }

    public function video_comments()
    {
        $data['page_title'] = 'Resources';
        load_view('resources/video_comments', $data);
    }
}