<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
  
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Leader1.css">
<title>Leader</title>

</head>
<body>

  <div id="logo"><img src="logoWhite.png"  width="80" height="80"> </div> 

<ul>
  <li><a href="Leader.php">Home</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

  
<br><br><br><br> <br><br>
 
<div class="TextLeader"> <h4> Welcome Leader <?php echo $_SESSION["user"] ?>  </h4> </div>
<br>
<br>
<br>
<div class="btn-group">
  <div class="position1">
<button type="button" onclick="window.location.href='AddAnnotator.php'">Add annotator</button>
<button type="button" onclick="window.location.href='AssigningTasks.php'">Assign tasks</button>
<button type="button" onclick="window.location.href='ReviewThetasks.php'">Review the tasks</button>
<button type="button" onclick="window.location.href='#'">Monitor</button>
<button type="button" onclick="window.location.href='#'">Inter-annotator agreement</button>

  </div></div>


  
  



 
</body>
</html>