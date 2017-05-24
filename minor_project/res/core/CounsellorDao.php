<?php 
	/**
	 * summary
	 */
	class CounsellorDao
	{
	    /**
	     * summary
	     */
	    private $dbcon;
	    public function __construct()
	    {
	        require_once 'Database.php';
	        $this->dbcon = Database::connect();
	    }

	    public function counsellorRegistration($username,$password,$fname,$lname,$dob,$gender,$adhar,$state,$pin,$mob,$email,$department){
	    	//echo "xx";
	    	try{
	    	    $query = $this->dbcon->query("SELECT max(user_id) FROM friends.users");
	    	    $res = $query->fetch();
	    	}catch (PDOException $e){
	    	    echo '<br>'.$e->getMessage();
	    	}
	    	try{
	    	    $res[0]=$res[0]+1;
	    	    $sql="INSERT INTO friends.users (user_id,username,password) VALUES (:id,:user,:pswd)";
	    	    $stmt = $this->dbcon->prepare($sql);
	    	    $stmt->bindParam(':id',$res[0]);
	    	    $stmt->bindParam(':user',$username);
	    	    $stmt->bindParam(':pswd',$password);
	    	    $stmt->execute();
	    	    $sql1 = "INSERT INTO friends.users_roles (user_id,role_id) VALUES (:id,2)";
	    	    $stmt1 = $this->dbcon->prepare($sql1);
	    	    $stmt1->bindParam(':id',$res[0]);
	    	    $stmt1->execute();
	    	    $sql2 = "INSERT INTO friends.counsellor (user_id,fname,lname,dob,gender,adhar,state,pin,mobile,email) VALUES(:id,:fname,:lname,:dob,:gender,:adhar,:state,:pin,:mob,:email)";
	    	    $stmt2 = $this->dbcon->prepare($sql2);
	    	    $stmt2->bindParam(':id',$res[0]);
	    	    $stmt2->bindParam(':fname',$fname);
	    	    $stmt2->bindParam(':lname',$lname);
	    	    $stmt2->bindParam(':dob',$dob);
	    	    $stmt2->bindParam(':gender',$gender);
	    	    $stmt2->bindParam(':adhar',$adhar);
	    	    $stmt2->bindParam(':state',$state);
	    	    $stmt2->bindParam(':pin',$pin);
	    	    $stmt2->bindParam(':mob',$mob);
	    	    $stmt2->bindParam(':email',$email);
	    	    $stmt2->execute();
	    	    $sql3 = "INSERT INTO friends.counsellor_department (user_id,department) VALUES (:id,:dpt)";
	    	    $stmt3 = $this->dbcon->prepare($sql3);
	    	    $stmt3->bindParam(':id',$res[0]);
	    	    $stmt3->bindParam(':dpt',$department);
	    	    $stmt3->execute();
	    	    echo "<script>
					alert('Counsellor Registered');
					</script>";	
	    	}catch(PDOException $e){
	    	    echo $e->getMessage();
	    	}
	    	
	    }

	    public function getCounsellorDetils($cos_id){
	        $sql = "SELECT * FROM friends.counsellor WHERE user_id=:id LIMIT 1";
	        $stmt = $this->dbcon->prepare($sql);
	        $stmt->bindParam(':id',$cos_id);
	        if($stmt->execute()){
	            $res = $stmt->fetch(PDO::FETCH_OBJ);
	            return $res;
	        }
	    }
	}
 ?>