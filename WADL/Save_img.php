<?php

session_start();
if (isset($_POST['submit'])){
    mkdir('rr');
if (isset($_POST['AnnTag'])) {
  
    $tags = $_POST['AnnTag'];
    $word =  $_SESSION["words"];
    $length1 =   $_SESSION["length"];
    $ppst=   $_SESSION['getPost'];
    }
$_SESSION["AnnoatationTag"] = $tags; 
$_SESSION["w1"] = $word;  
$_SESSION['getPost']=$ppst;
$_SESSION['length2'] = $length1;
header("location: xml_img.php?size=$tags");}