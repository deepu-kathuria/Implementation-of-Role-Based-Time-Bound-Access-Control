<?php 


/**
 * Patient class
 */
class Patient
{
    /**
     * summary
     */
    private $user_id, $fname, $lname, $dob, $gender, $adhar_no, $state, $pin, $mob, $email;

    public function __construct()
    {
        
    }

    public function setUserId($id){
        $this->user_id = $id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function setfirstName($name){
    	$this->fname = $name;
    }

    public function setLastName($name){
    	$this->lname = $name;
    }

    public function setDob($dob){
    	$this->dob = $dob;
    }

    public function setGender($gender){
    	$this->gender = $gender;
    }

    public function setAdhar($adhar){
    	$this->adhar_no = $adhar;
    }

    public function setState($state){
    	$this->state = $state;
    }

    public function setPin($pin){
    	$this->pin = $pim;
    }

    public function setMobile($mob){
    	$this->mob = $mob;
    }

    public function setEmail($email){
    	$this->email = $email;
    }

    public function getFirstName(){
    	return $this->fname;
    }

    public function getLastName(){
    	return $this->lname;
    }

    public function getFullName(){
    	return $this->fname.' '.$this->lname;
    }

    public function getDob(){
    	return $this->$dob;
    }

    public function getGender(){
    	return $this->gender;
    }

    public function getAdhar(){
    	return $this->adhar_no
    }

    public function getState(){
    	return $this->adhar_no;
    }

    public function getPin(){
    	return $this->pin;
    }

    public function getMobile(){
    	return $this->mobile;
    }

    public function getEmail(){
    	return $this->email;
    }

}

 ?>