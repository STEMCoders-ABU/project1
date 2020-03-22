

$(document).ready(function (){
	$('#sidebarCollapse').on('click', function (){
		$('#sidebar').toggleClass('active');
	});

});

$('#b1').click(function (){
		$('#course_name').text(' Cosc 101');
});
$('#b2').click(function (){
	$('#course_name').text(' Physics 131');
});
$('#b3').click(function (){
		$('#course_name').text(' Maths 101');
});
$('#b4').click(function (){
	$('#course_name').text(' Maths 105');
});
$('#b5').click(function (){
	$('#course_name').text(' Gens 101');
});
$('#b6').click(function (){
	$('#course_name').text(' Gens 103');
});
$('#b7').click(function (){
	$('#course_name').text(' Physics 111');
});
$('#b8').click(function (){
	$('#course_name').text(' Chem 101');
});