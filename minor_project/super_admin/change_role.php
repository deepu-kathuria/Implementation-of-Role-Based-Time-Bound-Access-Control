<?php
	session_start();
	
	require_once '../res/core/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="admin"))){
		header("location:../index.php");

	}

		if(isset($_POST['username']) && isset($_POST['present_role']) && isset($_POST['change_role_to']) )
		{
			$username=$_POST['username'];
			$presentrole=$_POST['present_role'];
			$changeroleto=$_POST['change_role_to'];
			$cp = new User();
			echo $cp->changeRole($username,$presentrole,$changeroleto);
			
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
						<li ><a href="../view_doctor_details.php">Doctor Details</a></li>
						<li ><a href="../patient_details.php">Patient Details</a></li>
						<li ><a href="change_password.php">Change Password</a></li>
						<li ><a href="counsellor_registration.php">Add Counsellor</a></li>
						<li ><a href="view_appointment.php">View Appointment</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="change_role.php">Change Roles</a></li>
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

	<div class ="col-md-4"></div>
	<div class="col-md-6">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title">Change Role</h3>
						  </div>
						  <div class="panel-body">
								<form action="change_role.php" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
									    <label for="user_name" class="control-label col-md-4">Username : </label>
									    <div class="col-md-4">
									        <input type="text" name="username" class="form-control"  required="required" title="">
									    </div>
									</div>
									<div class="form-group">
										  <label class="col-md-4 control-label" for="presentrole">Present Role</label>
										  <div class="col-md-4">
										    <select id="selectbasic" name="present_role" class="form-control">
										      <option value="2">Counsellor</option>
										      <option value="1">Admin</option>
										    </select>
										  </div>
										</div>
									<div class="form-group">
										  <label class="col-md-4 control-label" for="changerole">Change Role To</label>
										  <div class="col-md-4">
										    <select id="selectbasic" name="change_role_to" class="form-control">
										      <option value="2">Counsellor</option>
										      <option value="1">Admin</option>
										    </select>
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

	<!-- linking javascript files -->
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>