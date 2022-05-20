<?php
    session_start();

    
    $size=$_GET['size'];
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
    
        
    
    
    
    
    //Task from assignRawData
      $query = "SELECT `TaskID` FROM `assignrawdata` WHERE `AnnotatorID` = '$annotatoridd'";
    
        $res = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($res)){
            $taskidd=  $row['TaskID'] ;  }

              
  
      $query1 = "SELECT `Tagset`, dataset, `name`, SpecificType, `Language` FROM `Task` WHERE `TaskID` = '$taskidd'";

      $res1 = mysqli_query($con, $query1);
      while($row1 = mysqli_fetch_array($res1)){
          $tag= $row1['Tagset'] ; 
          $data= $row1['dataset'] ;
          $SpecificType= $row1['SpecificType'] ;
          $Language= $row1['Language'] ;
          $name= $row1['name'] ;
       

            
//new folder  you want to create
$newfolder="$name";
//get the current working directory.
$curdir= getcwd();

//append the "upload" folder which already exits in ur working directory alog with the new directory name  "$newfolder"
$dir= $curdir."\posts"."/$newfolder";
//check if directory exits

if(is_dir($dir))
{
    echo " Directory exists";
}
else
{
    //create new directory recursively
    mkdir($dir,0777,true);
    echo " Directory Created";
}}
        

$dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true;

  $root = $dom->createElement('root');
  $dom->appendChild($root);

  $result = $dom->createElement('doccument');
  $root->appendChild($result);
  $result->setAttribute('id', 1);

  $ann = $dom->createElement('AnnotatorID', "$annotatoridd");
  $result->appendChild($ann);


  $TaskID = $dom->createElement('TaskID', $taskidd);
  $result->appendChild($TaskID);



 
  for ($i = 1; $i <= 1; $i++) {

    $Token2 = $dom->createElement('Image');
    $result->appendChild($Token2);
    $Token2->setAttribute('id', $i);

  
    $AnnotationTag = $dom->createElement('AnnotationTag',$_SESSION["AnnoatationTag"] );
    $Token2->appendChild($AnnotationTag);





  
  
  
    }
  



 

  echo '<xmp>'.   $xmlraw = $dom->saveXML() .'</xmp>';



 $xmlpath ="$dir/result2.xml";


 $file1 = basename($xmlpath);

 
 // Show filename with file extension
 echo $file1;


  $dom->save("$xmlpath") or die('XML Create Error');

  $escapedString = mysqli_real_escape_string($con,$file1);
  $query = "INSERT INTO final_save (PathOfSavedFile) VALUES ('$escapedString')";
  echo '<script type="text/javascript"> alert("Data Inserted")</script>';
  mysqli_query($con,$query); 


   ?>