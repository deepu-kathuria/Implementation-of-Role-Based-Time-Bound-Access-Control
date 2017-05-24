<?php 

/**
 * Patient Dao
 */
class PatientDao
{
    /**
     * summary
     */
    
    private $dbcon;

    public function __construct()
    {
        require_once 'Database.php';
        $this->dbcon = Database::connect();
        // echo "Connection done<br>";
    }


    public function registerPatient($username,$password,$fname,$lname,$dob,$gender,$adhar,$state,$pin,$mob,$email,$disease){
        // write code to validate user input
        // $patinet = new Patient();
        // code to get New Userid
        try{
            $query = $this->dbcon->query("SELECT max(user_id) FROM friends.users");
            $res = $query->fetch();
        }catch (PDOException $e){
            echo '<br>'.$e->getMessage();
        }
        
        $res[0]=$res[0]+1;
        $sql="INSERT INTO friends.users (user_id,username,password) VALUES (:id,:user,:pswd)";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id',$res[0]);
        $stmt->bindParam(':user',$username);
        $stmt->bindParam(':pswd',$password);
        $stmt->execute();
        $sql1 = "INSERT INTO friends.users_roles (user_id,role_id) VALUES (:id,4)";
        $stmt1 = $this->dbcon->prepare($sql1);
        $stmt1->bindParam(':id',$res[0]);
        $stmt1->execute();
        $sql2 = "INSERT INTO friends.patient (user_id,fname,lname,dob,gender,adhar,state,pin,mobile,email) VALUES(:id,:fname,:lname,:dob,:gender,:adhar,:state,:pin,:mob,:email)";
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
       // echo "{$sql}<br>{$sql1}<br>{$sql2}";
    }


    public function bookAppointment($date,$duration,$pid){
        try{
            echo "hello";
            $stmt = $this->dbcon->prepare("SELECT max(id) FROM friends.appointment");
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_NUM);
            $res[0]=$res[0]+1;
            echo  $res[0]+1;
            $stmt = $this->dbcon->prepare("INSERT INTO friends.appointment (id,request_date,date,duration,status,doctor_id,patient_id) VALUES (:id,null,:date,:duration,0,null,:pid)");
            $stmt->bindParam(':id',$res[0]);
            $stmt->bindParam(':date',$date);
            $stmt->bindParam(':duration',$duration);
            $stmt->bindParam(':pid',$pid);
           if( $stmt->execute()){
                echo "<script language=\"javascript\">alert(\"Appointment request had been send\");</script>";
           }

        }catch(PDOException $e){
            echo "<br>".$e->getMessage();
        }
       
       header("location:index.php");
        // $sql = "INSERT INTO friends.appointment ("
    }

    public function updatePatientDetails($date,$s){
    	
    }

    public function prevousAppointment(){

    }

    public function getPatientDetils($id){
        $sql = "SELECT * FROM friends.patient WHERE user_id=:id LIMIT 1";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id',$id);
        if($stmt->execute()){
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            return $res;
        }
    }
}




// tests
/*
$pdao = new PatientDao();
$pdao->registerPatient('anand','anand','Anand','Kumar','09/10/1993','Male','123456789234','Bihar','801503','8950690951','anand@gmail.com');
*/
 ?>
