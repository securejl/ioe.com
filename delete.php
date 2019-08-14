<?php
session_start();
require_once('functions.php');

connectDB();

$sql_query = "DELETE FROM users WHERE email='".$_POST['email']."'";
$result = mysql_query($sql_query);
if (!$result) {
    echo "MYSQL_ERROR: ".mysql_error();
    exit();
}

$_SESSION['flash'] = "USER Deleted.";
header("location: members.php");

?>