<?php

require '../../scripts/database_connection.php';

$first_name = trim($_REQUEST['first_name']);
$last_name = trim($_REQUEST['last_name']);
$email = trim($_REQUEST['email']);
$bio = trim($_REQUEST['bio']);
$facebook_url = str_replace("facebook.org", "facebook.com",
                            trim($_REQUEST['facebook_url']));
$position = strpos($facebook_url, "facebook.com");
if ($position === false) {
  $facebook_url = "http://www.facebook.com/" . $facebook_url;
}
$twitter_handle = trim($_REQUEST['twitter_handle']);
$twitter_url = "http://www.twitter.com/";
$position = strpos($twitter_handle, "@");
if ($position === false) {
  $twitter_url = $twitter_url . $twitter_handle;
} else {
  $twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
}

$insert_sql = "INSERT INTO users (first_name, last_name, email, facebook_url, twitter_handle, bio) " .
  "VALUES ('{$first_name}', '{$last_name}', '{$email}', " .
  "'{$facebook_url}', '{$twitter_handle}', '{$bio}');";

mysqli_query($con, $insert_sql)
  or die(mysql_error());

$get_user_query = "SELECT * FROM USERS WHERE...";
mysqli_query($con, $get_user_query);

header("Location: show_user.php?user_id=" . mysqli_insert_id($con));
exit();
?>