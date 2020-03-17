<?php
    class Users extends CI_Controller
    {
        function login()
        {
            $data['page_title'] = 'Login';
            load_view('users/login', $data);
        }

        function register()
        {
            $data['page_title'] = 'register';
            load_view('users/register', $data);
        }
    }
?>    