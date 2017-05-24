<?php
	session_start();
	
	require_once '../res/core/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="admin"))){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iHealthCare</title>
	<meta name = "veiwport" content = "width-device-width , initial-scale = 1.0">
	<!-- linking css library files -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">

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
						<li ><a href="view_booking.php">View Appointment</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
								<?php echo $_SESSION['username']; ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="change_password_for_all.php"><i class="fa fa-eye-slash"></i> Change Password</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<div class = "row">
		<div class="col-md-2"></div>
			<div class="col-md-4">
			<table class = "table">
			<tr>
				<td>Patient-id</td>
				<td>Doctor-id</td>
				<td>Disease</td>
				<td>Start Date</td>
				

			</tr>
			<?php
				$role = $_SESSION['user_role'];

				require_once '../res/core/Database.php';
								        $dbcon = Database::connect();
								        
								        try {
								        	//echo "1";
								        	//echo $_SESSION['user_role'];
								        	
								    		    	$stmt1 =$dbcon->prepare("SELECT * FROM friends.appointment WHERE patient_id = :uid  AND disease=:dis");
										    		$stmt1->execute(array(':uid'=>$_POST['user_id'],':dis'=>$_POST['disease']));
										    		$stmt1->execute();
										    		$userRow1 = $stmt1->fetch(PDO::FETCH_ASSOC);							
										    		if($stmt1->rowCount() > 0)
										    		{
								    		    	
								    		    	//echo $userRow['speciality'];
								    		    	?>
								    		    	<tr>
								    		    	<td><?php echo $userRow1['patient_id'];?></td>
								    		    	<td><?php echo $userRow1['doctor_id'];?></td>
								    		    	<td><?php echo $userRow1['disease'];?></td>
								    		    	<td><?php echo $userRow1['start'];?></td>
								    		    	
								    		    	<!--<td><?php// echo $userRow2['speciality'];?></td>-->
								    		    	</tr>
								    		    	<?php
								    		    	}
								    		    	else
								    		    	{
								    		    		echo "<script>
														alert('Patient is not having any appointment');
								    		    		window.location.href = 'view_booking.php';
								    					</script>";

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