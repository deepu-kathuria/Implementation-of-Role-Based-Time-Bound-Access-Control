<?php
session_start();
require_once 'res/core/User.php';
$u = new User();
if($u->logout()){
	header("location:index.php");
}


?>