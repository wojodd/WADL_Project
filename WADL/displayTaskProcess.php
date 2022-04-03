<?php
session_start();
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


//ID annotator
$comeN = $_SESSION['getName'];
$comeP = $_SESSION['getPass'];
$sql= mysqli_query($con,"SELECT `AnnotatorID` FROM `Annotator` WHERE `UserName` = '$comeN' and `password`='$comeP'");
$row = mysqli_fetch_assoc($sql);
$annotatoridd = $row['AnnotatorID'];

       echo "AnnotatorID: " . $annotatoridd . "<br>";




//Task from assignRawData
  $query = "SELECT `TaskID` FROM `assignrawdata` WHERE `AnnotatorID` = '$annotatoridd'";

    $res = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($res)){
        $taskidd=  $row['TaskID'] . "<br>";  
        echo "TaskID: " . $taskidd;
        


    $query1 = "SELECT `Tagset`, dataset, `name` FROM `Task` WHERE `TaskID` = '$taskidd'";

    $res1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($res1)){
        $tag= $row1['Tagset'] ; 
        $data= $row1['dataset'] ;
        $name= $row1['name'] ;
        echo $taskidd. $tag . $data . "<br>"; } ?>
        
        
        <input type="submit" value="<?php echo $name ?> ">

    <?php }?>


   



<!-- <?php
    $query12 = "SELECT  Task.tagset, `Tagset`, assignrawdata.TaskID  FROM `assignrawdata` INNER JOIN Task ON assignrawdata.TaskID = Task.TaskID    ";

    $res = mysqli_query($con, $query12);
    while($row = mysqli_fetch_array($res)){
        echo $row['TaskID'] . "<br>"; 
        echo $row['Tagset'] . "<br>"; 
      

         
        
        
    }
  
  


?> -->