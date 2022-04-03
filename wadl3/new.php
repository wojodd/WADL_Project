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
    "<div>";
    $hote = '127.0.0.1'; //server
    $login = 'root';
    $pass = '';
    $namedb = 'wadl';
    $pdo  = new PDO("mysql:host=$hote;dbname=$namedb", $login, $pass);

    //Read lines in the file after =
    $stmt = $pdo->query("SELECT * from task order by TaskID desc limit 1");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        $tag = ($row['Tagset']);
    }
    $contents = file_get_contents("text.txt");

    $lines = explode("\n", $contents);
    foreach ($lines as $line) {

        $findAfter = stristr($line, " ");
        
        echo "<br>". $findAfter . '<br>';
    }

    // for ($i=0; $i<count($lines);$i++){
    //     echo "<link rel='stylesheet' href='css/" . $lines[$i] . " .css'>";
    // }


    echo "<br>" . "<br>";

    echo "Tagset/ " . "<br>";
    $tagset = file_get_contents("tags.txt");
    $lines = explode("\n", $tagset);
    foreach ($lines as $line) {
        

        echo '<i><p style="font-family:arial; color:blue; font-size:15px;  margin:auto;"> <strong>' . $line. '</strong> ' . '</i></p>';
    }




    echo "<br>"."<br>";
    echo "مصدر الملف:" . "<br>";

    $lines = explode("\n", $contents);
    foreach ($lines as $line) {

        $findAfter = stristr($line, "_text", true);
        echo $findAfter . "<br>";
       
  
    }



    "</div>";

    ?>

</body>

</html>