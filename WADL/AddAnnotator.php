<html>
    <head>
        <link rel="stylesheet" href="AddAnnotator1.css">
    <title>Add Annotator</title>
    
    </head>
    <body>
     
        <div id="logo"><img src="logoWhite.png"  width="80" height="80"> </div> 
    
    <ul>
        <li><a href="Leader.php">Home</a></li>
        <li><a href="AddAnnotator.php">Add annotator</a></li>
        <li><a href="AssigningTasks.php">Assigning tasks</a></li>
        <li><a href="ReviewThetasks.php">Review the tasks</a></li>
       <li><a href="">Monitor</a></li>
        <li><a href="">Inter-annotator agreement</a></li>
    </ul>

    <br>
    <br>
    <br>
    <div class="AddAnnotator"> <P>Add Annotator</P> </div>
<form method="post" action="AnnotatorProcess.php"> 
    <div class="Enter">  
    <label for="fname">Annotator Name<br></label>
    <input type="text" id="name" name="name"><br>
    <label for="lname">Email<br></label>
    <input type="text" id="email" name="email">

</div>

<button type="submit" name="submit" value="save">save</button>


    
    
    
      
      
    
    
    
     
    </body>
    </html>