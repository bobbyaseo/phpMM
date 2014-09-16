<?php
// Create connection
require 'app_config.php';

$con=mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
 
} 

$dbname = constant('DATABASE_NAME');

echo "<p>Connected to MySQL to Database: " .DATABASE_NAME ."</p>"; 

?>