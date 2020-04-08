
var LOCAL_HOST = true;

$(document).ready(function (){
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
	// display departments for currently selected faculty
	fetch_and_display_departments();

	// update the select options when the faculty select changes
	$('select#faculty_select').change(function()
		{
			fetch_and_display_departments();
		}
	);

	// show resources when the 'Find Resources' is click
	$('button#btn_find_resources').click(function()
		{
			var faculty_id = get_selected_faculty_id();
			var department_id = get_selected_department_id();
			var level_id = get_selected_level_id();
			var category_id = 0;
			var course_id = 0;

			var link = '/resources/resource/' + faculty_id + '/' + department_id
				+ '/' + level_id + '/' + category_id + '/' + course_id;

			if (LOCAL_HOST == true)
				link = '/project1/resources/resource/' + faculty_id + '/' + department_id
					+ '/' + level_id + '/' + category_id + '/' + course_id;

			window.location.href = link;
		}
	);

	$('button#btn-submit-category-comment').click(
		function()
		{
			foo();
		}
	);
});

function get_selected_value (selector)
{
	return $(selector).children('option:selected').val();
}

function get_selected_faculty_id()
{
	return get_selected_value('select#faculty_select');
}

function get_selected_department_id()
{
	return get_selected_value('select#department_select');
}

function get_selected_level_id()
{
	return get_selected_value('select#level_select');
}

function fetch_and_display_departments()
{
	var faculty_id = get_selected_faculty_id();

	$.post('moderation/get_departments', {'faculty_id': faculty_id},
		function(data, status)
		{
			if (status === 'success')
			{
				$('select#department_select').remove();
				$('div#departments_select_container').append(data);
			}
			else
			{
				alert('Oops! An internal server error occurred. Please reload the page.');
			}
		}
	);
}

function add_comment (department_id, level_id, category_id, course_id)
{
	
}

function foo()
{
	var faculty_id =1; 

	$.post('moderation/add_category_comment', {},
		function(data, status)
		{alert(status);
			if (status === 'success')
			{
				alert(data);
			}
			else
			{
				alert('Oops! An internal server error occurred. Please reload the page.');
			}
		}
	);
}