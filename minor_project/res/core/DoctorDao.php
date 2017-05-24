<?php 


/**
 * summary
 */
class DoctorDao
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

    public function doctorRegistration($username,$password,$fname,$lname,$dob,$gender,$adhar,$state,$pin,$mob,$email,$speciality){
        
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
            $sql1 = "INSERT INTO friends.users_roles (user_id,role_id) VALUES (:id,3)";
            $stmt1 = $this->dbcon->prepare($sql1);
            $stmt1->bindParam(':id',$res[0]);
            $stmt1->execute();
            $sql2 = "INSERT INTO friends.doctor (user_id,fname,lname,dob,gender,adhar,state,pin,mobile,email) VALUES(:id,:fname,:lname,:dob,:gender,:adhar,:state,:pin,:mob,:email)";
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
            $sql3 = "INSERT INTO friends.doctor_details (user_id,speciality) VALUES (:id,:spt)";
            $stmt3 = $this->dbcon->prepare($sql3);
            $stmt3->bindParam(':id',$res[0]);
            $stmt3->bindParam(':spt',$speciality);
            $stmt3->execute();
            /*$sql4 = "INSERT INTO friends.department (doctor_id) VALUES (:did)";
            $stmt4 = $this->dbcon->prepare($sql4);
            $stmt4->bindParam(':did',$res[0]);
            $stmt4->execute();*/
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        


    }

    public function getDoctorDetils($doc_id){
        $sql = "SELECT * FROM friends.doctor WHERE user_id=:id LIMIT 1";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id',$doc_id);
        if($stmt->execute()){
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }
    }



    public function updateDoctorDetails(){

    }

    public function addSchedules($doc_id,$day,$time1,$time2)  {
        $stmt = $this->dbcon->prepare("INSERT INTO friends.schedule (id,user_id,day,time1,time2) VALUES (:id,:user_id,:day,:time1,:time2)");
        try{
            $query = $this->dbcon->query("SELECT max(user_id) FROM friends.schedule");
            $res = $query->fetch();
        }catch (PDOException $e){
            echo '<br>'.$e->getMessage();
        }
        try {
            $res[0]=$res[0]+1;
            $stmt = $this->dbcon->prepare("INSERT INTO friends.schedule (id,user_id,day,time1,time2) VALUES (:id,:user_id,:day,:time1,:time2)");
            $stmt->bindParam(':id',$res[0]);
            $stmt->bindParam(':user_id',$doc_id);
            $stmt->bindParam(':day',$day);
            $stmt->bindParam(':time1',$time1);
            $stmt->bindParam(':time2',$time2);
            $stmt->execute();
        } catch (PDOException $e) {
            
        }
    } 

    public function viewSchedules($doc_id){
        try {
            $stmt = $this->dbcon->prepare("SELECT * FROM friends.schedule WHERE user_id=:doc");
            $stmt->bindParam(':doc',$doc_id);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }

    public function viewAppointments(){
        try {
            // $stmt = $this->dbcon->prepare("SELECT * FROM friends.appointmetns WHERE ")
        } catch (PDOException $e) {
            
        }
        
    }
}

 ?>