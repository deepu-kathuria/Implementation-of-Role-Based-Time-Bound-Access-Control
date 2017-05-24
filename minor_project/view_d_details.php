<?php
	session_start();
	
	require_once 'res/core/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="admin"))){
		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iHealthCare</title>
	<meta name = "veiwport" content = "width-device-width , initial-scale = 1.0">
	<!-- linking css library files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>
	<header>
		<div class="container">
			<div class="page-header">
			  <a href="index.php"><h1>iHealthCare</h1></a>
			</div>
		</div>
	</header>
	<div class="content">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"></a>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li ><a href="view_doctor_details.php">Doctor Details</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
								<?php echo $_SESSION['username']; ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../change_password_for_all.php"><i class="fa fa-eye-slash"></i> Change Password</a></li>
								<li><a href="../logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<div class = "row">
		<div class="col-md-1"></div>
			<div class="col-md-10">
			<table class = "table">
			<tr>
				<td>User-id</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Date of Birth</td>
				<td>Gender</td>
				<td>Adhar Number</td>
				<td>State</td>
				<td>Pin</td>
				<td>Phone Number</td>
				<td>Email</td>
				<td>Speciality</td>

			</tr>
			<?php
				$role = $_SESSION['user_role'];

				require_once 'res/core/Database.php';
								        $dbcon = Database::connect();
								        
								        try {
								        	//echo "1";
								        	//echo $_SESSION['user_role'];
								        	$y = 1;
								    		$stmt =$dbcon->prepare("SELECT * FROM friends.role_permission WHERE role_name = :role AND on_table = 'doctor'");
								    		$stmt->execute(array(':role'=>$role));
								    		$stmt->execute();
								    		$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
								    		//echo $userRow['permission_id'];
								    		    if(($userRow['permission_id'] == 1 && $_SESSION['user_role']=='admin') || ($userRow['permission_id'] == 1 && $_SESSION['user_role']=='super_admin'))
								    		    {
								    		    	$stmt1 =$dbcon->prepare("SELECT * FROM friends.doctor WHERE user_id = :uid ");
										    		$stmt1->execute(array(':uid'=>$_POST['user_id']));
										    		$stmt1->execute();
										    		$userRow1 = $stmt1->fetch(PDO::FETCH_ASSOC);							
										    		if($stmt1->rowCount() > 0)
										    		{
								    		    	$stmt2 =$dbcon->prepare("SELECT * FROM friends.doctor_details WHERE user_id = :uid ");
										    		$stmt2->execute(array(':uid'=>$_POST['user_id']));
										    		$stmt2->execute();
								    		    	$userRow2 = $stmt2->fetch(PDO::FETCH_ASSOC);
								    		    	//echo $userRow['speciality'];
								    		    	?>
								    		    	<tr>
								    		    	<td><?php echo $userRow1['user_id'];?></td>
								    		    	<td><?php echo $userRow1['fname'];?></td>
								    		    	<td><?php echo $userRow1['lname'];?></td>
								    		    	<td><?php echo $userRow1['dob'];?></td>
								    		    	<td><?php echo $userRow1['gender'];?></td>
								    		    	<td><?php echo $userRow1['adhar'];?></td>
								    		    	<td><?php echo $userRow1['state'];?></td>
								    		    	<td><?php echo $userRow1['pin'];?></td>
								    		    	<td><?php echo $userRow1['mobile'];?></td>
								    		    	<td><?php echo $userRow1['email'];?></td>
								    		    	<td><?php echo $userRow2['speciality'];?></td>
								    		    	</tr>
								    		    	<?php
								    		    	}
								    		    	else
								    		    	{
								    		    		header('location:user_is_not_a_doctor.php');
								    		    	}
								    		    }elseif($userRow['permission_id'] == 1 && $_SESSION['user_role']=='counsellor'){
								    					//echo "1";
										    		
										    			$stmt1 =$dbcon->prepare("SELECT * FROM friends.counsellor_department WHERE user_id = :uid");
										   	    		$stmt1->execute(array(':uid'=>$_SESSION['user_id']));
										   	    		$stmt1->execute();
										   	    		$userRow1 = $stmt1->fetch(PDO::FETCH_ASSOC);
										   	    		$department1 = $userRow1['department'];

										   	    		$stmt2 =$dbcon->prepare("SELECT * FROM friends.doctor_details WHERE user_id = :did");
										   	    		$stmt2->execute(array(':did'=>$_POST['user_id']));
										   	    		$stmt2->execute();
										   	    		$userRow2 = $stmt2->fetch(PDO::FETCH_ASSOC);
										   	    		$speciality1 = $userRow2['speciality'];
										   	    		//echo $department1."<br>".$speciality1;
										   	    		$stmt3 =$dbcon->prepare("SELECT * FROM friends.department WHERE departmentt = :depar AND speciality = :sptt");
										   	    		$stmt3->execute(array(':depar'=>$department1 , ':sptt'=>$speciality1));
										   	    		$stmt3->execute();
										   	    		$userRow3 = $stmt3->fetch(PDO::FETCH_ASSOC);
										   	    		//echo $stmt3->rowCount();
										   	    		if($stmt3->rowCount() > 0)
										   	    		{
										   	    			$stmt4 =$dbcon->prepare("SELECT * FROM friends.doctor WHERE user_id = :uid ");
												    		$stmt4->execute(array(':uid'=>$_POST['user_id']));
												    		$stmt4->execute();
												    		$userRow4 = $stmt4->fetch(PDO::FETCH_ASSOC);
												    		?>
										    		    	<tr>
										    		    	<td><?php echo $userRow4['user_id'];?></td>
										    		    	<td><?php echo $userRow4['fname'];?></td>
										    		    	<td><?php echo $userRow4['lname'];?></td>
										    		    	<td><?php echo $userRow4['dob'];?></td>
										    		    	<td><?php echo $userRow4['gender'];?></td>
										    		    	<td><?php echo $userRow4['adhar'];?></td>
										    		    	<td><?php echo $userRow4['state'];?></td>
										    		    	<td><?php echo $userRow4['pin'];?></td>
										    		    	<td><?php echo $userRow4['mobile'];?></td>
										    		    	<td><?php echo $userRow4['email'];?></td>
										    		    	<td><?php echo $userRow2['speciality'];?></td>
										    		    	</tr>
										    		    	<?php

												   	    	}
												   	    	else
												   	    	{
												   	    		header('location:user_is_not_a_doctor.php');
												   	    	}

								    				}
								    				else
								    				{
								    					header('location:user_is_not_a_doctor.php');
								    				}
								    			
								    		    
								    	} catch (PDOException $e) {
								    		echo '<br>'.$e->getMessage();
								    	}
								    

								   
			?>
			</table>
			</div>
			
</div>
	<!-- linking javascript files -->
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>