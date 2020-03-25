

$(document).ready(function (){
	$('#resources-sidebar-collapse').on('click', function (){
		$('#resources-sidebar').toggleClass('open');
		$('div .resources-siderbar-wrapper').toggleClass('open');
		$('div#resources-content').toggleClass('open');
		$(this).toggleClass('active');
	});

});