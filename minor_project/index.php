<?php
	session_start();
	
	require_once 'res/core/User.php';
	$u = new User();
	if($u->is_login()){
		$u->redirect($_SESSION['user_role']);
	}
	if(isset($_POST['username']) && isset($_POST['password']))
	{
	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo '<br>'.$username.'<br>'.$password;
	$u = new User();
	echo $u->login($username,$password);
	
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
<body style = "background-color :#add8e6" onLoad="document.login.username.focus()">
	<header>
		<div class="container">
			<h1><a href = "index.php">iHealthCare</a></h1>
		</div>
		
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
				<li><a href="#contact_us">Contact Us</a></li>
				<li><a href="about_us.html">About Us</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" name="login" role="search" method="post" action="index.php">
					<div class="form-group">
						<input type="text" name="username"  id ="username" class="form-control" placeholder="username" required="required">
					</div>
					<div class="form-group">
						<input type="password" required="required" name="password" class="form-control" placeholder="password">
					</div>
					<button type="submit" class="btn btn-info"><i class="fa fa-user"></i> login</button>
				</form>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="patient_registration.php">Patient</a></li>
						<li><a href="doctor_registration.php">Doctor</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
		</header>

<div id ="myslider" class = "carousel slide" data-ride ="carousel">
      <ol class = "carousel-indicators">
        <li data-target ="#myslider" data-slide-to="0" class = "active"> </li>
        <li data-target ="#myslider" data-slide-to="1" height = "200px"> </li>
      </ol>
    
      <div class ="carousel-inner">
        <div class = "item active">
          <img src="img/d (4).jpg"  height = "200px" width ="100%">
        </div>

        <div class = "item ">
          <img src="img/f (3).jpg" height = "200px" width ="100%">
        </div>
      </div>

      <a class ="carousel-control left" href ="#myslider" data-slide="prev">
        <span class ="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class ="carousel-control right" href="#myslider" data-slide="next">
        <span class ="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
<!--jumbotron finished-->
<br>
<div class="row">
	<div class ="container">
	<div class="col-md-3" >
		<h2>Becoming a patient</h3>
		<p1>iHealthCare provides the data for the patient at any time just with one click ! It also provides the security of the patient data ,so that no outsider could access the data of any patient.</p1>
	</div>
	
 
  <div class="col-md-4">
   <h2>Call for an appointment</h3>
   <p align ="center">9914103177<p>
   	<p align ="center">Call Today!</p>
</div>

	<div class="col-md-4"> 
		<h2>Patient online services</h2>
			<p>See your results and records as fast as your clinician does. Manage your appointments with updated schedule/instructions. Handle your bills more quickly and simply.</p>
	</div>
  </div>
</div>

	<!--Contact-->
	<br>
	<div id= "contact_us">
	<h1 align = "center"><u>Contact Us</u></h1>
      <form id="contact-form" method="post" action="contact_us.php" role="form">

                <div class="messages"></div>
                <div class="controls">
         
                  <div class="row">
  								<div class="col-md-1"></div>
  								<div class="col-md-3" align = "right"><input type = "text" placeholder=" Your Name" name ="name" style="font-size:12pt;height:40px;width:320px ;border-radius: 5px;"required></div>
  								<div class="col-md-3 col-xm-3" align = "right"><input type = "text" placeholder=" Your Email" name ="email" style="font-size:12pt;height:40px;width:320px ;border-radius: 5px;"required></div>
  								<div class="col-md-3"> <input type = "text" placeholder="   Subject" name ="subject" style="font-size:12pt;height:40px;width:363px ;border-radius: 5px;"required></div>
							</div>
                            
                            <div class="row">
                            <div class="col-md-1"></div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        
                                      <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="12 " required="required" data-error="Please,leave us a message." style = "width :1054px"></textarea>
                                    <div class="help-block with-errors"></div>
                                 </div>
                               </div>
                             </div>
                            <div class="row">
                              <div class ="col-md-1"></div>
                                <div class="col-md-9" align ="right">
                                    <input name ="submit" type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                        </div>

                    </form>

</div>





	<!-- linking javascript files -->
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>