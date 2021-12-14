<?php

	require 'DBandTables.php';
	require 'sqlConnection.php';

	class DBandTablesTest extends \PHPUnit\Framework\TestCase{
		private $db;

		public static function setUpBeforeClass(): void{}

		protected function setUp(): void{}

		protected function tearDown(): void{}
		
		public static function tearDownAfterClass(): void{}	

		public function testCreateDB(): void{

			$SQLConnection = new sqlConnection();
			$db = new DBandTables();

			//checking for correct database name
			$this->assertEquals("id17843849_expensetrackerdb", $SQLConnection->dbName, "database name incorrect.");
			
			$sql = $db->createDB();
			
			//checking creation of database
			$this->assertTrue($sql, "Database not created");
		}

		public function testCreateTables(): void{
			$connection = new sqlConnection();
			$db = new DBandTables();
			$conn = $connection->connectToDatabase();
			$tableCreation = $db->createTables();
			
			$this->assertEquals(10, $tableCreation, "Tables are missing");
			
		}



	}
?>