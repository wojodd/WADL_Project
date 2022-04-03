<!DOCTYPE html>
<html>
<head>
<style>
<?php include 'styless.css'; ?>
</style>
<title>Login</title>

</head>



<body>

    <ul>
    <li><a href="Home-page.php">Home</a></li>
  </ul>
  
  <form action= "loginSession.php" method="POST">
       
        <br>
        <br>
        <br> 
        <br>
        <br>

        
        <div id="imgform"><img src="logoBlack.png"  width="200" height="200"> </div>

        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">


        <div class="contact-form">
        <input type="submit" value="Login" name="submit">
        </div>

       <div id="Signup">   <a href="SignUp.php"><h1> Do not have any account? Sign up </h1> </a></div>
       

      
    </form>

    <h3>Login Here</h3>

</body>
</html>