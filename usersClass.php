<?php

/*This class will be inherited by the general User
and the business user*/
class User {
	
	//properties
	public $userID;
	public $userName;
	public $fName;
	public $lName;
	public $DOB;

	//methods

	function __construct($userName, $fName, $lName, $DOB){
		
		while(checkUserName($userName) || strlen($userName) > 20){
			if(checkUserName($userName)){
				echo "The username: " . $userName . "is not available" . PHP_EOL;
				$userName = readline('Please enter a different username (20 characters max): ');
			}
			elseif(strlen($userName) > 20){
				echo "Improper length of characters in username." . PHP_EOL;
				$userName = readline('Please enter a different username (20 characters max): ');
			}
		}
		
		$this->userName = $userName;
		$this->fName = $fName;
		$this->lName = $lName;
		$this->DOB = $DOB;
	}

	/*Since its auto-increment I will not need to
	set the userID but I still may need a getter*/
	function get_userID(){
		
		return $this->userID;
	}

	function set_userName($userName,$newUserName){
		$user = "UPDATE users SET userName=$newUserName WHERE userName=$userName";
		//$this->userName = $userName;
	}

	function get_userName(){
		return $this->userName;
	}

	function set_fName($userName, $fName){
		$user = "UPDATE users SET fName=$fName WHERE userName=$userName";
		//$this->fName = $fName;
	}

	function get_fName(){
		return $this->fName;
	}

	function set_lName($userName, $lName){
		$user = "UPDATE users SET lName=$lName WHERE userName=$userName";
		//$this->lName = $lName;
	}

	function get_lName(){
		return $this->lName;
	}

	/*will take in input yyy-mm-dd where year is 4 digits
	and month and day are 2 digits*/
	function set_DOB($userName,$birthMonth,$birthDay,$birthYear){
		
		while(!checkDOB($birthMonth, $birthDay, $birthYear)){
				echo "Invalid birthday entered: " . $birthMonth . "/" . $birthDay . "/" . $birthYear  . PHP_EOL;
				$mm = (int)readline('Enter your birth month (1-12): ');
				$dd = (int)readline('Enter your day of birth (1-31): ');
				$yyyy = (int)readline('Enter your birth year as a 4 digit number: ');
		}

		$DOB = date_create();
		date_date_set($DOB,$birthYear,$birthMonth,$birthDay);
		echo date_format($DOB, "m/d/Y");

		if(checkUserName){$user = "UPDATE users SET DOB=$DOB WHERE userName=$userName";}
		else{ echo "Your request cannot be completed due to improper username." . PHP_EOL; }
	}

	function get_DOB(){
		return $this->DOB;
	}

	function addUser($userName, $fName, $lName, $DOB){
	
		$newUser = "INSERT INTO users (userName, fName, lName, DOB) 
		VALUES ($userName, $fName, $lName, $DOB)";
	}

	function removeUser($userName){
		if(checkUserName($userName)){
			$deleteUser = "DELETE FROM users WHERE userName=$userName";
		}
		else{
			echo "The user " . $userName . "does not currently have an account." . PHP_EOL;
		}
	}

	function checkUserName($userName){
		$invalidName = "SELECT userName FROM users WHERE userName=$userName";
		$result = $conn->query($invalidName);

		//returns true if found false if not found
		if($result->num_rows >0){ return True; }
		else{ return False; }		
	}

	function checkDOB($birthMonth, $birthDay, $birthYear){
		/*$mm = (int)$this->birthMonth;
		$dd = (int)$this->birthDay;
		$yyyy = (int)$this->birthYear;*/

		if(!checkdate($birthMonth,$birthDay,$birthYear)){return False;}
		else{return True;}
	}
}

class businessUser extends User{

	//properties
	public $businessID;
	public $businessName;

	function __construct($userName, $fName, $lName, $DOB, $businessName){
		
		while(checkBusinessName($businessName) || strlen($businessName) > 100){
			if(checkBusinessName($businessName)){
				echo "The business name: " . $businessName . "is not available. Use a different name or the legal name of your LLC" . PHP_EOL;
				$businessName = readline('Please enter a different business name (100 characters max): ');
			}
			elseif(strlen($businessName) > 100){
				echo "Improper length of characters in business name." . PHP_EOL;
				$businessName = readline('Please enter a different business name (100 characters max): ');
			}
		}

		parent::__construct($userName, $fName, $lName, $DOB);
		$this->businessName = $businessName;
	}

	function checkBusinessName($businessName){
		$invalidName = "SELECT businessName FROM businesses WHERE businessName=$businessName";
		$result = $conn->query($invalidName);

		//returns true if found false if not found
		if($result->num_rows >0){ return True; }
		else{ return False; }		
	}

	function addBusinessUser($userName, $fName, $lName, $DOB, $businessName){
		
		//calls parent method to ensure business user has general user items first
		parent::addUser($userName, $fName, $lName, $DOB);

		$newBusinessUser = "INSERT INTO businesses (businessName) 
		VALUES ($businessName)";
	}




}




?>