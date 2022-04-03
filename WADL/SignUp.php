<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="sign-up.css">
<title>Sign up</title>

</head>

<body>

     <ul>
        <li><a href="Home-page.php">Home</a></li>
      </ul>
      
    
    
    <form action="insert_sign.php" method="POST">
  
        <br><br> <br> <br>
        <div id="imgform"><img src="logoBlack.png"  width="200" height="200"> </div>

        
        <label for="username">Username</label>
        <input type="text" name="name" id="username">

        <label for="Email">Email</label>
        <input type="email" name="email" id="Email" >

        <label for="password">Password</label>
        <input type="password"  name="password" id="password">

        <label for="Confirm Password">Confirm Password</label>
        <input type="password" id="ConfirmPassword">

<br>
     
        <label for="pet-select">Register</label>
        <div class="contact-form">

        <input type="submit" name="leader" value="Register as Leader"> 
        <input type="submit" name="annotator" value="Register as Annotator">
       </div

       
       </form>
     
 </body>
 </html>