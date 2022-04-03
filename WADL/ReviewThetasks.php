
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="ReviewThetasks.css">


<title>Review the tasks</title>
</head>
<body>
	<div id="logo"><img src="logoWhite.png"  width="80" height="80"> </div> 
    
    
	<ul>
        <li><a href="Leader.php">Home</a></li>
        <li><a href="AddAnnotator.php">Add annotator</a></li>
        <li><a href="AssignTasks.php">Assign tasks</a></li>
        <li><a href="">Review the tasks</a></li>
       <li><a href="">Monitor</a></li>
        <li><a href="">Inter-annotator agreement</a></li>
    </ul>
<br><br><br><br>

		<div class="ReviewThetasks"> Review the tasks</div>
		<br><br><br>
<br><br><br>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "wadl");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM annotator";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
    
                echo "<th>Name </th>";
                echo "<th>Click Tasks</th>";
             

            echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td><a href='DisplayThetasks.php'>Display</a></td>";
		
				
				echo "</tr>";
			}
			echo "</table>";
			// Free result set
			mysqli_free_result($result);
		} else{
			echo "No records matching your query were found.";
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);
	?>

							<!-- <td>	<a href="DisplayThetasks.php">Display</a> <!-- Display --></td> -->
                            
			


</body>
</html>