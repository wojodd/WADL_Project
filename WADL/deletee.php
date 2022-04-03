<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"update leader1 set DeletedFlag = '1' where LeaderID='$id'");
	echo '<script type="text/javascript"> alert("Deleted successfully")</script>';
	header('location:ShowCurrentLeader.php');
?>