<?php

// db connection here

// set path of uploaded file
$path = "./".basename($_FILES['filename']['name']); 

// move file to current directory
move_uploaded_file($_FILES['filename']['tmp_name'], $path)) {

// get file contents
$data = file_get_contents($path, NULL, NULL, 0, 60000);

// run the query
@mysql_query("INSERT INTO table (column) VALUES ('".$data."')");

// delete the file


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
    

<form enctype="multipart/form-data" action="" method="POST">
  <input name="filename" type="file" /><br />
  <input type="submit" value="upload file" />
</form>

</body>
</html>