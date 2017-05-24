
<?php 

if(isset($_POST['coun_submit'])){
	// echo 'Submit button was clicked<br>';
	require_once '../res/core/CounsellorDao.php';
	$pdao = new CounsellorDao();
	$pdao->counsellorRegistration(
		$_POST['username'],
		$_POST['password'],
		$_POST['fname'],
		$_POST['lname'],
		$_POST['dob'],
		$_POST['gender'],
		$_POST['adhar'],
		$_POST['state'],
		$_POST['pin'],
		$_POST['mobile'],
		$_POST['email'],
		$_POST['department']
	);
	//	header("location:patient_registration.php");
	 
}

?>

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
<script src = "../registration.js"></script>
	<meta charset="UTF-8">
	<title>iHealthCare</title>
	<meta name = "veiwport" content = "width-device-width , initial-scale = 1.0">
	<!-- linking css library files -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="../patient_registration.js">
 </script>
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
						<li ><a href="view_booking.php">View Appointment</a></li>
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
	<div class="content">
		<div class="container">
			<div class="panel-wrapper  col-xs-6 col-xs-offset-3">
			<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Counsellor Registration form</h3>
				  </div>
				  <div class="panel-body">
					<form name='registration' onSubmit="return formValidation();" action = "counsellor_registration.php" class="form-horizontal" role="form" method="POST">
						<div class="form-group">
						    <label for="inputFirstName" class="control-label col-xs-3">First Name : </label>
						    <div class="col-xs-9">
						        <input type="text" name="fname" class="form-control" id="inputName" placeholder="First Name" required="required">
						    </div>
						</div>
						<div class="form-group">
						    <label for="inputLastName" class="control-label col-xs-3">Last Name : </label>
						    <div class="col-xs-9">
						        <input type="text" name="lname" required="required" class="form-control" id="lname" placeholder="LastName">
						    </div>
						</div>
						<div class="form-group">
						           <label for="inputUsername" class="control-label col-xs-3">Date of Birth : </label>
						           <div class="col-xs-9">
						               <input type="date" name="dob" id="input" class="form-control" value="" required="required" title="">
						           </div>
						 </div>
						<div class="form-group">
						           <label for="inputUsername" class="control-label col-xs-3">Gender : </label>
						           <div class="col-xs-9">
						               <select name="gender" id="input" class="form-control" required="required">
						               	<option value="Male">Male</option>
						               	<option value="Female">Female</option>
						               </select>
						           </div>
						 </div>
						 <div class="form-group">
						            <label for="inputUsername" class="control-label col-xs-3">Username : </label>
						            <div class="col-xs-9">
						                <input type="text" name="username" class="form-control" id="username" required="required" placeholder="username">
						            </div>
						  </div>
						       <div class="form-group">
						           <label for="inputPassword" class="control-label col-xs-3">Password : </label>
						           <div class="col-xs-9">
						               <input type="password" name="password" class="form-control" id="password" required="required" placeholder="Password">
						           </div>
						       </div>		       
						       
						       <div class="form-group">
						           <label for="department" class="control-label col-xs-3">Department : </label>
						           <div class="col-xs-9">
						               <select name="department" id="input" class="form-control" required="required">
						               	<option value="department1">Department 1</option>
						               	<option value="department2">Department 2</option>
						               	<option value="department3">Department 3</option>
										</select>
						           </div>
						           </div>
						       <div class="form-group">
						           <label for="inputPassword" class="control-label col-xs-3">Adhar No. : </label>
						           <div class="col-xs-9">
						               <input type="text" name="adhar" class="form-control" id="adhar." required="required" placeholder="adhar no.">
						           </div>
						       </div>
						       <div class="form-group">
						           <label for="inputState" class="control-label col-xs-3">State : </label>
						           <div class="col-xs-9">
						               <input type="text" name="state" required="required" class="form-control" id="state" placeholder="State">
						           </div>
						       </div>
						       <div class="form-group">
						           <label for="inputPinCode" class="control-label col-xs-3">Pin Code : </label>
						           <div class="col-xs-9">
						               <input type="text" name="pin" required="required" placeholder="pin" class="form-control" id="pin">
						           </div>
						       </div>
						       
						       <div class="form-group">
						           <label for="inputEmail" class="control-label col-xs-3">Email : </label>
						           <div class="col-xs-9">
						               <input type="email" name="email" class="form-control" id="inputEmail" placeholder="emil id" required="required" >
						           </div>
						       </div>
						       <div class="form-group">
						           <label for="inputMobile" class="control-label col-xs-3">Mobile No. : </label>
						           <div class="col-xs-9">
						               <input type="text" name="mobile" required="required" class="form-control" id="mobile" placeholder="Mobile No. ">
						           </div>
						       </div>
						       <div class="form-group">
						           <div class="col-xs-offset-3 col-xs-9">
						               <button name="coun_submit" type="submit" class="btn btn-primary">Register</button>
						           </div>
						       </div>			
							</form>
				  </div>
			</div>
			</div>
		</div>

	</div>
	<!-- linking javascript files -->
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
	</body>
	</html>
