<!DOCTYPE html>
<html>

<head>
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
        session_start();

        $lines = array();
        $fp = fopen('text.txt', 'r');
        while (!feof($fp)) {
            $line = fgets($fp);


            //process line however you like
            $line = trim($line);
            $ex = explode("\n", $line);
            foreach ($ex as $e) {
                $arrx =  stristr(htmlspecialchars($line), " ") ;
            }

            //add to array
            $lines[] = $arrx;
        }

        ?>
        <?php $length = count($lines); ?>
        <?php for ($i = 0; $i < $length; $i++) {
           $_SESSION['getPost']= $lines[$i]; 

            ?>
            <ul>
                <li>
                    <a href="#"><?php print_r(  $_SESSION['getPostt'] ) ; ?></a>
                    <ul>

                 <?php $path = "tags.txt";
                            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                            $nrl = count($lines);?>
                                 <form  method="post" id="form1" name="form1" action="savesxml.php">
                                                 <select  class="form-control" id="AnnTag" name="AnnTag">
                            

                                                 <li> <a href="#"><option value="choose"> </option>;
                                                                     <?php for ($i = 0; $i < $nrl; $i++) {?> 
                       
                                                                         <option name= "select" value="<?php echo urlencode($lines[$i]) ?>" > <?php  echo $lines[$i] ?> </option>;
                       
                                                                         <?php  } ?>
                       
                                                                 </select>  </a></li>








                    </ul>
                </li>
            </ul>




        <?php }




        ?>

    </div>



    </div>


    <div id="button1-2">
        <button class="first" type="submit" name="submit" value="save">Submit</button>
        <button class="first" type="submit" name="save" value="save">Save draft</button>
        </form>
    </div>









</body>

</html>