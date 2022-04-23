<?php
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'xx';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(isset($_POST['submit'])){
    if(isset($_POST['tagg'])){
      $department=$_POST['tagg'];
    
      $querye = "INSERT INTO task (tagset) VALUES ('$department' )";
      $sql=mysqli_query($conn,$querye);
      mysqli_close($conn);                     
    }
  }

 

  ?>