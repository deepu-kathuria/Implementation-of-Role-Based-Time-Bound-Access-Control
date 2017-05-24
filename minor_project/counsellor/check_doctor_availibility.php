<?php
	session_start();
	// $res = $pdao->getPatientDetils(2);
	require_once '../config.php';
	require_once CORE.'/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="counsellor"))){
		header("location:".ROOT."/index.php");
	}

?>	

<html>

<head>
	<meta charset="UTF-8">
	<title>iHealthCare</title>
	<meta name = "veiwport" content = "width-device-width , initial-scale = 1.0">
	<!-- linking css library files -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<style>
		.table-label{
			font-family:Verdana;
			font-size:20px;
			text-align:right;
		}
	</style>
</head>
<header>
		<div class="container">
			<div class="page-header">
			  <h1>Counsellor Dashboard<small></small></h1>
			</div>
		</div>
	</header>
<body>

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
						<li><a href="#">Appointments Request</a></li>
						<li><a href="#"></a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="#">cancel_appointment.php</a></li>
						<li ><a href="../patient_details.php">Patient Details</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
								<?php echo $_SESSION['username']; ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-eye-slash"></i> Change Password</a></li>
								<li><a href="../logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>

	<div class ="row">
	<div class="col-md-1"></div>
	<div class="col-md-3">
	<?php
	$speciality = $_POST['speciality'];
	require_once '../res/core/Database.php';
	$dbcon = Database::connect();

	 				try {
	 					echo "<h3>Doctors Available</h3>";
	 					echo "<h4>User-id of Doctors</h4>"."<br>";
						        	
						        	$y = 1;
						    		$stmt =$dbcon->prepare("SELECT * FROM friends.doctor_details WHERE speciality=:spl");
						    		$stmt->execute(array(':spl'=>$speciality));
						    		$stmt->execute();
						    		//echo "xx";
						    		$userRow = $stmt->fetch(PDO::FETCH_ASSOC);	
						    		echo $userRow['user_id'];
						    		    
						    		    
						    	} catch (PDOException $e) {
						    		echo '<br>'.$e->getMessage();
						    	}
?>	
</div>
<div class="col-md-1"></div>
<div class="col-md-4">
	<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title">Assign Doctor</h3>
						  </div>

						  <div class="panel-body">
								<form action="assign_doctor.php" method="POST" class="form-horizontal" role="form">
								<div class="form-group">
									    <label for="patient_id" class="control-label col-md-4">Patient-id</label>
									    <div class="col-md-6">
									        <input type="text" name="patient_id" class="form-control"  required="required" title="">
									    </div>
									</div>
									<div class="form-group">
									    <label for="doctor_id" class="control-label col-md-4">Doctor-id</label>
									    <div class="col-md-6">
									        <input type="text" name="doctor_id" class="form-control"  required="required" title="">
									    </div>
									</div>

									<div class="form-group">
									    <label for="disease" class="control-label col-md-4">Disease</label>
									    <div class="col-md-6">
									        <input type="text" name="disease" class="form-control"  required="required" title="">
									    </div>
									</div>
									<div class="form-group">
						           <label for="start_date" class="control-label col-md-4">Start Date</label>
						           <div class="col-md-6">
						               <input type="date" name="start_date" id="input" class="form-control" value="" required="required" title="">
						           </div>
						           </div>
						           <div class="form-group">
						           <label for="end_date" class="control-label col-md-4">End Date</label>
						           <div class="col-md-6">
						               <input type="date" name="end_date" id="input" class="form-control" value="" required="required" title="">
						           </div>
						 			</div>
						 			<div class="form-group">
						           <label for="start_time" class="control-label col-md-4">Start Time</label>
						           <div class="col-md-6">
						               <input type="time" name="start_time" id="input" class="form-control" value="" required="required" title="">
						           </div>
						 			</div>
						 			<div class="form-group">
						           <label for="end_time" class="control-label col-md-4">End Time</label>
						           <div class="col-md-6">
						               <input type="time" name="end_time" id="input" class="form-control" value="" required="required" title="">
						           </div>
						 			</div>

									<div class="form-group">
									    <div class="col-xs-offset-4 col-xs-4">
									        <button type="submit" class="btn btn-primary">Confirm</button>
									    </div>
									</div>
								</form>
						  </div>
					</div>
</div>
</div>
</body>
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>