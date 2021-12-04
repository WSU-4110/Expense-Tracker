<?php

class sqlConnection {
	
	private $hostName; 
	private $dbName; 
	private $dbUserName;
	private $password;
	public $conn;
	public $sqlconn;
	

	function __construct(){
		$this->hostName = "localhost";
		$this->dbName = "id17843849_expensetrackerdb";
		$this->dbUserName = "id17843849_expensetrackerdbuser";
		$this->password = "AVpczEYqz;*?[8/";
	}

	function connectToDatabase() {
		
		// Create connection
		$conn = new mysqli($this->hostName, $this->dbUserName, $this->password, $this->dbName);
		
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

	function closeConnetion(){
		$conn->close();
	}

	function setHostName($hostName){
		$this->hostName = $hostName;
	}

	function setDBName($dbName){
		$this->dbName = $dbName;
	}

	function setdbUserName($dbUserName){
		$this->dbUserName = $dbUserName;
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

	function getdbUserName(){
		return $this->dbUserName;
	}

	function getPassword(){
		return $this->password;
	}
}

?>