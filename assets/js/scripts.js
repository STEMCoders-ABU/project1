

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
});

function get_selected_faculty_id()
{
	return $('select#faculty_select').children('option:selected').val();
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