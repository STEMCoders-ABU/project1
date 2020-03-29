<?php
class Moderation extends CI_Controller
{
    function index()
    {
        $data['page_title'] = 'Moderation';
        load_view('moderation/index', $data);
    }
}