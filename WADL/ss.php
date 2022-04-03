<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","wadl");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the categories from category table
    $sql = "SELECT * FROM `annotator`";
    $all_categories = mysqli_query($con,$sql);

    $sql2 = "SELECT * FROM `task`";
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
       
       
        
        
         
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `assignrawdata`( `annotatorID`,`TaskID`,`LeaderID` )
            VALUES ('$id' ,'$id2','30')";
           
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form method="POST" action="" >

<label>Select a specific type</label>
        <select name="Category">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $category["AnnotatorID"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category["Name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
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
                <option value="<?php echo $category1["TaskID"];
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

        <button type="submit" name="submit" value="save">Add</button>

</form>
</body>
</html>