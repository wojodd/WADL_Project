<?php
session_start();
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$sql = "SELECT * FROM `Annotator`";
$all_categories = mysqli_query($con,$sql);

$sql2 = "SELECT * FROM `Task`";
$all_categories2 = mysqli_query($con,$sql2);
// To save the comment and the recipe that liked the visitor in the database


$d = mysqli_real_escape_string($con,$_POST['Category']);

$id2 = mysqli_real_escape_string($con,$_POST['Category1']);


$come = $_SESSION['gett'];
$come2 = $_SESSION['gpass'];

$xx= mysqli_query($con,"SELECT `LeaderID` FROM `leader1` WHERE `Name` = '$come' and password='$come2'");
$row = mysqli_fetch_assoc($xx);
$le= $row['LeaderID'];

       echo $le;


if(@$_POST['submit'])  
{  
echo $s="insert into assignrawdata (AnnotatorID,TaskID,LeaderID`) values('$id','$id2','$le')";  
echo '<script type="text/javascript"> alert("Data Inserted")</script>';
mysqli_query($con,$s);  
}
?>