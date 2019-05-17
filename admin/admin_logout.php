<?php
include "connection.php";
session_start();
if (isset($_SESSION['login_user']))
{
	$username=$_SESSION['login_user'];
	$sql = "UPDATE student SET status='no' WHERE username='$username';";
	mysqli_query($db, $sql);

    unset($_SESSION['login_user']);
    unset($_SESSION['pic']);

}
header("location:../home.php");
?>
