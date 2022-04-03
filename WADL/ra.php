<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">


    <style>
        #button1-2 {
            margin: 0 auto;
            width: 656px;
            text-align: center;
            position: absolute;
            top: 70%;
            left: 50%;
        }


        .first {
            margin-top: 10px;
            width: 20%;
            background-color: #333;
            color: #ffffff;
            padding: 12px 0;
            font-size: 18px;
            font-weight: 400;
            border-radius: 5px;
            cursor: pointer;


        }



        #logo {
            position: absolute;
            top: -1%;
            left: 2%;
            z-index: 100;


        }

        /* القوائم  */

        #navBar1 {
            text-align: right;
            background: #eff3f5;
            background-color: #333;



        }

        #navBar1 li a:hover {
            background-color: rgb(0, 13, 134);
        }

        #navBar1 li a {
            display: block;
            color: white;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* القوائم  */


        .myDiv {
            padding: 1rem;
            position: relative;
            margin: 180px;
            border: 1px outset black;
            text-align: center;
            background: #d8dcdf;

        }

        .myDiv h2 {
            /* اسم المهمة مثل task1  */
            background: rgba(0, 13, 134, 0.904);
            color: white;
            margin: -1rem -1rem 1rem -1rem;
            padding: 1rem;
        }

        div a {
            color: black;
            text-decoration: none;
            font-size: 20px;
            padding: 2px;
            display: inline-block;

        }

        li.active,
        a.active {
            background-color: #f90;
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

            border-radius: 9px;

        }

        ul li:hover ul {
            display: block;


        }

        ul li ul {
            position: absolute;
            width: 90px;
            display: none;
        }

        ul li ul li {
            border-radius: 1px;
            background: rgb(255, 255, 255);
            display: block;
        }

        ul li ul li a {
            display: block !important;
        }

        ul li ul li:hover {
            background: #f90;
            ;
        }
    </style>
</head>






<body>

    <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>

    <div id="navBar1">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Annotation</a></li>
            <li><a href="#">Score</a></li>
            <li><a href="#">Show draft</a></li>
        </ul>
    </div>


    <div class="myDiv">
        <h2>Task2</h2>


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
                        <form name="stdntdetails" action="pro.php" method="post">

<?php $path = "tags.txt";
$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$nrl = count($lines);
echo '<select name="department">';


?>

<li> <a href="#"><?php echo   '<option value="choose"> </option>';
                    for ($i = 0; $i < $nrl; $i++) {
                        echo   '<option name= "select" value="' . urlencode($lines[$i]) . '">' . $lines[$i] . '</option>';
                    }
                    echo '</select>'; ?> </a></li>












                        </ul>
                    </li>
                </ul>




        <?php }
        };



        echo "<br>" . "<br>" . "<br>" . "<br>";
        ?>

<!-- <input type="submit" id="loginbtn" name="submit"/> -->




    </div>

    </div>


    <div id="button1-2">
        <button class="first" type="submit" name="submit" value="save">Submit</button>
        <button class="first" type="submit" name="save" value="save">Save draft</button>
        </form>
    </div>
    

</body>

</html>