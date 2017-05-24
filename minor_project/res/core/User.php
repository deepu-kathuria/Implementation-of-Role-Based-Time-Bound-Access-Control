<?php 
	/**
	 * User class
	 */
	//session_start();
	class User
	{
		private $user_name,$user_id,$password,$role_id,$dbcon;
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	require_once 'Database.php';
	        $this->dbcon = Database::connect();
	    }

	    public function login($username,$password){
	    	try {
	    		$stmt = $this->dbcon->prepare("SELECT * FROM friends.users WHERE username=:uname AND password=:passwd LIMIT 1");
	    		    $stmt->execute(array(':uname'=>$username, ':passwd'=>$password));
	    		    //echo $username;
	    		    //echo $password;
	    		    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	    		    echo $userRow['user_id'];
	    		    if($stmt->rowCount() > 0)
	    		    {
	    		    	//echo $userRow['user_id'];
	    		    	$stmt1 = $this->dbcon->prepare("SELECT r.name FROM friends.users_roles as fur, friends.role as r WHERE fur.role_id=r.id AND fur.user_id=:userid");
	    		    	$stmt1->execute(array(':userid'=>$userRow['user_id']));
	    		    	$r = $stmt1->fetch(PDO::FETCH_ASSOC);
	    		    	$_SESSION['user_id'] = $userRow['user_id'];
	    		    	$_SESSION['username'] = $userRow['username'];	
	    		    	$_SESSION['user_role'] = $r['name'];
	    		    	//echo $r['name'];
	    		    	$this->redirect($r['name']);
	    		    }else {
	    		    	echo "<script>
						alert('Wrong Username or password');
						window.location.href = 'index.php';
						</script>";	
    		    }
	    	} catch (PDOException $e) {
	    		echo '<br>'.$e->getMessage();
	    	}
	    }

	    public function changeRole($username,$presentrole,$changeroleto){
	    	try {
	    			

	    		$stmt = $this->dbcon->prepare("SELECT user_id FROM friends.users WHERE username=:uname  LIMIT 1");
	    		    $stmt->execute(array(':uname'=>$username));
	    		    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);


	    		    $stmt0 = $this->dbcon->prepare("SELECT role_id FROM friends.users_roles WHERE user_id=:uiid  LIMIT 1");
	    		    $stmt0->execute(array(':uiid'=>$userRow['user_id']));
	    		    $userRow0=$stmt0->fetch(PDO::FETCH_ASSOC);
	    		    if($presentrole == $userRow0['role_id'])
	    		    {
	    		  	
	    		    if($stmt->rowCount() > 0)
	    		    {
	    		    	if($changeroleto == 1)
	    		    	{
	    		    	$stmt1 = $this->dbcon->prepare("UPDATE friends.users_roles SET role_id = :role1 WHERE user_id=:userid");
	    		    	$stmt1->execute(array(':userid'=>$userRow['user_id'],':role1'=>$changeroleto));
	    		    	$r = $stmt1->fetch(PDO::FETCH_ASSOC);
	    		    	$stmt2 = $this->dbcon->prepare("SELECT * FROM 	friends.counsellor  WHERE user_id=:userid");
	    		    	$stmt2->execute(array(':userid'=>$userRow['user_id']));
	    		    	$r1 = $stmt2->fetch(PDO::FETCH_ASSOC);
	    		    	//echo $r1['user_id'];
	    		    	$stmt3 = $this->dbcon->prepare("INSERT INTO	friends.admin VALUES(:userid,:fname,:lname,:dob,:gender,:adhar,:state,:pin,:mobile,:email)") ;
	    		    	$stmt3->execute(array(':userid'=>$r1['user_id'],':fname'=>$r1['fname'],':lname'=>$r1['lname'],':dob'=>$r1['dob'],':gender'=>$r1['gender'],':adhar'=>$r1['adhar'],':state'=>$r1['state'],':pin'=>$r1['pin'],':mobile'=>$r1['mobile'],':email'=>$r1['email']));
	    		    	//$r2 = $stmt3->fetch(PDO::FETCH_ASSOC);
	    		    	$stmt4 = $this->dbcon->prepare("DELETE FROM friends.counsellor WHERE user_id=:userid ");
		    		    $stmt4->execute(array(':userid'=>$userRow['user_id']));
		    		    //echo "Role has been changed";
		    		    //$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	    		    	}
	    		    	else
	    		    	{
	    		    		$stmt1 = $this->dbcon->prepare("UPDATE friends.users_roles SET role_id = :role1 WHERE user_id=:userid");
	    		    	$stmt1->execute(array(':userid'=>$userRow['user_id'],':role1'=>$changeroleto));
	    		    	$r = $stmt1->fetch(PDO::FETCH_ASSOC);
	    		    	$stmt2 = $this->dbcon->prepare("SELECT * FROM 	friends.admin  WHERE user_id=:userid");
	    		    	$stmt2->execute(array(':userid'=>$userRow['user_id']));
	    		    	$r1 = $stmt2->fetch(PDO::FETCH_ASSOC);
	    		    	//echo $r1['user_id'];
	    		    	$stmt3 = $this->dbcon->prepare("INSERT INTO	friends.counsellor VALUES(:userid,:fname,:lname,:dob,:gender,:adhar,:state,:pin,:mobile,:email)") ;
	    		    	$stmt3->execute(array(':userid'=>$r1['user_id'],':fname'=>$r1['fname'],':lname'=>$r1['lname'],':dob'=>$r1['dob'],':gender'=>$r1['gender'],':adhar'=>$r1['adhar'],':state'=>$r1['state'],':pin'=>$r1['pin'],':mobile'=>$r1['mobile'],':email'=>$r1['email']));
	    		    	//$r2 = $stmt3->fetch(PDO::FETCH_ASSOC);
	    		    	$stmt4 = $this->dbcon->prepare("DELETE FROM friends.admin WHERE user_id=:userid ");
		    		    $stmt4->execute(array(':userid'=>$userRow['user_id']));
	    		    	}
	    		    	echo "<script>
						alert('Role has been changed');
						</script>";	

	    		    	}
	    		    }else {
	    		    	
					echo "<script>
					alert('Enter valid role or username');
					</script>";	    		   
					 }
	    	} catch (PDOException $e) {
	    		echo '<br>'.$e->getMessage();
	    	}

	    }
	    public function logout(){
	    			session_destroy();
	    	        unset($_SESSION['user_id']);
	    	        unset($_SESSION['username']);
	    	        unset($_SESSION['user_role']);
	    	        return true;
	    }
	    public function is_login(){
	    	if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['user_role']))
	    	{

	    	        return true;
	    	}
	    	return false;
	    }

	    public function redirect($role){
	    	$url = "../index.php";
	    	if($role=="admin"){
	    		// redirect to admin dashboard
	    		$url = "./admin/index.php";	
	    	}elseif ($role=="doctor") {
	    		// redirect to doctor dashboard
	    		$url = "./doctor/index.php";
	    	}elseif ($role=="super_admin") {
	    		// redirect to doctor dashboard
	    		$url = "./super_admin/index.php";
	    	}elseif ($role=="counsellor") {
	    		// redirect to counsellor dashboard
	    		$url = "./counsellor/index.php";
	    	}elseif ($role=="patient") {
	    		// redirect to patient dashboard
	    		$url = "./patient/index.php";
	    	}
	    	header("location:".$url);
	    }
	    


	    public function changePassword_for_all($username,$password){
	    	try {
	    		
	    		$stmt = $this->dbcon->prepare("UPDATE friends.users SET password=:passwd WHERE username=:uname");
	    		    $stmt->execute(array(':passwd'=>$password,':uname'=>$username));
	    		    //$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	    		    if($stmt->rowCount>0){
	    		    header('location:password_changed.php');
	    		}else{
	    				header('location:change_password_for_all.php');
	    			}	
	    		    }catch (PDOException $e) {
	    			
	    		//echo '<br>'.$e->getMessage();
	    		    header('location:change_password.php');
	    	}
	    }

	    public function changePassword_admin($username,$password){
	    	try {
	    		$stmt = $this->dbcon->prepare("UPDATE friends.users SET password=:passwd WHERE username=:uname");
	    		    $stmt->execute(array(':passwd'=>$password,':uname'=>$username));
	    		    //$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	    		    if($stmt->rowCount()>0){
	    		    echo "<script>
						alert('Password has been changed');
						</script>";	
	    		}
	    		else
	    			{
	    				echo "<script>
						alert('Enter Valid Username');
						</script>";	
	    			}	
	    		    }catch (PDOException $e) {
	    			
	    		//echo '<br>'.$e->getMessage();
	    		    header('location:change_password.php');
	    	}
	    }
	}

 ?>