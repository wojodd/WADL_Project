<?php
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$sql = "SELECT * FROM `task_type`";
$all_categories = mysqli_query($con,$sql);

$sql2 = "SELECT * FROM `leader1`";
$all_categories2 = mysqli_query($con,$sql2);
// To save the comment and the recipe that liked the visitor in the database
@$a=$_POST['TypeTask'];
@$b=$_POST['date'];  
@$c=$_POST['language'];



$id2 = mysqli_real_escape_string($con,$_POST['Category1']);
$name = mysqli_real_escape_string($con,$_POST['Product_name']);

@$d=$_POST['data'];
@$e=$_POST['tag'];

@$option=$_POST['opt'];



$link = pathinfo("$e");

$filename= $link['filename'];




if(@$_POST['submit'])  
{  
echo $s="insert into Tagset (name) values('$filename')";  
echo '<script type="text/javascript"> alert("Data Inserted")</script>';
mysqli_query($con,$s);  
}
?>