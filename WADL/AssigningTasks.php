<?php
session_start();
// Connect to database 
$con = mysqli_connect("localhost", "root", "", "wadl");

// mysqli_connect("servername","username","password","database_name")

// Get all the categories from category table
$sql = "SELECT * FROM `annotator`";
$all_categories = mysqli_query($con, $sql);


$come = $_SESSION['gett'];
$come2 = $_SESSION['gpass'];
$xx = mysqli_query($con, "select LeaderID from leader1 where UserName='$come'and password='$come2'");
$row = mysqli_fetch_assoc($xx);
$le = $row['LeaderID'];

$sql2 = "SELECT * FROM `task`WHERE LeaderID = $le";
$all_categories2 = mysqli_query($con, $sql2);

// The following code checks if the submit button is clicked 
// and inserts the data in the database accordingly
if (isset($_POST['submit'])) {
    // Store the Product name in a "name" variable
    // $name = mysqli_real_escape_string($con,$_POST['Product_name']);

    // Store the Category ID in a "id" variable
    $id = mysqli_real_escape_string($con, $_POST['Category']);

    $id2 = mysqli_real_escape_string($con, $_POST['Category1']);




    $come = $_SESSION['gett'];
    $come2 = $_SESSION['gpass'];
    $xx = mysqli_query($con, "select LeaderID from leader1 where UserName='$come'and password='$come2'");
    $row = mysqli_fetch_assoc($xx);
    $le = $row['LeaderID'];

    


    // Creating an insert query using SQL syntax and
    // storing it in a variable.

    $sql_insert =
        "INSERT INTO `assignrawdata`( `annotatorID`,`TaskID`,LeaderID )
            VALUES ('$id' ,'$id2','$le' )";

    // The following code attempts to execute the SQL query
    // if the query executes with no errors 
    // a javascript alert message is displayed
    // which says the data is inserted successfully
    if (mysqli_query($con, $sql_insert)) {
        echo '<script>alert("The task has been assign successfully")</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <style>
        <?php include 'AssigningTasks.css'; ?>
    </style>

    <script type="text/javascript" src="add-task.js"></script>

    <title>Assigning tasks</title>
</head>

<body>
    <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>


    <ul>
        <li><a href="Leader.php">Home</a></li>
        <li><a href="AddAnnotator.php">Add annotator</a></li>
        <li><a href="AssigningTasks.php">Assigning tasks</a></li>
        <li><a href="ReviewThetasks.php">Review the tasks</a></li>
        <li><a href="">Monitor</a></li>
        <li><a href="">Inter-annotator agreement</a></li>
    </ul>




    <form method="POST" action="">
        <br> <br><br><br>
        <div class="AssigningTasks"> Assigning tasks</div>

        <div class="PTypeOfText">Annotator name</div>


        <div class="TypeOFText">
            <br>
            <select name="Category">
                <?php
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                    $all_categories,
                    MYSQLI_ASSOC
                )) :;
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
        </div>



        <div class="TNameOfLeader">Task Name</div>


        <div class="NameOfLeader">
            <!-- السليكت تظهر هنا-->
            <select name="Category1">
                <?php
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category1 = mysqli_fetch_array(
                    $all_categories2,
                    MYSQLI_ASSOC
                )) :;
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

        </div>





        <br><br><br>
        <br><br><br>

        <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "", "wadl");

        // Check connection
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Attempt select query execution
        $come = $_SESSION['gett'];
        $come2 = $_SESSION['gpass'];
        $xx = mysqli_query($con, "select LeaderID from leader1 where UserName='$come'and password='$come2'");
        $row = mysqli_fetch_assoc($xx);
        $le = $row['LeaderID'];

        $sql = "SELECT * FROM task WHERE LeaderID = $le";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th> ID </th>";
                echo "<th>Name of task</th>";
                echo "<th>Type of task</th>";
                echo "<th> Specific Type </th>";
                echo "<th>Deadline</th>";
                echo "<th>Language</th>";



                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['TaskID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Type'] . "</td>";
                    echo "<td>" . $row['SpecificType'] . "</td>";
                    echo "<td>" . $row['Deadline'] . "</td>";
                    echo "<td>" . $row['Language'] . "</td>";


                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // Close connection
        mysqli_close($link);
        ?>


        <br><br>

        <button type="submit" name="submit" value="save">Assign</button>


        <div class="Enter">


            <label for="fname">
                <div class="color1">Number of files:</div>
            </label>
            <input type="text" id="fname" name="fname"><br><br>

            <label for="lname">
                <div class="color1">IAA:</div>
            </label>
            <input type="text" id="lname" name="lname"><br><br>


            <div id="imgPercent">
                <img src='icons8-percentage-96-2.png' width="20" height="20" />
            </div>



    </form>









</body>

</html>