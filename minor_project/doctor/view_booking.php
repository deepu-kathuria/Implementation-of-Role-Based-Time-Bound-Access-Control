<?php
	session_start();
	ob_start();
	// $res = $pdao->getPatientDetils(2);
	require_once '../config.php';
	require_once CORE.'/User.php';
	$u = new User();
	if((!($u->is_login())) && (!($_SESSION['user_role']=="doctor"))){
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
					<li><a href="index.php">Appointment</a></li>
						<li><a href="#">Feedback</a></li>

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

						        try {
						        	$y = 1;
						    		$stmt =$dbcon->prepare("SELECT * FROM friends.appointment WHERE doctor_id = :did");
						    		$stmt->execute(array(':did'=>$_SESSION['user_id']));
						    		//$stmt->execute();
						    		date_default_timezone_set('Asia/Kolkata');
						    		$today = date('Y-m-d H:i:s');
						    		$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
						    		$end = $userRow['end2'];
						    		$start = $userRow['start3'];
						    		//echo $end;
						    		$currentPage = $_SERVER['PHP_SELF'];
						    		if(strtotime($end) == strtotime($today))
						    		{
						    			echo "Time Elapsed";
						    			$stmt =$dbcon->prepare("INSERT INTO friends.treatment VALUES(:did,:pid)");
							    		$stmt->execute(array(':did'=>$_SESSION['user_id'],':pid'=>$userRow['patient_id']));
							    		$stmt1 =$dbcon->prepare("DELETE from friends.treatment WHERE doctor_id = :did");
							    		$stmt1->execute(array(':did'=>$_SESSION['user_id']));
						    		}
						    		if((strtotime($start) > strtotime($today)) ){
						    			//header("Refresh:0; url=index.php");
						    			//while($userRow = $stmt->fetch(PDO::FETCH_ASSOC))
						    			//echo "1";
						    		    //{
						    		    	?>
						    		    	
						    		    	<table class ="table">
											<tr>
											<td>Number</td>
											<td>User-id</td>
											<td>Disease</td>
											<!--//<td>Start Date</td>-->
											<td>Patient Name</td>
											</tr>
						    		    	<tr>
						    		    	<td><?php echo $y;?></td>
						    		    	<td><?php echo  $userRow['doctor_id'];?></td>	
						    				
						  	    			<?php
						  	    			$stmt1 =$dbcon->prepare("SELECT * FROM friends.patient WHERE user_id = :pid" );
						  	    			$stmt1->execute(array(':pid'=>$userRow['patient_id']));
						  	    			$stmt1->execute();

						  	    			$pat=$stmt1->fetch(PDO::FETCH_ASSOC);
						  	    			//echo $pat['fname'];
						    				$y = $y+1;?>
							    			<td>
							    			<?php echo $userRow['disease'];?></td>
							    			<!--<td><?php//echo $userRow['start'];?></td>-->
							    			<td><?php echo $pat['fname']." ".$pat['lname'];?></td>
							    			</tr>
							    			<?php
						    			//}
						    			
						    			$a = strtotime($end) - strtotime($today);
						    			//print_r($a);
						    			//echo $a;
						    			//header("Refresh:{$a}; url=index.php");
						    			header("Refresh:".$a."; url=view_booking.php");
						    			
						    			//delete php
						    		}
						    		else if(strtotime($end) < strtotime($today)) {
						    			//header("Refresh:10; url=index.php");
						    			//echo strtotime($end)."<br>";
						    			//echo strtotime($start)."<br>";
						    			//echo strtotime($today);
						    			//$a = strtotime($today) - strtotime($end);
						    			//print_r($a);
						    			echo "No appointments to see!";
						    			//
						    			//delete php
						    	                    // 17:16:18
						    		}


						    		   /* while($userRow = $stmt->fetch(PDO::FETCH_ASSOC))
						    		    {
						    		    	?>
						    		    	
						    		    	<tr>
						    		    	<td><?php echo $y;?></td>
						    		    	<td><?php echo  $userRow['doctor_id'];?></td>	
						    				
						  	    			<?php
						  	    			$stmt1 =$dbcon->prepare("SELECT * FROM friends.patient WHERE user_id = :pid" );
						  	    			$stmt1->execute(array(':pid'=>$userRow['patient_id']));
						  	    			$stmt1->execute();

						  	    			$pat=$stmt1->fetch(PDO::FETCH_ASSOC);
						  	    			//echo $pat['fname'];
						    				$y = $y+1;?>
							    			<td>
							    			<?php echo $userRow['disease'];?></td>
							    			<td><?php echo $userRow['start'];?></td>
							    			<td><?php echo $pat['fname']." ".$pat['lname'];?></td>
							    			</tr>
							    			<?php
						    			}*/
						    		    
						    	} catch (PDOException $e) {
						    		echo '<br>'.$e->getMessage();
						    	}
						    	?>
					</table>
  			</div>
  			<div class="col-md-1"></div>
  			</div>
  			</div>
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>