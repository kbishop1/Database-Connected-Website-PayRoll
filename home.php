<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>
<!DOCTYPE html>
<html>

<style>

#popup{display:none; background:#efefef; border:1px solid black; width:75%; height:200px;}
#popup1{display:none; background:#efefef; border:1px solid black; width:75%; height:200px;}
#popup2{display:none; background:#efefef; border:1px solid black; width:75%; height:200px;}
#popup3{display:none; background:#efefef; border:1px solid black; width:75%; height:200x;}

</style>

	<head>
		<meta charset="utf-8">
		<title>PayRoll</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			
			<div>
		
				<h1>PayRoll</h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Welcome to PayRoll</h2>
			<p>Welcome back, <?=$_SESSION['name']?>! What would you like to accomplish today?</p>
			
			<button onclick="document.getElementById('popup').style.display='block'">Send Payments</button>
			<div id="popup">
			<p>
				Enter SSN to pay specific employee.
				</p>
			<form action="payEmployee.php" method="post">
				<input type="text" name="SSN" placeholder="Enter SSN" id="SSN" required>
				<input type="submit" value="Pay">
				<p>
				If you would like to pay all employees enter yes and click Pay All
				</p>
			</form>
			<form action="payAll.php" method="post">
			<input type="text" name="All" placeholder="Enter yes" id="All" required>
				<input type="submit" value="Pay All">
			</form>

			<p>
			<button onclick="document.getElementById('popup').style.display='none'">Hide</button></p>

			</div>
			
			<button onclick="document.getElementById('popup1').style.display='block'">Add Employee</button>
			<div id="popup1">
			<p>
			<form action="addEmployee.php" method="post">
			<input type="text" name="Fname" placeholder="Enter First Name" id="Fname" required>
			<input type="text" name="Lname" placeholder="Enter Last Name" id="Lname" required>
			<input type="text" name="SSN" placeholder="Enter SSN" id="SSN" required>
			<input type="text" name="Bdate" placeholder="Enter Bday year-mn-dy" id="Bdate" required>
			<input type="text" name="Add" placeholder="Enter Address" id="Add" required>
			<input type="text" name="Sex" placeholder="Enter Sex" id="Sex" required>
			
				<input type="submit" value="Insert">
			</form>
			<button onclick="document.getElementById('popup1').style.display='none'">Hide</button>
			</div>
			<button onclick="document.getElementById('popup2').style.display='block'">Delete Employee</button>
			<div id="popup2">
			<p>
				Enter SSN to delete the employee.
			</p>
			</form>
			<form action="deleteEmp.php" method="post">
			<input type="text" name="SSN" placeholder="Enter SSN to delete" id="SSN" required>
				<input type="submit" value="Delete">
			</form>

			
			<button onclick="document.getElementById('popup2').style.display='none'">Hide</button>

			</div>
			
			<button onclick="document.getElementById('popup3').style.display='block'">Anaylze Data</button>
			<div id="popup3">
				Enter a table in the database to view:(employee)(pastpay)(payment)(raise)
			<form action="Analyze.php" method="post">
			<input type="text" name="table" placeholder="Enter Table" id="table" required>
				<input type="submit" value="Show Table">
			
			<button onclick="document.getElementById('popup3').style.display='none'">Hide</button>

			</div>
			
			
		</div>
	</body>
</html>