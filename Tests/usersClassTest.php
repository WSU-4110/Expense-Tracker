<?php
	require "usersClass.php";
	require "DBandTables.php";
	//require 'dbconnector.php';

	class usersClassTest extends \PHPUnit\Framework\TestCase{
		
		private $usersClass;

		public static function setUpBeforeClass(): void{ }

		public static function tearDownAfterClass(): void{ }

		protected function setUp(): void{

			$userName = "donyellw";
			$fName = "Donyell";
			$lName = "Williams";
			$birthDay = 07;
			$birthMonth = 03;
			$birthYear = 1989;

			$usersClass = new user($userName, $fName, $lName, $birthMonth, $birthDay, $birthYear);
		}

		protected function tearDown(): void{
			
			$usersClass = NULL;
		}

		public function testUser(): void{
			$curtisw = new user('curtisw', 'Curtis', 'Williams', 02, 27, 1965);
			$this->assertEquals('curtisw',$curtisw->get_userName());
			$this->assertEquals('Curtis', $curtisw->get_fName());
			$this->assertEquals('Williams', $curtisw->get_lName());
			$this->assertEquals(date_format($curtisw->DOB, "m/d/Y"),"02/27/1965");

		}
		//needs test
		/*public function testAddUser(): void{

			$connection = new sqlConnection();
			$db = new DBandTables();
			$conn = $connection->connectToDatabase();

			$userName = "curtisw";
			$fName = "Curtis";
			$lName = "Williams";
			$birthDay = 27;
			$birthMonth = 02;
			$birthYear = 1965;
			$found = false;

			$usersClass = new user($userName, $fName, $lName, $birthMonth, $birthDay, $birthYear);
			$result = $usersClass->addUser($userName, $fName, $lName, date_format($usersClass->get_DOB(), "m/d/Y"));
			$userDOB = date_format($usersClass->get_DOB(), "m/d/Y");
			
			$sql = "INSERT INTO users (userName, fName, lName, DOB) VALUES ($userName, $fName, $lName, $userDOB)";
			$conn->query($sql);
			//$usersClass->checkUserName($userName);
			//call_user_func(User::checkUserName($userName));
			//$this->assertFalse(User::checkUserName($userName));

			$invalidNameQuery = "SELECT userName FROM users WHERE userName=$userName"; //query for search
		
			$result = $conn->query($invalidNameQuery);

			//if found returns true
			if($result == true){//$result->num_rows >0
				while($row = $result->fetch_assoc()){
					echo "userName: " . $row["userName"] . "<br>";
				}
				$found = true;
			}
			$this->assertTrue($found, "the user should have been created.");

		}*/

		public function testCheckDOB(): void{

			$usersClass = new user("donyellw", "Donyell", "Williams", 03, 07, 1989);
			
			$this->assertTrue($usersClass->checkDOB(02,27,1965), "Real date entered should be true");
			$this->assertFalse($usersClass->checkDOB(2,29,2003), "Leap year should be false");
			$this->assertFalse($usersClass->checkDOB(-3,13,1980), "Negative month test should fail");
			$this->assertTrue($usersClass->checkDOB(2,12,65), "Real date entered should be true");
		}

		public function testGet_DOB(): void{
			
			$usersClass = new user("donyellw", "Donyell", "Williams", 03, 07, 1989);

			$donyellDOB = $usersClass->get_DOB();
			$this->assertSame(date_format($donyellDOB, "m/d/Y"),"03/07/1989","Birthdays should be eqivalent");
			
			$usersClass = new user("curtiswilliams227", "Curtis", "Williams", 02, 27, 1965);
			$curtisDOB = $usersClass->get_DOB();

			$this->assertNotNull($usersClass, "usersClass should not be null");

			$this->assertNotSame(date_format($curtisDOB, "m/d/Y"),"03/07/1989","Birthdays should not be eqivalent");
		}

		/*public function testCheckUserName(): void{

			$usersClass = new user("donyellw", "Donyell", "Williams", 03, 07, 1989);
			$queryFound = $usersClass->checkUserName("donyellw");

		}*/

	}
?>