<!DOCTYPE html>
<html>

<head>
    <style>
        div a {
            text-decoration: none;
            color: blue;
            font-size: 20px;
            padding: 15px;
            display: inline-block;
        }

        ul {
            display: inline;
            margin: 0;
            padding: 0;
        }

        ul li {
            display: inline-block;
        }

        ul li:hover {
            background: #c5c5c5;
        }

        ul li:hover ul {
            display: block;
        }

        ul li ul {
            position: absolute;
            width: 200px;
            display: none;
        }

        ul li ul li {
            background: #c5c5c5;
            display: block;
        }

        ul li ul li a {
            display: block !important;
        }

        ul li ul li:hover {
            background: #666;
        }
    </style>
</head>

<body>

    <?php

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

 
    
    
    
    ?>
    
    <?php
    
    
    echo "<br>";
    $lines = array();
    
    $fp=fopen('text.txt', 'r');
    while (!feof($fp))
    {
        $line=fgets($fp);
    
    
        //process line however you like
        $line=trim($line);
        $ex = explode("\n", $line);
        foreach($ex as $e){
            $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";
            $word_line = preg_replace("/^([0-9]\))/Ui", "", $arrx);
            $words = explode(" ", $word_line); 
            $lines[] =   $words;
           
        }
    
        
    
    }
    
    
    
    
    ?>
    
    <?php for ($row = 0; $row < count($lines); $row++) { ?>
            
          <?php  for ($col = 0; $col < count($lines); $col++) { ?>
              
            
    
        <ul>
            <li>
                <a href="#"><?php   print_r($lines[$row][$col] . " "); ?></a>
                <ul>
    
               <?php $tags = array();
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
                                        
                                        ?>
    
                    <li> <a href="#"><?php print_r($tags[$x] ); } ?></a></li>
                    
    
                    
                  
                     
    
    
                </ul>
            </li>
        </ul>
        
    
    
    
    <?php }}  ?>
    


    
   





</body>

</html>