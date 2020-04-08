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

	function get_pagination_config ($base_url, $total_rows, $per_page)
	{
		$config['first_link'] = 'First Page';
		$config['last_link'] = 'Last Page';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous Page';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item pagination_num_tag">';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination pagination-lg justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = array('class' => 'page-link');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;

		return $config;
	}

	function get_faculties_select()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$faculties = $CI->moderation_model->get_faculties();

		$select = '<select id="faculty_select" class="form-control bg-light" name="faculty" required>';

		foreach ($faculties as $faculty)
			$select .= '<option value=' . $faculty['id'] . '>' . $faculty['faculty'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_departments_select ($departments)
	{
		$select = '<select id="department_select" class="form-control bg-light" name="department" required>';

		foreach ($departments as $department)
			$select .= '<option value=' . $department['id'] . '>' . $department['department'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_levels_select()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$levels = $CI->moderation_model->get_levels();

		$select = '<select id="level_select" class="form-control bg-light" name="level" required>';

		foreach ($levels as $level)
			$select .= '<option value=' . $level['id'] . '>' . $level['level'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_courses_select ($selected = 0)
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$courses = $CI->moderation_model->get_courses($CI->session->userdata('department_id'),
			$CI->session->userdata('level_id'));

		$select = '<select class="form-control bg-light" name="course" required>';

		foreach ($courses as $course)
			if ($selected == $course['id'])
				$select .= '<option value=' . $course['id'] . ' selected>' . $course['course_code'] . '</option>';
			else
				$select .= '<option value=' . $course['id'] . '>' . $course['course_code'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_courses_select_all()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$courses = $CI->moderation_model->get_courses($CI->session->userdata('department_id'),
			$CI->session->userdata('level_id'));

		$select = '<select class="form-control bg-light" name="course" required>';
		$select .= '<option value="0" selected>All</option>';

		foreach ($courses as $course)
			$select .= '<option value=' . $course['id'] . '>' . $course['course_code'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_resource_categories_select()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$categories = $CI->moderation_model->get_resource_categories();

		$select = '<select class="form-control bg-light" name="category" required>';

		foreach ($categories as $category)
			$select .= '<option value=' . $category['id'] . '>' . $category['category'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_resource_categories_select_all()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$categories = $CI->moderation_model->get_resource_categories();

		$select = '<select class="form-control bg-light" name="category" required>';
		$select .= '<option value="0" selected>All</option>';

		foreach ($categories as $category)
			$select .= '<option value=' . $category['id'] . '>' . $category['category'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_news_categories_select_all()
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$categories = $CI->moderation_model->get_news_categories();

		$select = '<select class="form-control bg-light" name="category" required>';
		$select .= '<option value="0" selected>All</option>';

		foreach ($categories as $category)
			$select .= '<option value=' . $category['id'] . '>' . $category['category'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_news_categories_select ($selected = 0)
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$categories = $CI->moderation_model->get_news_categories();

		$select = '<select class="form-control bg-light" name="category" required>';
		
		foreach ($categories as $category)
			if ($selected == $category['id'])
				$select .= '<option value=' . $category['id'] . ' selected>' . $category['category'] . '</option>';
			else
				$select .= '<option value=' . $category['id'] . '>' . $category['category'] . '</option>';

		$select .= '</select>';

		return $select;
	}

	function get_resource_category_title ($category_id)
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$categories = $CI->moderation_model->get_resource_categories();
		foreach ($categories as $category)
			if ($category['id'] == $category_id)
				return $category['category'];
	}

	function get_allowed_file_types ($resource_category_id)
	{
		$allowed_types = '';
		$category = get_resource_category_title($resource_category_id);

		if ($category == 'Material')
			$allowed_types = 'pdf';
		else if ($category == 'Video')
			$allowed_types = '3gpp|mp4';
		else if ($category == 'Textbook')
			$allowed_types = 'pdf';
		else if ($category == 'Document')
			$allowed_types = 'dot|docx|dotx|docm|xls|xlsx|ppt|pptx';

		return $allowed_types;
	}

	function get_max_file_size ($resource_category_id)
	{
		$file_size = 0;
		$category = get_resource_category_title($resource_category_id);

		if ($category == 'Material')
			$file_size = 50024;
		else if ($category == 'Video')
			$file_size = 1500024;
		else if ($category == 'Textbook')
			$file_size = 50024;
		else if ($category == 'Document')
			$file_size = 50024;

		return $file_size;
	}

	
	function generate_email_page ($contents)
	{
		$page = <<<_PAGE
			<html>
				<body style="background-color: rgb(235, 235, 235); padding: 1rem; font-family: 'Courier New', Courier, monospace;">
					{$contents}
			
					<footer style="position: absolute; bottom:0; width:150%; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
						<p>STEM Coders Web Development Team</p>
					</footer>
				</body>
			</html>
_PAGE;
		return $page;
	}

	function get_resource_header_img ($category)
	{
		if ($category == 'Material')
			return 'assets/imgs/resources/headers/book.jpg';
		else if ($category == 'Document')
			return 'assets/imgs/resources/headers/book.jpg';
		else if ($category == 'Textbook')
			return 'assets/imgs/resources/headers/book.jpg';
		else if ($category == 'Video')
			return 'assets/imgs/resources/headers/video.png';
	}

	function generate_material_resource_card ($resource)
	{
		$img_url = base_url(get_resource_header_img('Material'));
		$title = $resource['resource_title'];
		$description = ellipsize($resource['resource_description'], 150);
		$view_link = site_url('resources/view/' . $resource['id']);
		$download_link = site_url('download/resource/' . $resource['id']);

		$card = <<<_CARD
			<div class="card">
				<img src="{$img_url}" alt="Materials Image" class="img-fluid card-img-top"
					style="height: 40vh">
				<div class="card-header">
					<h4>{$title}</h4>
				</div>
				<div class="card-body">
					<p class="lead text-muted resource-card-text">
						{$description} 
					</p>

					<div class="mt-5">
						<a href="{$view_link}" class="btn btn-dark btn-lg btn-block">View</a>
						<a href="{$download_link}" class="btn btn-dark btn-lg btn-block">Download</a>
					</div>
				</div>
			</div>
_CARD;
		return $card;
	}

	function generate_document_resource_card ($resource)
	{
		$img_url = base_url(get_resource_header_img('Document'));
		$title = $resource['resource_title'];
		$description = ellipsize($resource['resource_description'], 150);
		$view_link = site_url('resources/view/' . $resource['id']);
		$download_link = site_url('download/resource/' . $resource['id']);

		$card = <<<_CARD
			<div class="card">
				<img src="{$img_url}" alt="Document Image" class="img-fluid card-img-top"
					style="height: 40vh">
				<div class="card-header">
					<h4>{$title}</h4>
				</div>
				<div class="card-body">
					<p class="lead text-muted resource-card-text">
						{$description} 
					</p>

					<div class="mt-5">
						<a href="{$view_link}" class="btn btn-dark btn-lg btn-block">View</a>
						<a href="{$download_link}" class="btn btn-dark btn-lg btn-block">Download</a>
					</div>
				</div>
			</div>
_CARD;
		return $card;
	}

	function generate_textbook_resource_card ($resource)
	{
		$img_url = base_url(get_resource_header_img('Textbook'));
		$title = $resource['resource_title'];
		$description = ellipsize($resource['resource_description'], 150);
		$view_link = site_url('resources/view/' . $resource['id']);
		$download_link = site_url('download/resource/' . $resource['id']);

		$card = <<<_CARD
			<div class="card">
				<img src="{$img_url}" alt="Textbook Image" class="img-fluid card-img-top"
					style="height: 40vh">
				<div class="card-header">
					<h4>{$title}</h4>
				</div>
				<div class="card-body">
					<p class="lead text-muted resource-card-text">
						{$description} 
					</p>

					<div class="mt-5">
						<a href="{$view_link}" class="btn btn-dark btn-lg btn-block">View</a>
						<a href="{$download_link}" class="btn btn-dark btn-lg btn-block">Download</a>
					</div>
				</div>
			</div>
_CARD;
		return $card;
	}

	function generate_video_resource_card ($resource)
	{
		$img_url = base_url(get_resource_header_img('Video'));
		$title = $resource['resource_title'];
		$description = ellipsize($resource['resource_description'], 150);
		$view_link = site_url('resources/view/' . $resource['id']);
		$download_link = site_url('download/resource/' . $resource['id']);

		$card = <<<_CARD
			<div class="card">
				<img src="{$img_url}" alt="Video Image" class="img-fluid card-img-top"
					style="height: 40vh">
				<div class="card-header">
					<h4>{$title}</h4>
				</div>
				<div class="card-body">
					<p class="lead text-muted resource-card-text">
						{$description} 
					</p>

					<div>
						<a href="{$view_link}" class="btn btn-dark btn-lg btn-block">View</a>
						<a href="{$download_link}" class="btn btn-dark btn-lg btn-block">Download</a>
					</div>
				</div>
			</div>
_CARD;
		return $card;
	}

	function generate_resource_card ($category, $resource)
	{
		if ($category == 'Material')
			return generate_material_resource_card($resource);
		else if ($category == 'Document')
			return generate_document_resource_card($resource);
		else if ($category == 'Textbook')
			return generate_textbook_resource_card($resource);
		else if ($category == 'Video')
			return generate_video_resource_card($resource);
	}

	function generate_hidden_card()
	{
		$card = <<<_CARD
			<div class="card" style="visibility: hidden;">
			</div>
_CARD;
		return $card;
	}

	function generate_comment_markup ($comment)
	{
		$author = $comment['author'];
		$date = $comment['date'];
		$body = $comment['comment'];
		$img_url = base_url('assets/imgs/avatar.png');

		$markup = <<<_COMMENT
			<div class="p-3 bg-light mt-3 container-fluid">
				<div class="row">
					<div class="col-sm-2">
						<img src="{$img_url}" alt="Avatar" class="img-fluid" style="height: 20vh">
					</div>

					<div class="col-sm mt-3 p-md-0 pt-md-2">
						<h4>{$author}</h4>
						<small class="text-mute"><span class="far fa-calendar mr-2"></span>{$date}</small>

						<p class="lead mt-3 text-muted">
							{$body}
						</p>
					</div>
				</div>
			</div>
_COMMENT;
		return $markup;
	}