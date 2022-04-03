<?php
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wadl';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

@$nlp=$_POST['nl'];
@$option=$_POST['sen'];





if(@$_POST['submit'])  
{  
echo $s="insert into task (type,name) values('$nlp','$option')";  
echo '<script type="text/javascript"> alert("Data Inserted")</script>';
mysqli_query($con,$s);  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <script>
            function random_function()
            {
                var a=document.getElementById("input").value;
                if(a==="NLP")
                {
                    var arr=["sentence","word"];
                }
                else if(a==="IMG")
                {
                    var arr=["Washington","Texas","New York"];
                }
              
                var string="";
              
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                }
                document.getElementById("output").innerHTML=string;
            }
        </script>
    </head>
    <body>

    <form method="POST" action="" >
        <select name="nl" id="input" onchange="random_function()">
            <option>select option</option>
            <option>NLP</option>
            <option>IMG</option>
        </select>
        <div>
           <select name="sen" id="output" onchange="random_function1()"> </select>
        </div> <br>
        <input type="submit" name="submit" value="send"> 
        <!-- <button type="submit" name="submit" value="save">Add</button> -->


</form>
    </body>
</html>