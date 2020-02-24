<?php

	function load_view ($page_view, $data = [])
	{
		$CI =& get_instance();

		$CI->load->view('templates/header', $data);
		$CI->load->view($page_view, $data);
		$CI->load->view('templates/footer');
	}

	function get_post ($field_name)
	{
		return get_instance()->input->post($field_name);
	}