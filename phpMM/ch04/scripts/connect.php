<?php
// Create connection
require '../scripts/app_config.php';

$con=mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
 
} 

$dbname = constant('DATABASE_NAME');

echo "<p>Connected to MySQL to Database: " .DATABASE_NAME ."</p>"; 

$result = mysqli_query($con, "SHOW TABLES");

if (!$result) {
  die("<p>Error in listing tables: " . mysql_error() . "</p>");
}

echo "<p>Tables in databse:</p>";
echo "<ul>";
while ($row = mysqli_fetch_row($result)) {
  echo "<li>Table: " . $row[0] . "</li>";
}
?>