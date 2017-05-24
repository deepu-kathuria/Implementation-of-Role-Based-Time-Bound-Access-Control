<?php 
	require_once "config.php";
	require_once TEMPLATES."/public_header.php";
	if(isset($_POST['patient_submit'])){
		// echo 'Submit button was clicked<br>';
		require_once CORE.'/DoctorDao.php';
		$ddao = new DoctorDao();
		$ddao->doctorRegistration(
			$_POST['username'],
			$_POST['password'],
			$_POST['fname'],
			$_POST['lname'],
			$_POST['dob'],
			$_POST['gender'],
			$_POST['adhar'],
			$_POST['state'],
			$_POST['pin'],
			$_POST['mobile'],
			$_POST['email'],
			$_POST['speciality']
		);
		header("location:sign_up_successful.php");
	}
 ?>