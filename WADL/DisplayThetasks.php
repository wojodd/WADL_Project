<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="DisplayThetasks.css">


<title>Display The tasks</title>
</head>
<body>
	<div id="logo"><img src="logoWhite.png"  width="80" height="80"> </div> 
    
    
	<ul>
        <li><a href="Leader.php">Home</a></li>
        <li><a href="AddAnnotator.php">Add annotator</a></li>
        <li><a href="AssignTasks.php">Assign tasks</a></li>
        <li><a href="ReviewThetasks.php">Review the tasks</a></li>
       <li><a href="">Monitor</a></li>
        <li><a href="">Inter-annotator agreement</a></li>
    </ul>
<br><br><br><br>

		<div class="Displaythetasks"> Display the tasks</div>
		<br><br><br>
<br><br><br>


<table border="1">
			<thead>
				
				<th>Tasks</th>
                <th> click</th>
   
			</thead>
			<tbody>
				<?php
					include('conn.php');
					$query=mysqli_query($conn,"select * from `annotator`");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							
							<td><?php echo $row['Tasks']; ?></td>
                            
							<td>
							<a href='GradeTheTask.php'>cheack</a></td>
								
							
						</tr>
						<?php
					}
				?>

</body>
</html>