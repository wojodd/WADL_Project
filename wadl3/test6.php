<!DOCTYPE html>
<html lang="en">

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

</body>

</html>
<?php

$contents = file_get_contents("text6.txt");
$lines = explode("\n", $contents);
if (!empty($lines)) {
    foreach ($lines as $line) {
        // Then you get rid of sequence
        $word_line = preg_replace("/^([0-9]\))/Ui", "", $line);
        $words = explode(" ", $word_line);
        $removed = array_shift($words);
    }

    $keys = array_keys($words);
    rsort($keys);

    while (!empty($keys)) {
        $key = array_pop($keys);
        echo $key . ' = ' . $words[$key] . '<br />';
    };
}



?>

<div>
    <?php


    $contents = file_get_contents("text6.txt");
    $lines = explode("\n", $contents);
    if (!empty($lines)) {
        foreach ($lines as $line) {
            // Then you get rid of sequence
            $word_line = preg_replace("/^([0-9]\))/Ui", "", $line);
            $words = explode(" ", $word_line);
            $removed = array_shift($words);
        }

        $lengthd = count($lines); ?>

        <?php $keys = array_keys($words);
        rsort($keys);

        while (!empty($keys)) {
            $key = array_pop($keys);


        ?>
            <ul>
                <li>
                    <a href="#"><?php echo   $words[$key] . '<br />'; ?></a>
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

                        // $lengthx = count($tags);

                        // for ($x = 0; $x < $lengthx; $x++) {

                        ?>

                        <li> <a href="#"><?php
                                            $path = "tags.txt";
                                            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                            $nrl = count($lines);
                                            echo '<select name="file[]">';
                                            for ($i = 0; $i < $nrl; $i++) {
                                                echo   '<option value="' . urlencode($lines[$i]) . '">' . $lines[$i] . '</option>';
                                            }
                                            echo '</select>'; ?></a></li>







                    </ul>
                </li>
            </ul>




    <?php }
    };

    echo "<br>" . "<br>" . "<br>" . "<br>";



    ?>

</div>