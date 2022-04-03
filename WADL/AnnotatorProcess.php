<?php

session_start();
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
if (!empty($name)){
if (!empty($email)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "wadl";
// Create connection
$con = new mysqli ($host, $dbusername, $dbpassword, $dbname);

// generate username
$username = mysqli_real_escape_string($con,$_POST['name']);
$tmp = $username;
$inc = 1;
$valid = false;

// lookup if the username is in use
$qid = mysqli_query($con,"select LeaderID from leader1 where username='$username'");
if(mysqli_num_rows($qid) == 0) $valid = true;

// if it is in use, keep looking up until a valid username is found 
while(!$valid) {
    $username = $tmp . $inc; // append number
    $qid = mysqli_query($con,"select LeaderID from leader1 where username='$username'");
    if(mysqli_num_rows($qid) == 0) $valid = true;
    $inc++;

    //optional
    if($inc>1000) die("sorry"); 
}


// generate password
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, 8 );



 //passed data from loginSession page
$come = $_SESSION['gett'];
$come2 = $_SESSION['gpass'];

$xx= mysqli_query($con,"SELECT `LeaderID` FROM `leader1` WHERE `UserName` = '$come' and password='$come2'");
$row = mysqli_fetch_assoc($xx);
$id = $row['LeaderID'];

       echo $id;

// insert user
mysqli_query($con,"INSERT INTO annotator (name,email,UserName,Password,LeaderID)
values ('$name','$email','$username','$password','$id')");
echo "done";



}
else{
    echo "name should not be empty";
    die();
    }}
else{
echo "Email should not be empty";
die();
}


?>