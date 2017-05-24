<?php
	session_start();
	// $res = $pdao->getPatientDetils(2);

		require_once '../res/core/Database.php';
		$dbcon = Database::connect();

	require_once '../res/core/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="patient"))){
		header("location:../index.php");
	}

	$req_date = $_POST['app_date'];
	$disease = $_POST['disease'];
	$patientid = $_SESSION['user_id'];


$query = $dbcon->query("SELECT max(id) FROM friends.appointment");
            $res = $query->fetch();
	$stmt =$dbcon->prepare("INSERT INTO friends.appointment(id,request_date,disease,patient_id) VALUES($res[0]+1,'".$req_date."','".$disease."','".$patientid."')");
	$stmt->execute();
	echo "<script>
	alert('Appointment request has been sent');
	window.location.href = 'index.php';
	</script>";	
?>