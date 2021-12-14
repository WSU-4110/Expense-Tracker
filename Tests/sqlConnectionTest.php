<?php
	//require "sqlConnection.php";
	require "DBandTables.php";
	//require 'usersClass.php';
	require 'dbconnector.php';

	class sqlConnectionTest extends \PHPUnit\Framework\TestCase{
		private $sqlConnectionClass;

		public static function setUpBeforeClass(): void{ }

		protected function setUp(): void{
	
			$sqlConnectionClass = new sqlConnection();
		}

		protected function tearDown(): void{
			$sqlConnectionClass = NULL;
		}
		
		public static function tearDownAfterClass(): void{ }	

		public function testConnectToDatabase(): void{
			$SQLConnection = new sqlConnection();
			$db = new DBandTables();
			//$sql = $db->createDB();
			dbConnection::getdbConnection();
			
			$SQLConnection->conn = new mysqli($SQLConnection->hostName, $SQLConnection->getdbUserName(), $SQLConnection->getPassword(), $SQLConnection->dbName,"3306");
			if ($SQLConnection-> conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

			//checking for connection to database
			$this->assertNotNull($SQLConnection->conn,"connection was not established");
		}
	}
?>