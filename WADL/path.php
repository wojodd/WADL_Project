
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "wadl";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


  $path = "C:/xampp/htdocs/WADL_/wadl3/Tag.txt";
  
  $file1 = basename($path);
  $file2 = basename($path, ".txt");
  
  // Show filename with file extension
  echo $file1 . "\n";

  echo "<br>";
  
  // Show filename without file extension
  echo $file2 . "<br>";




// Check connection

  
  $sql = "INSERT INTO tagset (name,path)
  VALUES ('$file2','$file1')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
  