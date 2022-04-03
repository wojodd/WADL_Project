<html>

<head>
    <link rel="stylesheet" href="AddNewleader.css">
    <title>Add new lader</title>

</head>

<body>

    <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>


    <ul>
        <li><a href="Admin.php">Home</a></li>
        <li><a href="AddNewleader.php">Add a new leader</a></li>
        <li><a href="Add.php">Add task</a></li>
        <li><a href="ShowCurrentLeader.php">Show current Leaders</a></li>

    </ul>

    <br> <br> <br>
    <div class="AddNewLader">
        <P>Add new Leader</P>
    </div>
    <form method="post" action="LeaderProcess.php">
        <div class="Enter">
            <label for="name">Leader Name<br></label>
            <input type="text" id="name" name="name"><br>
            <label for="name">Email<br></label>
            <input type="text" id="email" name="email">

        </div>

        <button type="submit" name="submit" value="save">Add</button>