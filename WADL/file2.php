<?php
 $hote = '127.0.0.1'; //server
 $login = 'root';
 $pass = '';
 $namedb='wadl';
$pdo  = new PDO("mysql:host=$hote;dbname=$namedb", $login, $pass);

$stmt = $pdo->query("SELECT * from task order by TaskID desc limit 1");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table border="1" >'."\n";
foreach ( $rows as $row ) {

$tag=($row['Tagset']);

//echo("</td><td>");
}


$contents=file_get_contents("$tag");


$lines=explode("\n",$contents);
foreach($lines as $line){
    
    $findAfter = stristr($line," ");

 echo $findAfter.'<br>' ;

}



for ($i=0; $i<count($lines);$i++){
    echo "<link rel='stylesheet' href='css/" . $lines[$i] . " .css'>";
}
echo "<br>";
echo "مصدر الملف:" . "<br>";

$lines=explode("\n",$contents);
foreach($lines as $line){
    
    $findAfter = stristr($line,"_text",true);

 echo $findAfter.'<br>';

}

echo "<br>" . "<br>";
echo "tagset: " . "<br>" ;
$tagset=file_get_contents("tags.txt");
$lines=explode("\n",$tagset);
foreach($lines as $line){
    
   

 echo $line.'<br>' ;

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
    
</body>
</html>



