<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8"> 
	<title>Expense Tracker Login page</title>
	<style>
	* {
	box-sizing: border-box;
	}

	body {
	font-family: "Courier New", sans-serif;
	justify-content: center;
	min-height: 100vh;
	margin: 0;	 
	display: flex;
	background-image: url("money_image.JPG"); 
	align-items: center;
	text-align:center;
	}

	.container {
	margin: 80px;
	width: 900px; 
	padding: 40px 80px;
	border-radius: 2rem;
	border: 4px solid blue;
	background-color: skyblue; 
	}

	p {
	text-transform: uppercase;
	color: black;
	font-weight: bold;
	}
	
	</style>

</head>
<body>
	
	<div class="container">
        <!-- form redirects to success.php file -->
        <form method="POST" action="Transactions.html">
           
            <p>User Name</p>
            <!-- create an input field to read user name -->
            <input type="text" name="user_name" id="user_name" required="">
          
             <p>Password</p>
            <!-- create an input field to read password -->
            <input type="password" name="password1" id="password1" required>
            <br>
			<br>
			<a href="NewUserInfoPage.html">New Account</a>
			<br>
			<br>
            <button type="submit">Submit</button>
        </form>
	</div>
	<?php
       require "dbconnector.php";
       require "tables.php"
       
       $connection = dbConnection::getdbConnection();
	   
	  
       
    ?>
</body>
</html>
