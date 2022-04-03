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
    } ?>

<div>

    <?php
    echo "<br>";
    $lines = array();
    $fp = fopen('text.txt', 'r');
    while (!feof($fp)) {
        $line = fgets($fp);


        //process line however you like
        $line = trim($line);
        $ex = explode("\n", $line); 
        foreach ($ex as $e) {
            $arrx =  stristr(htmlspecialchars($line), " ") . "<br>";
        }

        //add to array
        $lines[] = $arrx;
    }

     ?>
    <?php $length = count($lines); ?>
    <?php for ($i = 0; $i < $length; $i++) { echo " . " ;?>
        <ul>
            <li>
                <a href="#"><?php print_r($lines[$i] . "<br>") . "<br>"; ?></a>
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

                                        $lengthx = count($tags);

                                        for ($x = 0; $x < $lengthx; $x++) {
                                        
                                        ?>

                    <li> <a href="#"><?php  echo "<input type='radio' name='receptionts[]' value='".$tags[$x] ."' /> ".
    $tags[$x]." <br />";} ?></a></li>
                    

                    
                  
                     


                </ul>
            </li>
        </ul>
        



    <?php }  
    
    echo "<br>" . "<br>". "<br>" . "<br>";

    
    
    ?>

</div>









    

    <div>

        <ul>
            <li>
                <a href="#"><?php print_r($lines[0]);
                            '<br>';  ?></a>
                <ul>
                    <li> <a href="#"><?php print_r($tags[0]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[1]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[2]);
                                        '<br>';  ?></a></li>

                </ul>
            </li>

            <li>
                <a href="#"><?php print_r($lines[1]);
                            '<br>';  ?></a>
                <ul>
                    <li> <a href="#"><?php print_r($tags[0]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[1]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[2]);
                                        '<br>';  ?></a></li>

                </ul>
            </li>

            <li>
                <a href="#"><?php print_r($lines[2]);
                            '<br>';  ?></a>
                <ul>
                    <li> <a href="#"><?php print_r($tags[0]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[1]);
                                        '<br>';  ?></a></li>
                    <li> <a href="#"><?php print_r($tags[2]);
                                        '<br>';  ?></a></li>

                </ul>
            </li>
        </ul>
    </div>
<?php
    $filecontents = file_get_contents('text.txt');

$words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);

print_r($words);
?>





</body>

</html>