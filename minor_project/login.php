<?php 

session_start();

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	echo '<br>'.$username.'<br>'.$password;
	require_once 'res/core/User.php';
	$u = new User();
	echo $u->login($username,$password);
	
}
	

 ?>