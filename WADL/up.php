<?php 
session_start();

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "conn.php";

	

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	
	$sql = "SELECT * FROM `task_type`";
	$all_categories = mysqli_query($conn,$sql);
	
	$sql2 = "SELECT * FROM `leader1`";
	$all_categories2 = mysqli_query($conn,$sql2);
	// To save the comment and the recipe that liked the visitor in the database
	
	
	@$a=$_POST['TypeTask'];
	@$b=$_POST['date'];  
	@$c=$_POST['language'];
	@$e=$_POST['tag'];
	
	
	
	$id2 = mysqli_real_escape_string($conn,$_POST['Category1']);
	$name = mysqli_real_escape_string($conn,$_POST['Product_name']);

	
	
	@$option=$_POST['opt'];
	
	

	$newfolder="$name";
//get the current working directory.
$curdir= getcwd();

//append the "upload" folder which already exits in ur working directory alog with the new directory name  "$newfolder"
$dir= $curdir."\posts"."/$newfolder";

//check if directory exits

if(is_dir($dir))
{
    echo " Directory exists";
}
else
{
    //create new directory recursively
    mkdir($dir,0777,true);
    echo " Directory Created";
}
	
	
	
	

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// يطبع الاكستنشن png ,txt
			$img_ex_lc = strtolower($img_ex);
            // $_SESSION['img_ex_lc '] = $img_ex_lc;
			// echo '<a href="view.php"> 2 </a>';
		

			$allowed_exs = array("jpg", "jpeg", "png","jfif","txt"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("$img_name", true).'.'.$img_ex_lc;
			
				  $img_upload_path = "$dir/" . $new_img_name;
				
				  
				    $repl= str_replace("\\","/", $img_upload_path);
				

				   $parts= explode("/", $repl);
				   $last = array_pop($parts);
					//
				   
				   $folders = array_slice($parts, -2);
				  $last = array_pop($folders);
					 $im=implode("/",$folders);
					echo $_SESSION['thisDir']=$im;
				 
				move_uploaded_file($tmp_name, $img_upload_path);



				// Insert into Database

			  

				$sql = 	"insert into task (type,deadline,language,name,`LeaderID`,`Dataset`,SpecificType) 
				values('$a','$b','$c','$name','$id2','$new_img_name','$option')";;
				mysqli_query($conn, $sql);
			 
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}

}else {
	header("Location: index.php");
}










$img_name = $_FILES['tag']['name'];
$img_size = $_FILES['tag']['size'];
$tmp_name = $_FILES['tag']['tmp_name'];
$error = $_FILES['tag']['error'];

if ($error === 0) {
	if ($img_size > 125000) {
		$em = "Sorry, your file is too large.";
		header("Location: index.php?error=$em");
	}else {
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// يطبع الاكستنشن png ,txt
		$img_ex_lc = strtolower($img_ex);
		// $_SESSION['img_ex_lc '] = $img_ex_lc;
		// echo '<a href="view.php"> 2 </a>';
	

		$allowed_exs = array("jpg", "jpeg", "png","jfif","txt"); 

		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_name = "$img_name";
		
	



			// Insert into Database

		  

			$sql2 = 	"insert into task (`Tagset`, type,deadline,language,name,`LeaderID`,`Dataset`,SpecificType) 
			values('$new_name','$a','$b','$c','$name','$id2','$new_img_name','$option')";;
			mysqli_query($conn, $sql2);
		 
		}}}