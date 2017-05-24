<?php
	session_start();
	// $res = $pdao->getPatientDetils(2);
	require_once '../config.php';
	require_once CORE.'/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="patient"))){
		header("location:".ROOT."/index.php");
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
	<style>
		.table-label{
			font-family:Verdana;
			font-size:20px;
			text-align:right;
		}
	</style>
</head>
<body>
	<header>
		<div class="container">
			<div class="page-header">
			 <a href="index.php"> <h1>iHealthCare</h1></a>
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
						<li><a href="index.php">Book Appointment</a></li>
						<li><a href="view_appointment.php">View Appointments</a></li>
						<li><a href="#">Feedback</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
								<?php echo $_SESSION['username']; ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<!--<li><a href="#"><i  class="fa fa-gear"></i> Settings</a></li>-->
								<li><a href="../change_password_for_all.php"><i class="fa fa-eye-slash"></i> Change Password</a></li>
								<li><a href="../logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		<!--  -->
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-6">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-user-md"></i> Patient Information</h3>
						  </div>
						  <div class="panel-body">
						  <?php  
							  require_once CORE.'/PatientDao.php';
							  $pdao = new PatientDao();
							  $res = $pdao->getPatientDetils($_SESSION['user_id']);
						    ?>
								<table style="">
									<tr>
										<td class="table-label">Name : </td>
										<td>
											<?php echo $res->fname.' '.$res->lname; ?>
										</td>
									</tr>
									<tr>
										<td class="table-label">Date of Birth : </td>
										<td>
											<?php echo $res->dob; ?>
										</td>
									</tr>
									<tr>
										<td  class="table-label">Gender : </td>
										<td>
											<?php echo $res->gender; ?>
										</td>
									</tr>
									<tr>
										<td class="table-label">Mobile No. : </td>
										<td>
											<?php echo $res->mobile; ?>
										</td>
									</tr>
									<tr>
										<td  class="table-label">Email id. : </td>
										<td>
											<?php echo $res->email; ?>
										</td>
									</tr>
									<tr>
										<td  class="table-label">Adhar No. : </td>
										<td>
											<?php echo $res->adhar; ?>
										</td>
									</tr>
									<tr> 
										<td  class="table-label">State : </td>
										<td>
											<?php echo $res->state; ?>
										</td>
									</tr>
									<tr>
										<td  class="table-label">Pin code : </td>
										<td>
											<?php echo $res->pin; ?>
										</td>
									</tr>
								</table>
						  </div>
					</div>
				</div>
				<!--  -->
				<div class="col-sm-6">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title">Book Appointment</h3>
						  </div>
						  <div class="panel-body">
								<form action="book_appointment.php" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
									    <label for="inputFirstName" class="control-label col-xs-3">Select Date : </label>
									    <div class="col-xs-9">
									        <input type="date" name="app_date" class="form-control"  required="required" title="">
									    </div>
									</div>
									<div class="form-group">
									    <label for="inputFirstName" class="control-label col-xs-3">Disease : </label>
									    <div class="col-xs-9">
									        <input type="text" name="disease" class="form-control"  required="required" title=""> 
									    </div>
									   
									</div>
									
									<hr>
									<div class="form-group">
									    <div class="col-xs-offset-3 col-xs-4">
									        <button type="submit" class="btn btn-primary">Confirm</button>
									    </div>
										</div>
								</form>
						  </div>
					</div>
				</div>



			</div>
		</div>
		<!--  -->



		</div>

	
	</div>

	<!-- linking javascript files -->
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>