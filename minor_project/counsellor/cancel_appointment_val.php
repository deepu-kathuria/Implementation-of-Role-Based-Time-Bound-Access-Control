<?php
session_start();
	require_once '../config.php';
	require_once CORE.'/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="counsellor"))){
		header("location:".ROOT."/index.php");
	}
						    		    	
	
	// $res = $pdao->getPatientDetils(2);


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
			  <a href = "index.php"><h1>iHealthCare</h1></a>
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
						<li><a href="appointment_requests.php">Appointments Request</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="cancel_appointment.php">Cancel Appointment</a></li>
						<li ><a href="../view_doctor_details.php">Doctor Details</a></li>
						<li ><a href="../patient_details.php">Patient Details</a></li>
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
<div class="row">
  			<div class="col-md-2"></div>
  			<div class="col-md-4">
  				<?php
  				require_once '../res/core/Database.php';
						        $dbcon = Database::connect();
						        $disease=$_POST['disease'];
						        $patient = $_POST['patient_id'];
						        try {
						        	
						        	//echo $patient;
						        	//echo $disease;

						    		$stmt =$dbcon->prepare("DELETE from friends.appointment WHERE disease = :dis AND patient_id = :pid");
						    		$stmt->execute(array(':dis'=>$disease,':pid'=>$patient));
						    		//$stmt->execute();
						    		if($stmt->rowCount()>0)
					  				{
					  					echo "<h3>Appointment Cancelled</h3>";
					  				} 
					  				else
					  				{
					  					echo "<h3>Enter Valid input</h3>";
					  				}
					  				} catch (PDOException $e) {
									echo '<br>'.$e->getMessage();
									}
					  				
					  ?>
				</div>
  			</div>
  			</div>
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>