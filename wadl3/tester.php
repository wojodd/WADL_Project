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


    


    //...............................................................................

    $contents = file_get_contents("text.txt");
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted

    if (isset($_POST['start'])) {

    $lines = explode("\n", $contents);
  
    foreach ($lines as $line) {

            $findAfter = stristr($line, " ");
            echo "<br>". $findAfter . '<br>';
            echo "<input type='submit' name='new' value='Next'>";
    
    } } else {
        "//Error";
    }
}
        
     

    // for ($i=0; $i<count($lines);$i++){
    //     echo "<link rel='stylesheet' href='css/" . $lines[$i] . " .css'>";
    // }



   

// echo "<script>
//     function save(){ alert('save func');}
//  </script>";
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