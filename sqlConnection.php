<?php

	class sqlConnection {
	
		public $hostName; 
		public $dbName; 
		private $dbUserName;
		private $password;
		public $conn;
		public $sql; //sql query being completed
		public $sqlconn; //A bool to test connections
	

		function __construct(){
			$this->hostName = "localhost";
			$this->dbName = "id17843849_expensetrackerdb";
			$this->dbUserName = "id17843849_expensetrackerdbuser";
			$this->password = "AVpczEYqz;*?[8/";
		}

		function connectToDatabase() {
			
			$SQLConnection = new sqlConnection();
			$SQLConnection->conn = new mysqli($SQLConnection->hostName, $SQLConnection->dbUserName, $SQLConnection->password, $SQLConnection->dbName,"3306");

			if ($SQLConnection-> conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
			$this->conn = $SQLConnection->conn;

			//return $SQLConnection->conn;
			return $this->conn;
		}

		function checkConnection(){
			$sqlconn = False;
			if ($conn->connect_error) {
				die("Connection to $this->dbName failed: " . $conn->connect_error);
			}
			else{ 
				$sqlconn = True; 
			}
			return $sqlconn;
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