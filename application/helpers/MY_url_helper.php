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
 
	function get_faculties_select ($id = '')
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$faculties = $CI->moderation_model->get_faculties();

		$select = '<select id="' . $id . '" class="form-control bg-light" name="faculty" required>';

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

	function get_levels_select ($id = 'level_select')
	{
		$CI =& get_instance();
		$moderation_model = $CI->load->model('moderation_model');

		$levels = $CI->moderation_model->get_levels();

		$select = '<select id="' . $id . '" class="form-control bg-light" name="level" required>';

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

		$select = '<select id="news_category_select" class="form-control bg-light" name="category" required>';
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

		$select = '<select id="news_category_select" class="form-control bg-light" name="category" required>';
		
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
			$allowed_types = 'dot|doc|docx|dotx|docm|xls|xlsx|ppt|pptx';

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

	
	function generate_email_page ($contents, $title = 'New Mail')
	{
		$page = <<<_PAGE
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		  <head>
			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
			<!-- [ if !mso]> <!-->
			<meta content="IE=edge" http-equiv="X-UA-Compatible" />
			<!-- <![endif] -->
			<meta content="telephone=no" name="format-detection" />
			<meta content="width=device-width, initial-scale=1.0" name="viewport" />
			<link rel="apple-touch-icon" sizes="76x76" href="http://paulgoddarddesign.com/images/apple-icon.jpg">
			<link rel="icon" type="image/png" sizes="96x96" href="http://paulgoddarddesign.com/images/favicon.jpg">
			<title>Material Email Template</title>
			<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			<script src="http://paulgoddarddesign.com/js/ripple.js"></script>
			<style type="text/css">
			  .ExternalClass {width: 100%;}
			  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div, .ExternalClass b, .ExternalClass br, .ExternalClass img {line-height: 100% !important;}
			  /* iOS BLUE LINKS */
			  .appleBody a {color:#212121; text-decoration: none;}
			  .appleFooter a {color:#212121!important; text-decoration: none!important;}
			  /* END iOS BLUE LINKS */
			  img {color: #ffffff;text-align: center;font-family: Open Sans, Helvetica, Arial, sans-serif;display: block;}
			  body {margin: 0;padding: 0;-webkit-text-size-adjust: 100% !important;-ms-text-size-adjust: 100% !important;font-family: 'Open Sans', Helvetica, Arial, sans-serif!important;}
			  body,#body_style {background: #fffffe;}
			  table td {border-collapse: collapse;border-spacing: 0 !important;}
			  table tr {border-collapse: collapse;border-spacing: 0 !important;}
			  table tbody {border-collapse: collapse;border-spacing: 0 !important;}
			  table {border-collapse: collapse;border-spacing: 0 !important;}
			  span.yshortcuts,a span.yshortcuts {color: #000001;background-color: none;border: none;}
			  span.yshortcuts:hover,
			  span.yshortcuts:active,
			  span.yshortcuts:focus {color: #000001; background-color: none; border: none;}
			  img {-ms-interpolation-mode: bicubic;}
			  a[x-apple-data-detectors] {color: inherit !important;text-decoration: none !important;font-size: inherit !important;font-family: inherit !important;font-weight: inherit !important;line-height: inherit !important;
			  }
			  /**** My desktop styles ****/
			  @media only screen and (min-width: 600px) {
				.noDesk {display: none !important;}
				.td-padding {padding-left: 15px!important;padding-right: 15px!important;}
				.padding-container {padding: 0px 15px 0px 15px!important;mso-padding-alt: 0px 15px 0px 15px!important;}
				.mobile-column-left-padding { padding: 0px 0px 0px 0px!important; mso-alt-padding: 0px 0px 0px 0px!important; }
				.mobile-column-right-padding { padding: 0px 0px 0px 0px!important; mso-alt-padding: 0px 0px 0px 0px!important; }
				.mobile {display: none !important}
			  }
			  /**** My mobile styles ****/
			  @media only screen and (max-width: 599px) and (-webkit-min-device-pixel-ratio: 1) {
				*[class].wrapper { width:100% !important; }
				*[class].container { width:100% !important; }
				*[class].mobile { width:100% !important; display:block !important; }
				*[class].image{ width:100% !important; height:auto; }
				*[class].center{ margin:0 auto !important; text-align:center !important; }
				*[class="mobileOff"] { width: 0px !important; display: none !important; }
				*[class*="mobileOn"] { display: block !important; max-height:none !important; }
				p[class="mobile-padding"] {padding-left: 0px!important;padding-top: 10px;}
				.padding-container {padding: 0px 15px 0px 15px!important;mso-padding-alt: 0px 15px 0px 15px!important;}
				.hund {width: 100% !important;height: auto !important;}
				.td-padding {padding-left: 15px!important;padding-right: 15px!important;}
				.mobile-column-left-padding { padding: 18px 0px 18px 0px!important; mso-alt-padding: 18px 0px 18px 0px!important; }
				.mobile-column-right-padding { padding: 18px 0px 0px 0px!important; mso-alt-padding: 18px 0px 0px 0px!important; }
				.stack { width: 100% !important; }
				img {width: 100%!important;height: auto!important;}
				*[class="hide"] {display: none !important}
				*[class="Gmail"] {display: none !important}
				.Gmail {display: none !important}
				.bottom-padding-fix {padding: 0px 0px 18px 0px!important; mso-alt-padding: 0px 0px 18px 0px;}
			  }
			  .social, .social:active {
				opacity: 1!important;
				transform: scale(1);
				transition: all .2s!important;
			  }
			  .social:hover {
				opacity: 0.8!important;
				transform: scale(1.1);
				transition: all .2s!important;
			  }
			  .button.raised {
				transition: box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
				transition: all .2s;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
			  }
			  .button.raised:hover {
				box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2);transition: all .2s;
				-webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2);transition: all .2s;
				-moz-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2);transition: all .2s;
			  }
			  .card-1 {
				box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
				-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
				-moz-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
				transition: box-shadow .45s;
			  }
			  .card-1:hover {
				box-shadow: 0 8px 17px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,.19);
				-webkit-box-shadow: 0 8px 17px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,.19);
				-moz-box-shadow: 0 8px 17px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,.19);
				transition: box-shadow .45s;
			  }
			  .ripplelink{
				display:block
				color:#fff;
				text-decoration:none;
				position:relative;
				overflow:hidden;
				-webkit-transition: all 0.2s ease;
				-moz-transition: all 0.2s ease;
				-o-transition: all 0.2s ease;
				transition: all 0.2s ease;
				z-index:0;
			  }
			  .ripplelink:hover{
				  z-index:1000;
			  }
			  .ink {
				display: block;
				position: absolute;
				background:rgba(255, 255, 255, 0.3);
				border-radius: 100%;
				-webkit-transform:scale(0);
				   -moz-transform:scale(0);
					 -o-transform:scale(0);
						transform:scale(0);
			  }
			  .animate {
				  -webkit-animation:ripple 0.65s linear;
				 -moz-animation:ripple 0.65s linear;
				  -ms-animation:ripple 0.65s linear;
				   -o-animation:ripple 0.65s linear;
					  animation:ripple 0.65s linear;
			  }
			  @-webkit-keyframes ripple {
				  100% {opacity: 0; -webkit-transform: scale(2.5);}
			  }
			  @-moz-keyframes ripple {
				  100% {opacity: 0; -moz-transform: scale(2.5);}
			  }
			  @-o-keyframes ripple {
				  100% {opacity: 0; -o-transform: scale(2.5);}
			  }
			  @keyframes ripple {
				  100% {opacity: 0; transform: scale(2.5);}
			  }
		
			</style>
			<!--[if gte mso 9]>
			<xml>
			  <o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			  </o:OfficeDocumentSettings>
			</xml>
			<![endif]-->
		  </head>
		  <body style="margin:0; padding:0; background-color: #eeeeee;" bgcolor="#eeeeee">
			<!--[if mso]>
			<style type="text/css">
			body, table, td {font-family: Arial, Helvetica, sans-serif !important;}
			</style>
			<![endif]-->
			<!-- START EMAIL -->
			<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#eeeeee">
			  <div class="Gmail" style="height: 1px !important; margin-top: -1px !important; max-width: 600px !important; min-width: 600px !important; width: 600px !important;"></div>
			  <div style="display: none; max-height: 0px; overflow: hidden;">
				
			  </div>
			  <!-- Insert &zwnj;&nbsp; hack after hidden preview text -->
			  <div style="display: none; max-height: 0px; overflow: hidden;">
				&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </div>
		
			  <!-- START CARD 1 -->
			  <tr>
				<td width="100%" valign="top" align="center" class="padding-container" style="padding-top: 0px!important; padding-bottom: 18px!important; mso-padding-alt: 0px 0px 18px 0px;">
				  <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper">
					<tr>
					  <td>
						<table cellpadding="0" cellspacing="0" border="0">
						  <tr>
							<td style="border-radius: 3px; border-bottom: 2px solid #d4d4d4;" class="card-1" width="100%" valign="top" align="center">
							  <table style="border-radius: 3px;" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper" bgcolor="#ffffff">
								<tr>
								  <td align="center">
									<table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
									  <!-- START BODY COPY -->
									  <tr>
										<td class="td-padding" align="left" style="font-family: 'Roboto Mono', monospace; color: #212121!important; font-size: 24px; line-height: 30px; padding-top: 18px; padding-left: 18px!important; padding-right: 18px!important; padding-bottom: 0px!important; mso-line-height-rule: exactly; mso-padding-alt: 18px 18px 0px 13px;">
										  {$title}
										</td>
									  </tr>
									  <tr>
										<td class="td-padding" align="left" style="font-family: 'Roboto Mono', monospace; color: #212121!important; font-size: 16px; line-height: 24px; padding-top: 18px; padding-left: 18px!important; padding-right: 18px!important; padding-bottom: 0px!important; mso-line-height-rule: exactly; mso-padding-alt: 18px 18px 0px 18px;">
										  {$contents}
										</td>
									  </tr>
									  <!-- END BODY COPY -->
									  
									</table>
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>
			  <!-- END CARD 1 -->
		
			  <!-- FOOTER -->
			  <tr>
				<td width="100%" valign="top" align="center" class="padding-container">
				  <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper">
					<tr>
					  <td width="100%" valign="top" align="center">
						<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper" bgcolor="#eeeeee">
						  <tr>
							<td align="center">
							  <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
								<tr>
								  <!-- SOCIAL -->
								  <td align="center" width="300" style="padding-top: 0px!important; padding-bottom: 18px!important; mso-padding-alt: 0px 0px 18px 0px;">
									<table border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td align="right" valign="top" class="social">
										  <a href="#"
										  target="_blank">
										  <img src="http://paulgoddarddesign.com/emails/images/material-design/fb-icon.png"
										  height="24" alt="Facebook" border="0" style="display:block; max-width: 24px">
										  </a>
										</td>
										<td width="20"></td>
										<td align="right" valign="top" class="social">
										  <a href="#"
										  target="_blank">
										  <img src="http://paulgoddarddesign.com/emails/images/material-design/twitter-icon.png"
										  height="24" alt="Twitter" border="0" style="display:block; max-width: 24px">
										  </a>
										</td>
										<td width="20"></td>
										<td width="20"></td>
										<td align="right" valign="top" class="social">
										  <a href="#"
										  target="_blank">
										  <img src="http://paulgoddarddesign.com/emails/images/material-design/instagram-icon.png"
										  height="24" alt="Instagram" border="0" style="display:block; max-width: 24px">
										  </a>
										</td>
										<td width="20"></td>
										<td align="right" valign="top" class="social">
										  <a href="#"
										  target="_blank">
										  <img src="http://paulgoddarddesign.com/emails/images/material-design/youtube-icon.png"
										  height="24" alt="Youtube" border="0" style="display:block; max-width: 24px">
										  </a>
										</td>
										<td width="20"></td>
										<td align="right" valign="top" class="social">
										  <a href="#"
										  target="_blank">
										  <img src="http://paulgoddarddesign.com/emails/images/material-design/github-icon.png"
										  height="24" alt="Github" border="0" style="display:block; max-width: 24px">
										  </a>
										</td>
									  </tr>
									</table>
								  </td>
								  <!-- END SOCIAL -->
								</tr>
								<tr>
								  <td class="td-padding" align="center" style="font-family: 'Roboto Mono', monospace; color: #212121!important; font-size: 16px; line-height: 24px; padding-top: 0px; padding-left: 0px!important; padding-right: 0px!important; padding-bottom: 0px!important; mso-line-height-rule: exactly; mso-padding-alt: 0px 0px 0px 0px;">
									&copy; 2020 Campus Space
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>
			  <!-- FOOTER -->
		
			  <!-- SPACER -->
			  <!--[if gte mso 9]>
			  <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
				<tr>
				  <td align="center" valign="top" width="600" height="36">
					<![endif]-->
					<tr><td height="36px"></td></tr>
					<!--[if gte mso 9]>
				  </td>
				</tr>
			  </table>
			  <![endif]-->
			  <!-- END SPACER -->
		
			</table>
			<!-- END EMAIL -->
			<div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">
			  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			</div>
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

	function generate_video_resource_view ($resource)
	{
		$file_url = base_url('assets/resources/files/' . $resource['resource_file']);
		$title = $resource['resource_title'];
		$description = $resource['resource_description'];
		$department = $resource['resource_department'];
		$course = $resource['resource_course_code'];
		$downloads = $resource['resource_downloads'];
		$download_link = site_url('download/resource/' . $resource['id']);
		$date = $resource['resource_date'];

		$view = <<<_VIEW
			<div class="text-center shadow shadow-lg">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe src="{$file_url}" frameborder="0" class="embed-responsive-item"></iframe>
				</div>

				<div class="p-4 p-md-5">
					<h4 class="text-left mb-3">{$title}</h4>

					<div class="text-left lead ml-3 mb-5 text-muted">
						<p class="mb-2">{$department}</p>
						<p class="mb-2">{$course}</p>
						<p class="mb-2">{$downloads} Downloads</p>
					</div>

					<a href="{$file_url}" class="btn btn-success btn-theme btn-lg btn-block">Open Video</a>
					<a href="{$download_link}" class="btn btn-success btn-theme btn-lg btn-block">Download Video Now</a>
				</div>
			</div>

			<div class="mt-5 shadow shadow-sm" style="margin-top: 10rem">
				<div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
					<h4 class="text-center">About This Resource</h4>
				</div>

				<p class="lead text-mute px-2">Added on {$date}</p>

				<p class="lead px-4 pb-3 text-muted">
					{$description}
				</p>
			</div>
_VIEW;
		return $view;
	}

	function generate_material_resource_view ($resource)
	{
		$file_url = base_url('assets/resources/files/' . $resource['resource_file']);
		$img_url = base_url(get_resource_header_img('Material'));
		$title = $resource['resource_title'];
		$description = $resource['resource_description'];
		$department = $resource['resource_department'];
		$course = $resource['resource_course_code'];
		$downloads = $resource['resource_downloads'];
		$download_link = site_url('download/resource/' . $resource['id']);
		$date = $resource['resource_date'];

		$view = <<<_VIEW
			<div class="text-center shadow shadow-lg">
				<img src="{$img_url}" alt="Header Image"
					class="img-fluid img-thumbnail">

				<div class="p-4 p-md-5">
					<h4 class="text-left mb-3">{$title}</h4>

					<div class="text-left lead ml-3 mb-5 text-muted">
						<p class="mb-2">{$department}</p>
						<p class="mb-2">{$course}</p>
						<p class="mb-2">{$downloads} Downloads</p>
					</div>

					<a href="{$file_url}" class="btn btn-success btn-theme btn-lg btn-block">Open Material</a>
					<a href="{$download_link}" class="btn btn-success btn-theme btn-lg btn-block">Download Material Now</a>
				</div>
			</div>

			<div class="mt-5 shadow shadow-sm" style="margin-top: 10rem">
				<div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
					<h4 class="text-center">About This Resource</h4>
				</div>

				<p class="lead text-mute px-2">Added on {$date}</p>

				<p class="lead px-4 pb-3 text-muted">
					{$description}
				</p>
			</div>
_VIEW;
		return $view;
	}

	function generate_document_resource_view ($resource)
	{
		$file_url = base_url('assets/resources/files/' . $resource['resource_file']);
		$img_url = base_url(get_resource_header_img('Document'));
		$title = $resource['resource_title'];
		$description = $resource['resource_description'];
		$department = $resource['resource_department'];
		$course = $resource['resource_course_code'];
		$downloads = $resource['resource_downloads'];
		$download_link = site_url('download/resource/' . $resource['id']);
		$date = $resource['resource_date'];

		$view = <<<_VIEW
			<div class="text-center shadow shadow-lg">
				<img src="{$img_url}" alt="Header Image"
					class="img-fluid img-thumbnail">

				<div class="p-4 p-md-5">
					<h4 class="text-left mb-3">{$title}</h4>

					<div class="text-left lead ml-3 mb-5 text-muted">
						<p class="mb-2">{$department}</p>
						<p class="mb-2">{$course}</p>
						<p class="mb-2">{$downloads} Downloads</p>
					</div>

					<a href="{$file_url}" class="btn btn-success btn-theme btn-lg btn-block">Open Document</a>
					<a href="{$download_link}" class="btn btn-success btn-theme btn-lg btn-block">Download Document Now</a>
				</div>
			</div>

			<div class="mt-5 shadow shadow-sm" style="margin-top: 10rem">
				<div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
					<h4 class="text-center">About This Resource</h4>
				</div>

				<p class="lead text-mute px-2">Added on {$date}</p>

				<p class="lead px-4 pb-3 text-muted">
					{$description}
				</p>
			</div>
_VIEW;
		return $view;
	}

	function generate_textbook_resource_view ($resource)
	{
		$file_url = base_url('assets/resources/files/' . $resource['resource_file']);
		$img_url = base_url(get_resource_header_img('Textbook'));
		$title = $resource['resource_title'];
		$description = $resource['resource_description'];
		$department = $resource['resource_department'];
		$course = $resource['resource_course_code'];
		$downloads = $resource['resource_downloads'];
		$download_link = site_url('download/resource/' . $resource['id']);
		$date = $resource['resource_date'];

		$view = <<<_VIEW
			<div class="text-center shadow shadow-lg">
				<img src="{$img_url}" alt="Header Image"
					class="img-fluid img-thumbnail">

				<div class="p-4 p-md-5">
					<h4 class="text-left mb-3">{$title}</h4>

					<div class="text-left lead ml-3 mb-5 text-muted">
						<p class="mb-2">{$department}</p>
						<p class="mb-2">{$course}</p>
						<p class="mb-2">{$downloads} Downloads</p>
					</div>

					<a href="{$file_url}" class="btn btn-success btn-theme btn-lg btn-block">Open Textbook</a>
					<a href="{$download_link}" class="btn btn-success btn-theme btn-lg btn-block">Download Textbook Now</a>
				</div>
			</div>

			<div class="mt-5 shadow shadow-sm" style="margin-top: 10rem">
				<div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
					<h4 class="text-center">About This Resource</h4>
				</div>

				<p class="lead text-mute px-2">Added on {$date}</p>

				<p class="lead px-4 pb-3 text-muted">
					{$description}
				</p>
			</div>
_VIEW;
		return $view;
	}

	function generate_resource_view ($category, $resource)
	{
		if ($category == 'Material')
			return generate_material_resource_view($resource);
		else if ($category == 'Document')
			return generate_document_resource_view($resource);
		else if ($category == 'Textbook')
			return generate_textbook_resource_view($resource);
		else if ($category == 'Video')
			return generate_video_resource_view($resource);
	}

	function generate_news_card ($news_item)
	{
		$img_url = base_url('assets/imgs/index/reading.jpg');
		$content = ellipsize($news_item['news_content'], 250);
		$title = $news_item['news_title'];
		$date = $news_item['news_date'];
		$view_link = site_url('news/view/' . $news_item['id']);

		$card = <<<_CARD
			<div class="card mt-4 bg-light">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-sm-4">
							<img src="{$img_url}" alt="News Image" class="img-fluid img-thumbnail">
						</div>

						<div class="col-sm">
							<div class="mt-4 mt-md-5 w-100 h-100">
								<h4 class="ml-3">{$title}</h4>
								<small class=" ml-3 text-muted"><span class="far fa-calendar mr-2"></span> {$date}</small>
								
								<p class="lead text-muted mt-5 ml-3 news-card-text">
									{$content}
								</p>

								<a href="{$view_link}" class="btn btn-dark btn-lg ml-3 news-card-btn-more">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
_CARD;
		return $card;
	}

	function generate_news_item_view ($news_item)
	{
		$img_url = base_url('assets/imgs/index/reading.jpg');
		$title = $news_item['news_title'];
		$category = $news_item['news_category'];
		$department = $news_item['news_department'];
		$date = $news_item['news_date'];
		$content = $news_item['news_content'];

		$view = <<<_VIEW
			<div class="jumbotron p-3">
				<div class="text-center mb-5">
					<img src="{$img_url}" alt="News Image" class="img-fluid img-thumbnail">
				</div>

				<div class="mt-5">
					<h4>{$title}</h4>

					<div class="text-left lead ml-3 mb-5 text-muted">
						<p class="mb-2">{$category}</p>
						<p class="mb-2">{$department}</p>
						<p class="mb-2">Posted on {$date}</p>
					</div>

					<p class="lead pb-3 pt-5">
						{$content}
					</p>
				</div>
			</div>
_VIEW;
		return $view;
	}

	function generate_news_notifications_email ($url, $unsub_link, $data, $faculty, $department, $level)
	{
		$category = $data['news_category'] . 's';
		$title = $data['news_title'];

		$content = <<<_CONTENT
			<p>News/Updates just recieved a new update. Click {$url} to view it now.</p>
			<p>
				Faculty: {$faculty} <br>
				Department: {$department} <br>
				Level: {$level} <br>
				News Category: {$category} <br>
				News Title: {$title} <br>
			</p>
			<br><br>

			<p>
				You recieved this notification because a subscription was registered with this email and the combination above. If you wish to cancel 
				the subscription for this combination, click {$unsub_link}
			</p>
_CONTENT;

		return generate_email_page($content, 'News/Updates Added!');
	}

	function generate_resources_notifications_email ($url, $unsub_link, $data, $faculty, $department, $level)
	{
		$category = $data['resource_category'] . 's';
		$title = $data['resource_title'];
		$course = $data['resource_course'];
		
		$content = <<<_CONTENT
			<p>Resources just recieved a new update. Click {$url} to view it now.</p>
			<p>
				Faculty: {$faculty} <br>
				Department: {$department} <br>
				Level: {$level} <br>
				Course: {$course} <br>
				Resource Category: {$category} <br>
				Resource Title: {$title} <br>
			</p>
			<br><br>

			<p>
				You recieved this notification because a subscription was registered with this email and the combination above. If you wish to cancel 
				the subscription for this combination, click {$unsub_link}
			</p>
_CONTENT;

		return generate_email_page($content, 'New Resource Availaible!');
	}

	function dispatch_news_notifications ($url, $data, $subscriptions, $faculty_id, $department_id, $level_id, $faculty, 
		$department, $level)
	{
		$CI =& get_instance();
		$CI->load->library('email');
		$CI->email->from('admin@campusspace.com.ng', 'Campus Space');
		$CI->email->subject($data['news_category'] . ' Update');
		
		foreach ($subscriptions as $subscription)
		{
			$unsub_link = site_url('unsub_news/' . $subscription['id'] . '/' . $faculty_id . '/' . $department_id . '/' . $level_id);
			
			$CI->email->to($subscription['email']);
			$CI->email->message(generate_news_notifications_email($url, $unsub_link, $data, $faculty, $department, $level));
			$CI->email->send();
		}
	}

	function dispatch_resources_notifications ($url, $data, $subscriptions, $faculty_id, $department_id, $level_id, $faculty, 
		$department, $level)
	{
		$CI =& get_instance();
		$CI->load->library('email');
		$CI->email->from('admin@campusspace.com.ng', 'Campus Space');
		$CI->email->subject($data['resource_category'] . ' Update');
		
		foreach ($subscriptions as $subscription)
		{
			$unsub_link = site_url('unsub_resources/' . $subscription['id'] . '/' . $faculty_id . '/' . $department_id . '/' . $level_id);
			
			$CI->email->to($subscription['email']);
			$CI->email->message(generate_resources_notifications_email($url, $unsub_link, $data, $faculty, $department, $level));
			$CI->email->send();
		}
	}