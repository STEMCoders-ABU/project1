<?php
class resources_page extends CI_Controller
{
    public function resources()
    {
        $data['page_title'] = 'resources';
        load_view('resources_page/resources', $data);
    }

    public function comments()
    {
        $data['page_title'] = 'comments';
        load_view('resources_page/comments', $data);
    }

    public function video_comments()
    {
        $data['page_title'] = 'comments';
        load_view('resources_page/video_comments', $data);
    }
}