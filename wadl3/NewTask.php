<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleFile.css">
    <title>Files</title>
</head>

<body>
<div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>
    <ul>
        <li><a href="Annotator.php">Home</a></li>
    </ul>

    <?php
session_start();
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);?>



<div class="TextLeader"> <h4> <?php echo $_SESSION["user"] ?> you have new tasks  </h4> </div>
<?php
//ID annotator
$comeN = $_SESSION['getName'];
$comeP = $_SESSION['getPass'];
$sql= mysqli_query($con,"SELECT `AnnotatorID` FROM `Annotator` WHERE `UserName` = '$comeN' and `password`='$comeP'");
$row = mysqli_fetch_assoc($sql);
$annotatoridd = $row['AnnotatorID'];

    




//Task from assignRawData
  $query = "SELECT `TaskID` FROM `assignrawdata` WHERE `AnnotatorID` = '$annotatoridd'";

    $res = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($res)){
        $taskidd=  $row['TaskID'] . "<br>";  
     
        


    $query1 = "SELECT `Tagset`, dataset, `name` FROM `Task` WHERE `TaskID` = '$taskidd'";

    $res1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($res1)){
        $tag= $row1['Tagset'] ; 
        $data= $row1['dataset'] ;
        $name= $row1['name'] ;
         echo $tag ." " . $data . "<br>";
      ?>
        

        <form method="POST" action="NewProces.php"> 
          <input type="submit" name="NameTask" value=" <?php echo $name?> ">
        </form>
        
     

    <?php }}?>

   

 





</body>

</html>