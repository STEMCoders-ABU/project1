<?php
class Moderation extends CI_Controller
{
    function index()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/index', $data);
    }

    function add_resource()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/add_resource', $data);
    }

    function manage_resource()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/manage_resource', $data);
    }

    function add_news()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/add_news', $data);
    }

    function manage_news()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/manage_news', $data);
    }
}