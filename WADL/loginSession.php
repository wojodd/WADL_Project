<?php

session_start ();
include("config.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_REQUEST['submit']))
{
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];

//superglobal variable for leader
$_SESSION['gett'] = $_POST['username'];
$_SESSION['gpass'] = $_POST['password'];

//superglobal variable for annotator
$_SESSION['getName'] = $_POST['username'];
$_SESSION['getPass'] = $_POST['password'];



//SQL for Admin, Leader, Annotator
$sql = mysqli_query($con,"select* from admin1 where UserName='$user'and password='$pass'");
$result=mysqli_fetch_array($sql);

$sql1 = mysqli_query($con,"select* from leader1 where UserName='$user'and password='$pass'");
$result1=mysqli_fetch_array($sql1);

$sql2 = mysqli_query($con,"select* from Annotator where UserName='$user'and password='$pass'");
$result2=mysqli_fetch_array($sql2);

if($result)
{
	
	$_SESSION["login"]="1";
	header("location:admin.php");
}


elseif($result1)
{
	
	$_SESSION["login"]="1";
	header("location:leader.php");

	// $xx= mysqli_query($con,"SELECT `LeaderID` FROM `leader1` WHERE `Name` = '$user'");
	// $row = mysqli_fetch_assoc($xx);
	// $id = $row['LeaderID'];
	
	// echo $id;
	
	// 	$s=mysqli_query($con,"INSERT INTO annotator (name,email,UserName,Password,LeaderID)
	// values ('wjj','wj@gmail.com','wwww4','123jjh','$id')");
	// echo "done";
}

elseif($result2){

	$_SESSION["login"]="1";
	header("location:Annotator.php");
}

else	
{
	header("location:login.php");
	
}

}
$_SESSION["user"] = $user;
}


?>