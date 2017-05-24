<?php

session_start();
require_once "res/core/User.php";

if(isset($_POST['confirm_password']) && isset($_POST['new_password']) )
{
	//echo "xxx";
	$username=$_SESSION['username'];
	$new_password=$_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	if($new_password == $confirm_password){
	$cd = new User();
	echo $cd->changePassword_for_all($username,$new_password);
}
 else{
	echo "<script>alert('Password did not match');
	window.location.href = 'change_password_for_all.php';</script>
	";
	
	exit();
}
}
	


?>