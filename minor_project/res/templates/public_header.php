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
	<header>
		<div class="container">
			<a href="index.php"><h1>iHealthCare</h1></a>
		</div>
		<div class="container">
	<nav class="navbar navbar-inverse" role="navigation">
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
				<li><a href="index.php">Home</a></li>
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" role="search" method="post" action="login.php">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="username" required="required">
					</div>
					<div class="form-group">
						<input type="password" required="required" name="password" class="form-control" placeholder="password">
					</div>
					<button type="submit" class="btn btn-info"><i class="fa fa-user"></i> login</button>
				</form>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="patient_registraion.php">Patient</a></li>
						<li><a href="doctor_registration.php">Doctor</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
	</div>
	</header>