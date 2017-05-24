<?php
//session_start();

	require_once "config.php";
	require_once TEMPLATES."/public_header.php";
	if(isset($_POST['doctor_submit'])){
		 echo 'Submit button was clicked<br>';
		require_once CORE.'/DoctorDao.php';
		$ddao = new DoctorDao();
		$ddao->doctorRegistration(
			$_POST['username'],
			$_POST['password'],
			$_POST['fname'],
			$_POST['lname'],
			$_POST['adhar'],
			$_POST['state'],
			$_POST['pin'],
			$_POST['mobile'],
			$_POST['email'],
			$_POST['speciality']
		);
		header("location:index.php");
	}
 ?>
 <!DOCTYPE html>
  <head>
 <script src="patient_registration.js">
 </script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	 </head>
 <body>
 <form name='registration' onSubmit="return formValidation();" action = "doctor_registration.php" class="form-horizontal" role="form" method="POST">
<div class="content">
	<div class="container">
			<div class="panel-wrapper  col-xs-6 col-xs-offset-3">
			<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Doctor Registration Form</h3>
				  </div>
				  <div class="panel-body">
					<div class="form-group">
						    <label for="inputFirstName" class="control-label col-xs-3">First Name : </label>
						    <div class="col-xs-9">
						        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required="required">
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
						               <input type="date" name="dob" id="dob" class="form-control" value="" required="required" title="">
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
						            <label for="inputUsername" class="control-label col-xs-3">Speciality : </label>
						            <div class="col-xs-9">
						                <select name="speciality" id="input" class="form-control" required="required">
						                	

						                	<option value="Cardiologists">Cardiologists</option>
										    <option value="Dentists">Dentists</option>
										    <option value="Surgeons">Surgeons</option>
										    <option value="Diabetologists">Diabetologists</option>
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
						           <label for="inputPassword" class="control-label col-xs-3">Adhar No. : </label>
						           <div class="col-xs-9">
						               <input type="text" name="adhar" class="form-control" id="adhar" required="required" placeholder="adhar no.">
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
						               <input type="email" name="email" class="form-control" id="email" placeholder="email id" required="required" >
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
						               <button name="doctor_submit" type="submit" class="btn btn-primary">Register</button>
						           </div>
						       </div>
					</form>
				  </div>
			</div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
