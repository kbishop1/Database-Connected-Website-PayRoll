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

$sql = "SELECT Essn,TwoWeeksPay, BankNum, RouteNum FROM payment where essn = {$_POST['SSN']}";
$result = $conn->query($sql);

$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo("<table>");
$first_row = true;
while ($row = mysqli_fetch_assoc($result)) {
    if ($first_row) {
        $first_row = false;
        // Output header row from keys.
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '</tr>';
    }
    echo '<tr>';
    foreach($row as $key => $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
echo("</table>");
mysqli_free_result($result);
?>