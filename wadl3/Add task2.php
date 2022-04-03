<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="Add task.css">
  <script type="text/javascript" src="add-task.js"></script>

  <title>add task</title>
</head>

<body>


  <ul>
    <li><a href="Admin.php">Home</a></li>
    <li><a href="Add task.php">Add task</a></li>
    <li><a href="AddNewleader.php">Add a new leader</a></li>
    <li><a href="AssigningTasks.php">Assigning tasks</a></li>
    <li><a href="ShowCurrentLeader.php">Show current Leaders</a></li>

  </ul>

  <div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>




  <form method="POST" action="TaskProcess.php">
    <br><br><br><br>
    <div class="AddTask"> Add task </div>
    <div class="PTypeOfText">Type of task</div>


    <div class="TypeOFText">
      <br> <br>
      <select name="TypeTask" id="ddl" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">

        <option value=""></option>
        <option value="NLP">NLP</option>
        <option value="image">img</option>
      </select>
      
      <select id="ddl2">
      </select>
    </div>



    <div class="PLanguage">Language</div>


    <div class="Language">
      <select name="language">
        <option value=""></option>
        <option value="Arabic">Arabic</option>
        <option value="English">English</option>
      </select>
    </div>

    <div class="PDate">Deadline</div>

    <div class="Date">
      <input type="date" name="date" id="dateofbirth">
    </div>

    <div class="Pfile"> Dataset</div>

    <div class="file">
      <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">

    </div>


    <div class="Pfile2">TagSet</div>

    <div class="file2">
      <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">

    </div>





    <br><br>

    <button type="submit" name="submit" value="save">Add</button>


  </form>









</body>

</html>