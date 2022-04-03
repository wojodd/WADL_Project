<?php
 $hote = '127.0.0.1'; //server
 $login = 'root';
 $pass = '';
 $namedb = 'wadl';
 $pdo  = new PDO("mysql:host=$hote;dbname=$namedb", $login, $pass);

 //Read lines in the file after =


$file="./text.txt";
$d=file_get_contents($file);
$lines=explode("'/\s+/'",$d);
foreach($lines as $line){

    echo $line. '<br';
}

$fp=file("./text.txt");

    foreach($fp as $line)
    {
    
      echo ' <a href="http://example.com/'.$line.'/something/">'.$line.'</a>'; 
            echo "<br>";

    }


 
 



?>

<?php 

echo "<br>";
$lines=array();
$fp=fopen('text.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);


    //process line however you like
    $line=trim($line);
    $ex = explode("\n", $line);
    foreach($ex as $e){
        $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";

    }

    //add to array
    $lines[]=$arrx;

}
echo "<pre>";
print_r($lines);
echo "</pre>";

?>

<?php

$assocArray = array( 1,  2, 3);
$keys = array_keys($assocArray);
rsort($keys);

while (!empty($keys)) {
    $key = array_pop($keys);
    echo $key . ' = ' . $assocArray[$key] . '<br />';
};

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
    
<form method="POST" action="#">
<input type="submit" name="start" value="start">
</form>


</body>
</html>