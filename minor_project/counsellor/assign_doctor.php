<?php
					require_once '../res/core/Database.php';
						        $dbcon = Database::connect();
						        $disease=$_POST['disease'];
						        $d_id = $_POST['doctor_id'];
						        $patient = $_POST['patient_id'];
						       	$start_time =  $_POST['start_date']." ".$_POST['start_time'].":00";
						       	$end_time = $_POST['end_date']." ".$_POST['end_time'].":00";
						       	$end_date = $_POST['end_date'];
						        try {
						        	
						        	
						    		$stmt =$dbcon->prepare("UPDATE friends.appointment SET(doctor_id,start3,end2) = (:did,:start_t,:end_t) WHERE disease = :dis AND patient_id = :pid");
						    		$stmt->execute(array(':did'=>$d_id,':start_t'=>$start_time,':end_t'=>$end_time,':dis'=>$disease,':pid'=>$patient));
						    		//$stmt->execute();
						    		if($stmt->rowCount()>0)
						    		echo "Appointment Done";
						    	} catch (PDOException $e) {
						    		echo '<br>'.$e->getMessage();
						    	}
?>