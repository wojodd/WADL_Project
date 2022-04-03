


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file</title>
</head>
<body>

<?php
$file =  file_get_contents('tweet.txt');
echo $file;
echo "<br>" . "<br>"; 

$findAfter = stristr($file," ");
echo $findAfter; 



$arr= explode(" ",$findAfter);
echo "<pre>";
print_r($arr);
echo "</pre>";


echo "<br>" . "<br>"; 

$str= implode("\n",$arr);
echo "<pre>";
echo $str;
echo "</pre>";






echo "<br>" . "<br>";

$findBefore= stristr($file,"_",true);
echo $findBefore;

echo "<br>" . "<br>";

$link = pathinfo('tweet.txt');
echo $link['dirname'] . "<br>";
echo $link['basename'] . "<br>";
echo $link['extension'] . "<br>";
echo $link['filename'] . "<br>";



echo "sssssssssssssssssssssssssssssssssssssssssssssss" . "<br>" ;
$file = fopen("text.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($file);
}

fclose($file);

var_dump($members);



?>


    
</body>
</html>