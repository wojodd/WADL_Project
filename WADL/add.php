<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","wadl");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the categories from category tablee
    $sql = "SELECT * FROM `task_type`";
    $all_categories = mysqli_query($con,$sql);

    $sql2 = "SELECT * FROM `leader1`";
    $all_categories2 = mysqli_query($con,$sql2);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
        // Store the Product name in a "name" variable
        // $name = mysqli_real_escape_string($con,$_POST['Product_name']);
         
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Category']);

        $id2 = mysqli_real_escape_string($con,$_POST['Category1']);
        @$a=$_POST['TypeTask'];
        @$b=$_POST['date'];  
        @$c=$_POST['language'];
        @$d=$_POST['data'];
        @$e=$_POST['tag'];
       
        
        
         
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `Task`( `type`,`deadline`,`language`,`TaskTypeID`,`LeaderID` ,`Dataset',`Tagset` )
            VALUES ('$a','$b','$c'و'$id' ,'$id2','$d','$e')";
           
          // The following code attempts to execute the SQL query
          // if the query executes with no errors 
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Product added successfully")</script>';
        }
    }
?>

<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
  
?>

<!DOCTYPE html>
<html>

<head>

<style>
<?php include 'add.css'; ?>
</style>
 
  <script>
            function random_function()
            {
                var a=document.getElementById("input").value;
                if(a==="NLP")
                {
                    var arr=["Word","Sentence","Pragraph","Post"];
                }
                else if(a==="Image")
                {
                    var arr=["img"];
                }
              
                var string="";
              
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                }
                document.getElementById("output").innerHTML=string;
            }
        </script>

  <title>add task</title>
</head>

<body>


  <ul>
    <li><a href="Admin.php">Home</a></li>
    <li><a href="AddNewleader.php">Add a new leader</a></li>
    <li><a href="Add.php">Add task</a></li>
    <li><a href="ShowCurrentLeader.php">Show current Leaders</a></li>

  </ul>

  <p id="logo"><img src="logoWhite.png" width="80" height="80"> </p>

<!-- -------------------------------------------------------------------->


<form action="up.php"
           method="post"
           enctype="multipart/form-data">

<h2 class="AddTask"> Add task </h2>

<div>

     
     <label>Select Name of task:</label>
             <input type="text" name="Product_name" required>
     
             
      <label>Select type of task:</label>
      <select name="TypeTask" id="input" onchange="random_function()">
            <option>select option</option>
            <option>NLP</option>
            <option>Image</option>
        </select>

      <!-- <select id="ddl2">
      </select> -->


   


        <label>Select a specific type</label>
        
        <select name="opt" id="output" onchange="random_function1()"> 
    </select>
        

        <label>Select a leader</label>
        <select name="Category1">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category1 = mysqli_fetch_array(
                        $all_categories2,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $category1["LeaderID"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category1["Name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>

      
         
   <label>select language:</label> 

  <select name="language">
    <option value=""></option>
    <option value="Arabic">Arabic</option>
    <option value="English">English</option>
  </select>



         
         <label>select Deadline:</label> 
  <input type="date" name="date" id="dateofbirth">
  


  
         
         <label>select dataset:</label> 
         <input type="file" 
                  name="my_image" id="avatar">

 



 
         
         <label>select Tagset:</label> 

  <input type="file" id="avatar" name="tag" accept="">













<button type="submit" name="submit" value="save">Add</button>


</form>

              </div>





</body>

</html>