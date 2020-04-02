<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbase.php';

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$Department = mysqli_real_escape_string($conn, $_POST['Department']);
$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (empty($firstname) || empty($lasttname) || empty($email) || empty($username) || empty($Department) || empty($password)) {
	header("Location: ../Scoders.php?signup=empty");
	exit();
}else{
	if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
		header("Location: ../Scoders.php?signup=invalid");
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../Scoders.php?signup=email");
	exit();
		}else{
			$sql = "SELECT * FROM coders WHERE user_uid='$username'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        				header("Location: ../Scoders.php?signup=usertaken");
	exit();
        }else{
        	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        	$sqm = "INSERT INTO coders (user_first, user_last, user_uid, user_email, user_dept, user_faculty, user_category, user_level, user_pwd) VALUES ('$firstname', '$lastname', '$username', '$email', '$Department', '$faculty', '$category', '$level', '$hashedPwd');";
        	mysqli_query($conn, $sqm);
        	      				header("Location: ../index.php?signup=success");
	exit();
        }

		}
	}
}

}else{
	header("Location: ../Scoders.php");
	exit();
}