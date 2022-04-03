<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$name=$_POST['name'];
	$username=$_POST['UserName'];
	$email=$_POST['email'];
    $pass=$_POST['pass'];
 
	mysqli_query($conn,"update `leader1` set Name='$name', UserName='$username', Email='$email' , Email='$email' , Password='$pass' where LeaderID='$id'");
	header('location:ShowCurrentLeader.php');
?>