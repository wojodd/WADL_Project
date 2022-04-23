<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .taskAnno{
            margin-top: 50px;
            display: grid;
            place-items: center;
            font-size: 250%;}

            input{
                 
                 background: #333;
                 background-image: -webkit-linear-gradient(top, #333, #333);
                 background-image: -moz-linear-gradient(top, #333, #333);
                 background-image: -ms-linear-gradient(top, #333, #333);
                 background-image: -o-linear-gradient(top, #333, #333);
                 background-image: linear-gradient(to bottom, #333, #333);
                 -webkit-border-radius: 11;
                 -moz-border-radius: 11;
                 border-radius: 11px;
                 font-family: Arial;
                 color: #ffffff;
                 font-size: 18px;
                 padding: 10px 20px 10px 20px;
                 text-decoration: none;
                 
                 margin: auto;
                 margin-bottom: 20px;
                 width: 20%;
                 display: grid;
                 place-items: center;
                 left: 40%;
                 bottom:44px;
               }
               
               input:hover {
                 background: rgb(0, 13, 134);
                 background-image: -webkit-linear-gradient(top, rgb(0, 13, 134), rgb(0, 13, 134));
                 background-image: -moz-linear-gradient(top, rgb(0, 13, 134), rgb(0, 13, 134));
                 background-image: -ms-linear-gradient(top, rgb(0, 13, 134), rgb(0, 13, 134));
                 background-image: -o-linear-gradient(top, rgb(0, 13, 134), rgb(0, 13, 134));
                 background-image: linear-gradient(to bottom, rgb(0, 13, 134), rgb(0, 13, 134));
                 text-decoration: none;
               }
                  

        
        </style>
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



<div class="taskAnno"> <h4> <?php echo $_SESSION["user"] ?> you have new tasks  </h4> </div>
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
       ;
      ?>
        

       
           
        
      
        <form method="POST" action="view.php"> 
          
          <input type="submit" name="NameTask" value=" <?php echo $name?>  " > 
        </form>
            
        </body>
        </html>

        
        
        
     

    <?php }}?>

   

 





</body>

</html>