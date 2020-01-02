<?php
session_start();
// my connection info
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'PayRoll';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['Fname'];
$lname = $_POST['Lname'];
$ssn = $_POST['SSN'];
$bdate = $_POST['Bdate'];
$add = $_POST['Add'];
$sex = $_POST['Sex'];
$sql = "INSERT INTO employee (Fname, Lname, SSN, Bdate, Address, Sex) 
VALUES ('$name','$lname','$ssn','$bdate','$add','$sex')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>