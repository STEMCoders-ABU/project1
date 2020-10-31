
var LOCAL_HOST = true;
var SITE_URL = 'http://localhost/project1/';

$(document).ready(function (){
	const windowObj = $(window);
	if (windowObj.scrollTop() > 100) {
		const navbar = $('nav#generic-navbar');
		navbar.addClass('nav-opaque');
		navbar.removeClass('nav-transparent');
	}

	windowObj.scroll(() => {
		const scrollHeight = $(this).scrollTop();
		const navbar = $('nav#generic-navbar');
		
		if (scrollHeight > 100) {
			if (!navbar.hasClass('ignore-scroll-change')) {
				navbar.addClass('nav-opaque');
				navbar.removeClass('nav-transparent');
			}
		}
		else {
			if (!navbar.hasClass('ignore-scroll-change')) {
				navbar.removeClass('nav-opaque');
				navbar.addClass('nav-transparent');
			}
		}

		if (scrollHeight > window.screen.height) {
			$('.scroll-to-top').removeClass('scroll-to-top-invisible');
		}
		else {
			$('.scroll-to-top').addClass('scroll-to-top-invisible');
		}
	});

	$('.scroll-to-top').click(function(){
		$('html, body').animate({
			scrollTop: 0
		}, 'slow');
		return false;
	});

	$('#resources-sidebar-collapse').on('click', function (){
		$('#resources-sidebar').toggleClass('open');
		$('div .resources-siderbar-wrapper').toggleClass('open');
		$('div#resources-content').toggleClass('open');
		$(this).toggleClass('active');
	});

	// displays the name of the file selected from the file browser
	$(".custom-file-input").on("change", function()
	{
       var fileName = $(this).val().split("\\").pop();
       $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	
	/* Resources Codes */
	// display departments for currently selected faculty (Resources Index)
	fetch_and_display_departments('select#faculty_select', 'div#departments_select_container');

	// update the select options when the faculty select changes
	$('select#faculty_select').change(function()
		{
			fetch_and_display_departments('select#faculty_select', 'div#departments_select_container');
		}
	);

	// display departments for currently selected faculty (Admin Index)
	fetch_and_display_departments('form.update-dept-form select#faculty_select', 'div#departments_select_container');

	// update the select options when the faculty select changes
	$('form.update-dept-form select#faculty_select').change(function()
		{
			fetch_and_display_departments('form.update-dept-form select#faculty_select', 'div#departments_select_container');
		}
	);

	// display departments for currently selected faculty (Admin Index)
	fetch_and_display_departments('form.add-mod-form select#faculty_select', 'div#departments_select_container2');

	// update the select options when the faculty select changes
	$('form.add-mod-form select#faculty_select').change(function()
		{
			fetch_and_display_departments('form.add-mod-form select#faculty_select', 'div#departments_select_container2');
		}
	);

	// show resources when the 'Find Resources' is click
	$('button#btn_find_resources').click(function()
		{
			var faculty_id = get_selected_faculty_id('select#faculty_select');
			var department_id = get_selected_department_id();
			var level_id = get_selected_level_id();
			var category_id = 0;
			var course_id = 0;

			var link = '/resources/resource/' + faculty_id + '/' + department_id
				+ '/' + level_id + '/' + category_id + '/' + course_id;

			if (LOCAL_HOST == true)
				link = SITE_URL + 'resources/resource/' + faculty_id + '/' + department_id
					+ '/' + level_id + '/' + category_id + '/' + course_id;

			window.location.href = link;
		}
	);

	// show news when the 'Find News' is click
	$('button#btn_find_news').click(function()
		{
			var faculty_id = get_selected_faculty_id('select#faculty_select');
			var department_id = get_selected_department_id();
			var level_id = get_selected_level_id();
			var category_id = 0;
			
			var link = '/news/news/' + faculty_id + '/' + department_id
				+ '/' + level_id + '/' + category_id;

			if (LOCAL_HOST == true)
				link = '/project1/news/news/' + faculty_id + '/' + department_id
					+ '/' + level_id + '/' + category_id;

			window.location.href = link;
		}
	);
});

function get_selected_value (selector)
{
	return $(selector).children('option:selected').val();
}

function get_selected_faculty_id (selector)
{
	return get_selected_value(selector);
}

function get_selected_department_id()
{
	return get_selected_value('select#department_select');
}

function get_selected_level_id()
{
	return get_selected_value('select#level_select');
}

function get_selected_news_id()
{
	return get_selected_value('select#news_category_select');
}

function fetch_and_display_departments (faculty_selector, container_selector)
{
	var faculty_id = get_selected_faculty_id(faculty_selector);
	if (! faculty_id)
		return;

	$.post(SITE_URL + 'moderation/get_departments', {'faculty_id': faculty_id},
		function(data, status)
		{
			if (status === 'success')
			{
				$(container_selector + ' select#department_select').remove();
				$(container_selector).append(data);
			}
			else
			{
				alert('Oops! An internal server error occurred. Please reload the page.');
			}
		}
	);
}

function add_category_comment (department_id, level_id, category_id, course_id)
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var author = $('input#category-comment-author').val();
	var comment = $('textarea#category-comment').val();

	if (author == '' || comment == '')
	{
		alert('Please fill out the comment fields before submission!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'department_id': department_id, 'level_id': level_id, 'category_id': category_id,
		'course_id': course_id, 'author': author, 'comment': comment};

	$.post(SITE_URL + 'resources/add_category_comment', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('input#category-comment-author').val('');
				$('textarea#category-comment').val('');
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
				$('div#category-comments-container').append(data);
				$('p.no-comment').addClass('d-none');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function add_resource_comment (resource_id)
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var author = $('input#category-comment-author').val();
	var comment = $('textarea#category-comment').val();

	if (author == '' || comment == '')
	{
		alert('Please fill out the comment fields before submission!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'resource_id': resource_id, 'author': author, 'comment': comment};

	$.post(SITE_URL + 'resources/add_resource_comment', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('input#category-comment-author').val('');
				$('textarea#category-comment').val('');
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
				$('div#category-comments-container').append(data);
				$('p.no-comment').addClass('d-none');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function add_news_category_comment (department_id, level_id, category_id)
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var author = $('input#category-comment-author').val();
	var comment = $('textarea#category-comment').val();

	if (author == '' || comment == '')
	{
		alert('Please fill out the comment fields before submission!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'department_id': department_id, 'level_id': level_id, 'category_id': category_id,
		'author': author, 'comment': comment};

	$.post(SITE_URL + 'news/add_category_comment', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('input#category-comment-author').val('');
				$('textarea#category-comment').val('');
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
				$('div#category-comments-container').append(data);
				$('p.no-comment').addClass('d-none');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function add_news_item_comment (news_id)
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var author = $('input#category-comment-author').val();
	var comment = $('textarea#category-comment').val();

	if (author == '' || comment == '')
	{
		alert('Please fill out the comment fields before submission!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'news_id': news_id, 'author': author, 'comment': comment};

	$.post(SITE_URL + 'news/add_news_comment', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('input#category-comment-author').val('');
				$('textarea#category-comment').val('');
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
				$('div#category-comments-container').append(data);
				$('p.no-comment').addClass('d-none');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function show_resources()
{
	$('div.resource-loading-container').addClass('d-none');
	$('div.resources-wrapper').removeClass('d-none');
}

function show_index()
{
	$('div.index-loading-container').addClass('d-none');
	$('div.index-container').removeClass('d-none');
}

function sub_for_news()
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var faculty_id = get_selected_faculty_id('select#faculty_select');
	var department_id = get_selected_department_id();
	var level_id = get_selected_level_id();
	var email = $('input.sub_email').val();

	if (email == '')
	{
		alert('Please enter the email you want to subscribe with!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'faculty_id': faculty_id, 'department_id': department_id, 'level_id': level_id,
		'email': email};

	$.post(SITE_URL + 'news_sub', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('div#subscription_feedback').removeClass('d-none');
				$('p#feedback_text').html('');
				$('p#feedback_text').html(data);
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function sub_for_resources()
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var faculty_id = get_selected_faculty_id('select#faculty_select');
	var department_id = get_selected_department_id();
	var level_id = get_selected_level_id();
	var email = $('input.sub_email').val();

	if (email == '')
	{
		alert('Please enter the email you want to subscribe with!');
		return;
	}

	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'faculty_id': faculty_id, 'department_id': department_id, 'level_id': level_id,
		'email': email};

	$.post(SITE_URL + 'resources_sub', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('div#subscription_feedback').removeClass('d-none');
				$('p#feedback_text').html('');
				$('p#feedback_text').html(data);
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}

function get_moderator_data()
{
	if ($('img.ajax-loader-indicator').hasClass('ajax-loading'))
		return;

	var faculty_id = get_selected_faculty_id('select#faculty_select');
	var department_id = get_selected_department_id();
	var level_id = get_selected_level_id();
	
	$('img.ajax-loader-indicator').addClass('ajax-loading');

	var post_data = {'faculty_id': faculty_id, 'department_id': department_id, 'level_id': level_id};

	$.post(SITE_URL + 'moderation/get_moderator_data', post_data,
		function(data, status)
		{
			if (status === 'success')
			{
				$('div#phone_feedback').removeClass('d-none');
				$('p#feedback_text').html('');
				$('p#feedback_text').html(data);
				$('img.ajax-loader-indicator').removeClass('ajax-loading');
			}
			else
			{
				alert('Oops! We could not add your comment, please try again.');
			}
		}
	);
}