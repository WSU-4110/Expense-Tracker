<?php

class sqlConnection {
	
	private $hostName; 
	private $dbName; 
	private $userName;
	private $password;
	private $conn;
	private $sqlconn;
	

	function __construct(){
		$this->hostName = "localhost";
		$this->dbName = "id17843849_expensetrackerdb";
		$this->userName = "id17843849_expensetrackerdbuser";
		$this->password = "AVpczEYqz;*?[8/";
	}

	function connectToDatabase() {
		
		// Create connection
		$conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
		
	}

	function checkConnection(){
		if ($conn->connect_error) {
			$sqlconn = False;
			die("Connection to $this->dbName failed: " . $conn->connect_error);
			return $sqlconn;
		}
		else{ 
			$sqlconn = True; 
			return $sqlconn;
		}
	}

	function setHostName($hostName){
		$this->hostName = $hostName;
	}

	function setDBName($dbName){
		$this->dbName = $dbName;
	}

	function setUserName($userName){
		$this->userName = $userName;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getHostName(){
		return $this->hostName;
	}

	function getDBName(){
		return $this->dbName;
	}

	function getUserName(){
		return $this->userName;
	}

	function getPassword(){
		return $this->password;
	}
}

?>