<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `leader1` where LeaderID='$id'");
	$row=mysqli_fetch_array($query);
?>


<html>
<head>
<style>
<?php include 'sign-up.css'; ?>
</style>
<title>Basic MySQLi Commands</title>

</head>
<body>
    
<nav class="WADLMenu">


<ul>
   <li><a href="Home-page.php">Home</a></li>
 </ul>

         <div class="dot"></div>
     </nav>


<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


  

	<form method="POST" action="update.php?id=<?php echo $id; ?>">

 
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="imgform"><img src="logoblack.png"  width="200" height="200"> </div>


		<label>Name:</label><input type="text" value="<?php echo $row['Name']; ?>" name="name">
        <label>Username:</label><input type="text" value="<?php echo $row['UserName']; ?>" name="UserName">
		<label>Email:</label><input type="text" value="<?php echo $row['Email']; ?>" name="email">
        <label>Password:</label><input type="text" value="<?php echo $row['Password']; ?>" name="pass">
		<input type="submit" value="update" name="submit">
		<a href="ShowCurrentLeader.php">Back</a>
	</form>
    <h4>Edit Leader</h4>
</body>
</html>