<?php
session_start();
if (!isset($_SESSION["login"]))
  header("location:login.php");

?>



<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="Styles Admin.css">
  <title>Admin</title>

</head>

<body>


  <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>


  <ul>
    <li><a href="Admin.php">Home</a></li>
    <li><a href="logout.php">Logout</a></li>

  </ul>


  <br> <br> <br> <br> <br> <br>

  <div class="TextAdmin">
    <h5> Welcome Admin <?php echo $_SESSION["user"] ?> </h5>
  </div>

  <div class="btn-group">
    <div class="position1">
      <button type="button" onclick="window.location.href='AddNewleader.php'">Add a new leader</button>
      <button type="button" onclick="window.location.href='Add.php'">Add task</button>
      <button type="button" onclick="window.location.href='ShowCurrentLeader.php'">Show current Leaders</button>
    </div>
  </div>


</body>

</html>