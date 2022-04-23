<?php
session_start();

$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//ID annotator
$comeN = $_SESSION['getName'];
$comeP = $_SESSION['getPass'];
$sql= mysqli_query($con,"SELECT `AnnotatorID` FROM `Annotator` WHERE `UserName` = '$comeN' and `password`='$comeP'");
$row = mysqli_fetch_assoc($sql);
$annotatoridd = $row['AnnotatorID'];

    




//Task from assignRawData
  $query = "SELECT `TaskID` FROM `assignrawdata` WHERE `AnnotatorID` = '$annotatoridd'";

    $res = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($res)){
        $taskidd=  $row['TaskID'] ;  
     
        


    
    if (isset($_POST["NameTask"])  ) {
        $query1 = "SELECT `Tagset`, dataset, `name`, SpecificType, `Language` FROM `Task` WHERE `TaskID` = '$taskidd'";

        $res1 = mysqli_query($con, $query1);
        while($row1 = mysqli_fetch_array($res1)){
            $tag= $row1['Tagset'] ; 
            $data= $row1['dataset'] ;
            $SpecificType= $row1['SpecificType'] ;
            $Language= $row1['Language'] ;
            $name= $row1['name'] ;
             echo $tag ." " . $data . "<br>";?>



 <?php 
  if (  $SpecificType == "Word" && $Language == "English"){ ?>

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
             
                     
                     $contents = file_get_contents("$data");
                     $lines = explode("\n", $contents);
                     if (!empty($lines)) {
                         foreach ($lines as $line) {
                             // Then you get rid of sequence
                             $word_line = preg_replace("/^([0-9]\))/Ui", "", $line);
                             $words = explode(" ", $word_line);
                             $removed = array_shift($words);
                         }
             
                         
?>                       
                         
             
                         <?php $keys = array_keys($words);
                         rsort($keys);
                         $length = count($keys);
                         $_SESSION["length"] = $length;
                         while (!empty($keys)) {
                             $key = array_pop($keys);
             
                             $_SESSION["words"] = $words[$key];


                             ?>
                                 <ul>
                                     <li > 
                                       
                                         <a href="#"  >  <?php echo  $_SESSION["words"]   .  '<br />'; ?>
                                </a>
                                         <ul>
                                            
                 
                                                 <?php  $path = "$tag";
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


  <?php }//word
  
  elseif ($SpecificType == "Sentence")
  {?>

<!DOCTYPE html>
<html lang="en">

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


        $subject = file_get_contents("$data");
        // split on whitespace between sentences preceded by a punctuation mark
        $str = stristr($subject, " ");
        $result = (preg_split('/(?<=[.?!;:])\s+/', $str, -1, PREG_SPLIT_NO_EMPTY));

        ?>

        <?php $keys = array_keys($result);
        rsort($keys);

        while (!empty($keys)) {
            $key = array_pop($keys);


        ?>
            <ul>
                <li>
                    <a href="#"><?php echo   $result[$key] . '<br />'; ?></a>
                    <ul>

          

                            <?php $path = "$tag";
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




        <?php };

        echo "<br>" . "<br>" . "<br>" . "<br>";



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


<?php 
  } //sentence

  elseif($SpecificType == "Post")
  {?>

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
                    <a href="#"><?php print_r(  $_SESSION['getPost'] ) ; ?></a>
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
      

 <?php }//Post


elseif ($SpecificType == "Word" && $Language == "Arabic"){?>

<!DOCTYPE html>
<html lang="en">

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

        $contents = file_get_contents("$data");
        $lines = explode("\n", $contents);
        if (!empty($lines)) {
            foreach ($lines as $line) {
                // Then you get rid of sequence
                $word_line = preg_replace("/^([0-9]\))/Ui", "", $line);
                $words = array_reverse(explode(" ", $word_line));

                $removed = array_pop($words);
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

                                <?php $path = "$tag";
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


<?php } //Arabic




elseif ($SpecificType == "img"){?>


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
            top: 80%;
            left: 50%;
        }
        #page-wrap{
            margin: 0 auto;
            width: 656px;
            text-align: center;
            position: absolute;
            top: 10%;
            left: 28%;
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

        .s{
            position: absolute;
            top: 30%;
            left: 33%;
           
        
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
<div class="s"><?php

//get current directory
$working_dir = getcwd();

//get image directory
$img_dir = $working_dir . "/images/";

//change current directory to image directory
chdir($img_dir);

//using glob() function get images 
$files = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE );

//again change the directory to working directory
chdir($working_dir);

//iterate over image files
foreach ($files as $file) {
?>
    <img src="<?php echo "images/" . $file ?>" style="height: 320px; width: 500px;"/>
<?php }
?>
 </div>
    <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>

    <div id="navBar1">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Annotation</a></li>
            <li><a href="#">Score</a></li>
            <li><a href="#">Show draft</a></li>
        </ul>
    </div>


    </div>
 
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


?>

<body>
    <div id="page-wrap">
        <h1>what do you see?</h1>


        <ul>

<?php $path = "$tag";
           $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
           $nrl = count($lines);?>
                <form  method="post" id="form1" name="form1" action="Save_img.php">
                                <select  class="form-control" id="AnnTag" name="AnnTag">
           

                                <li> <a href="#"><option value="choose"> </option>;
                                                    <?php for ($i = 0; $i < $nrl; $i++) {?> 
      
                                                        <option name= "select" value="<?php echo urlencode($lines[$i]) ?>" > <?php  echo $lines[$i] ?> </option>;
      
                                                        <?php  } ?>
      
                                                </select>  </a></li>








   </ul>





</div>

</div>


<div id="button1-2">
<button class="first" type="submit" name="submit" value="save">Submit</button>
<button class="first" type="submit" name="save" value="save">Save draft</button>
</form>
</body>





 <?php
} //image
  }

}}



?>




            