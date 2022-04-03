<!DOCTYPE html>
<html>

<head>
	<style>
		<?php include 'ShowCurrentLeader.css'; ?>
	</style>



	<title>Show Current Leader</title>
</head>

<body>
	<div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>


	<ul>
		<li><a href="Admin.php">Home</a></li>
		<li><a href="AddNewleader.php">Add a new leader</a></li>
		<li><a href="Add.php">Add task</a></li>
		<li><a href="ShowCurrentLeader.php">Show current Leaders</a></li>

	</ul>
	<br><br><br><br>

	<div class="ShowCurrentLeader"> Show current leader</div>
	<br><br><br>
	<br><br><br>


	<table border="1">
		<thead>
			<th>id</th>
			<th>name</th>
			<th>Edit and delete</th>

		</thead>
		<tbody>
			<?php
			include('conn.php');
			$query = mysqli_query($conn, "select * from `leader1` WHERE DeletedFlag = '0' ");
			while ($row = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td><?php echo $row['LeaderID']; ?></td>
					<td><?php echo $row['Name']; ?></td>

					<td>
						<a href="editt.php?id=<?php echo $row['LeaderID']; ?>"><img src='icons8-edit-identification-card-of-an-employee-procedure-96.png' width="20" height="20" /></a> <!-- Edit -->
						<a href="deletee.php?id=<?php echo $row['LeaderID']; ?>"><img src='icons8-delete-trash-96.png' width="20" height="20" /></a><!-- delete -->
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

</body>

</html>