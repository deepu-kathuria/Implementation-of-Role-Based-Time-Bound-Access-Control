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
						<li ><a href="../patient_details.php">Patient Details</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="cancel_appointment.php">Cancel Appointment</a></li>
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
			<div class="col-md-1"></div>
  			<div class="col-md-4">
  				<table class ="table">
					<tr>
					<td>Number</td>
					<td>Patient-id</td>
					<td>Disease</td>
					</tr>
					<?php
					require_once '../res/core/Database.php';
						        $dbcon = Database::connect();

						        try {
						        	$username = '54';
						        	$password = 'llll';
						        	$y = 1;
						    		$stmt =$dbcon->prepare("SELECT * FROM friends.appointment WHERE start3 IS NULL");
						    		$stmt->execute();
						    		//echo "xx";
						    		    while($userRow = $stmt->fetch(PDO::FETCH_ASSOC))
						    		    {
						    		    	?>
						    		    	
						    		    	<tr>
						    		    	<td><?php echo $y;?></td>
						    		    	<td><?php echo  $userRow['patient_id'];?></td>	
						    				
						  	    			<?php
						    			$y = $y+1;?>
						    			<td>
						    			<?php echo $userRow['disease'];?></td>
						    			</tr>
						    			<?php
						    			}
						    		    
						    	} catch (PDOException $e) {
						    		echo '<br>'.$e->getMessage();
						    	}
						    	?>
					</table>
  			</div>
  			<div class="col-md-1"></div>
  			<div class="col-md-4">
  				<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title">Doctor Availibility</h3>
						  </div>
						  <div class="panel-body">
								<form action="check_doctor_availibility.php" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
									    <label for="specialty" class="control-label col-md-4">Specialty : </label>
									    <div class="col-md-4">
									        <input type="text" name="speciality" class="form-control"  required="required" title="">
									    </div>
									</div>
									
									<div class="form-group">
									    <div class="col-xs-offset-4 col-xs-4">
									        <button type="submit" class="btn btn-primary">Check</button>
									    </div>
									</div>
								</form>
						  </div>
					</div>
				</div>
  			</div>
  			</div>
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>