

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="stdntdetails" action="pro.php" method="post">
    <select name="department">
        <option value="IT">Information Technology</option>
        <option value="IS">Information System</option>
        <option value="CS">Computer Science</option>
    </select>
    <input type="submit" id="loginbtn" name="submit"/>


    <form method="POST" action="annProcess.php">
                                <?php $path = "tags.txt";
                                $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                $nrl = count($lines);
                                echo '<select name="file">';


                                ?>

                                <li> <a href="#"><?php echo   '<option value="choose"> </option>';
                                                    for ($i = 0; $i < $nrl; $i++) {
                                                        echo   '<option name= "select" value="' . urlencode($lines[$i]) . '">' . $lines[$i] . '</option>';
                                                    }
                                                    echo '</select>'; ?> </a></li>

<input type="submit" id="loginbtn" name="submit"/>

</form>
</body>
</html>
