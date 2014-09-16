<?php

require 'database_connection.php';

$query_text = $_REQUEST['query'];
$result = mysqli_query($con, $query_text);

if(!$result) {
  die("<p>Error in executing the SQL query " . mysqli_error($con) . ": " .
     mysql_error() . "</p>");
 
}
$return_rows = true;
if (preg_match("/^(CREATE|INSERT|UPDATE|DELETE|DROP)/i",
   trim($query_text))) {
  $return_rows = false;
}

if ($return_rows) {
    // We have rows to show from the query
echo "<p>Results from your query:</p>";
echo "<ul>";

while ($row = mysqli_fetch_row($result)) {
  echo "<li>{$row[0]}</li>";
}
echo "</ul>";
} else {
    // No rows. Just report if the query ran or not
    echo "<p>The following query was processed successfully:</p>";
    echo "<p>{$query_text}</p>";
  }

?>