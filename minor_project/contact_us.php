<?php

session_start();
require_once "res/core/User.php";

if(isset($_POST['submit'])  )
{
	//echo "xxx";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	require_once 'res/core/Database.php';
	$dbcon = Database::connect();
	$stmt =$dbcon->prepare("INSERT INTO friends.contact_us values(:name,:email,:subject,:message)");
	    		$stmt->execute(array(':name'=>$name,':email'=>$email,':subject'=>$subject,':message'=>$message));
	    		echo "<script>
					alert('Form submitted');
					window.location.href = 'index.php';
					</script>";	
} 
	


?>