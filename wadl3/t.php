<?php
$handle = fopen("tags.txt", "r");
while($row = fgetcsv($handle, 1024)){
    echo "<input type='checkbox' name='receptionts[]' value='".$row[1] ."' /> ".
         $row[0]." <br />";
}?>

<?php 

  $tags = array();
 $fp = fopen('tags.txt', 'r');
 while (!feof($fp)) {
     $line = fgets($fp);

     //process line however you like
     $line = trim($line);

     //add to array
     $tags[] = $line;
 }

 $length = count($tags);

 for ($x = 0; $x < $length; $x++) {
    echo "<input type='radio' name='receptionts[]' value='".$tags[$x] ."' /> ".
    $tags[$x]." <br />";

 }
