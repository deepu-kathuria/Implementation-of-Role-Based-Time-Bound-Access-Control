<?php 

/**
 * Doctor Class
 */
class Doctor
{
	private $fname,$lname,$father_name,$dob,$gender,$adhar,$state;
	private $mob,$pin,$email,$user_id;
    /**
     * Doctor Class
     */
    public function __construct($user)
    {
        $this->user_id = $user->getUserID();
      
    }
    public function setFatherName($name){
        $this->father_name = $name;
    }

    puclic function setDob($dob){
        $this->dob = $dob;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }

    public function setAdhar($adhar){
        $this->adhar = $adhar;
    }

    public function setState($s){
        $this->state = $s;
    }

    public function setPin($pin){
        $this->pin = $pin;
    }

    public function setEmail($mail){
        $this->email = $mail;
    }
    
    public function setFirstName($name){
        $this->fname = $name;
    }

    public function setLastName($name){
        $this->lname = $name;
    }

    public function getDoctorName(){
    	return $this->fname ." ".$this->lname;
    }

    public function getFirstName(){
        return $this->fname;
    }

    public function getLastName(){
        return $this->lname;
    }

    public function getFatherName(){
        return $this->father_name;
    }

    public function getDOB()
    {
        return $this->dob;    	
    }

    public function getGender()
    {
    	return $this->gender;
    }

    public function getAdharCard(){
        return $this->adhar;
    }

    public function getMobile(){
        return $this->mob;
    }

    public function getPIN(){
        return $this->pin;
    }

    public function getEmail(){
        return $this->email;
    }


    
}

 ?>