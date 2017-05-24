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
			  <h1><a href = "index.php">iHealthCare</a></h1>
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
						
						<li ><a href="change_password_for_all.php">Change Password</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
								<?php echo $_SESSION['username']; ?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="change_password_for_all.php"><i class="fa fa-eye-slash"></i> Change Password</a></li>
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
								<h3 class="panel-title">Change Password</h3>
						  </div>
						  <div class="panel-body">
								<form action="change_password_for_all_val.php" method="POST" class="form-horizontal" role="form">
									
									
								<div class="form-group">
  									<label class="col-md-4 control-label" for="new_password">New Password</label>  
  									<div class="col-md-4">
  										<input  name="new_password" type="password" placeholder="New Password" class="form-control input-md">
    
  									</div>
								</div>

								<div class="form-group">
  									<label class="col-md-4 control-label" for="confirm_password">Confirm Password</label>  
  									<div class="col-md-4">
  										<input  name="confirm_password" type="password" placeholder="Confirm Password" class="form-control input-md">
    
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
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>