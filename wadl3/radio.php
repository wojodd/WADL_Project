<?php

if (isset($_POST['submit'])){   
    
  }else{
  
     $filename = "tags.txt";
     $handle1 = fopen($filename,"r") or exit("Can’t open file!");
     $radio1 = fread($handle1, filesize($filename));
     fclose($handle1);
  
  //The same for all files...
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<input type="radio" name="radio1" value="1" <?php if($radio1 == 1){ echo "checked";} ?>>
<input type="radio" name="radio1" value="2" <?php if($radio1 == 2){ echo "checked";} ?>>

    
</body>
</html>