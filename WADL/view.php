<?php include "conn.php"; ?>

<?php
session_start();
$comeN = $_SESSION['getName'];
$comeP = $_SESSION['getPass'];
$sql = mysqli_query($conn, "SELECT `AnnotatorID` FROM `Annotator` WHERE `UserName` = '$comeN' and `password`='$comeP'");
$row = mysqli_fetch_assoc($sql);
$annotatoridd = $row['AnnotatorID'];


//Task from assignRawData
$query = "SELECT `TaskID` FROM `assignrawdata` WHERE `AnnotatorID` = '$annotatoridd'";

$res1 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($res1)) {
	$taskidd =  $row['TaskID'];




	$sql = "SELECT * FROM `Task` WHERE `TaskID` = '$taskidd'";
	$res = mysqli_query($conn,  $sql);

	if (mysqli_num_rows($res) > 0) {
		while ($images = mysqli_fetch_assoc($res)) {
			$PATH = $images['Dataset'];

			$tags = $images['Tagset'];
			$data = $images['Dataset'];
			$SpecificType = $images['SpecificType'];
			$Language = $images['Language'];
			$name = $images['Name'];

			$img_ex_lc = strtolower($PATH); // get all path 
			$ext = pathinfo($img_ex_lc, PATHINFO_EXTENSION); // print extantion of path from databas

			if ($ext == "txt") { ?>



				<!DOCTYPE html>
				<html lang="en">

				<head>

					<meta charset="utf-8">


					<style>
						#button1-2 {
							margin: 0 auto;
							width: 656px;
							text-align: center;
							position: absolute;
							top: 70%;
							left: 50%;
						}


						.first {
							margin-top: 10px;
							width: 20%;
							background-color: #333;
							color: #ffffff;
							padding: 12px 0;
							font-size: 18px;
							font-weight: 400;
							border-radius: 5px;
							cursor: pointer;


						}



						#logo {
							position: absolute;
							top: -1%;
							left: 2%;
							z-index: 100;


						}

						/* القوائم  */

						#navBar1 {
							text-align: right;
							background: #eff3f5;
							background-color: #333;



						}

						#navBar1 li a:hover {
							background-color: rgb(0, 13, 134);
						}

						#navBar1 li a {
							display: block;
							color: white;
							text-align: right;
							padding: 14px 16px;
							text-decoration: none;
						}

						/* القوائم  */


						.myDiv {
							padding: 1rem;
							position: relative;
							margin: 180px;
							border: 1px outset black;
							text-align: center;
							background: #d8dcdf;

						}

						.myDiv h2 {
							/* اسم المهمة مثل task1  */
							background: rgba(0, 13, 134, 0.904);
							color: white;
							margin: -1rem -1rem 1rem -1rem;
							padding: 1rem;
						}

						div a {
							color: black;
							text-decoration: none;
							font-size: 20px;
							padding: 2px;
							display: inline-block;

						}

						li.active,
						a.active {
							background-color: #f90;
						}

						ul {
							display: inline;
							margin: 0;
							padding: 0;
						}

						ul li {
							display: inline-block;
						}

						ul li:hover {
							background: #c5c5c5;

							border-radius: 9px;

						}

						ul li:hover ul {
							display: block;


						}

						ul li ul {
							position: absolute;
							width: 90px;
							display: none;
						}

						ul li ul li {
							border-radius: 1px;
							background: rgb(255, 255, 255);
							display: block;
						}

						ul li ul li a {
							display: block !important;
						}

						ul li ul li:hover {
							background: #f90;
							;
						}

						.select {
							position: relative;
							display: inline-block;
							margin-bottom: 15px;
							width: 40%;
						}

						.select select {
							font-family: 'Arial';
							display: inline-block;
							width: 100%;
							cursor: pointer;
							padding: 10px 18px;
							outline: 0;
							border: 0px solid #000000;
							border-radius: 9px;
							background: #ffffff;
							color: #1642ad;
							appearance: none;
							-webkit-appearance: none;
							-moz-appearance: none;
						}

						.select select::-ms-expand {
							display: none;
						}

						.select select:hover,
						.select select:focus {
							color: #2a45ab;
							background: #ffffff;
						}

						.select select:disabled {
							opacity: 0.4;
							pointer-events: none;
						}
					</style>
				</head>






				<body>

					<div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>

					<div id="navBar1">
						<ul>
							<li><a href="annotator.php">Home</a></li>
							<li><a href="#">Annotation</a></li>
							<li><a href="#">Score</a></li>
							<li><a href="#">Show draft</a></li>
						</ul>
					</div>


					<div class="myDiv">
						<h2> <?php echo $name; ?> </h2>


						<?php


						$lines = array();
						//$thisdir= $_SESSION['thisDir']."/". $name;
						$fp = fopen("posts/$name/$data", 'r');
						while (!feof($fp)) {
							$line = fgets($fp);


							//process line however you like
							$line = trim($line);
							$ex = explode("\n", $line);
							foreach ($ex as $e) {
								$arrx =  stristr(htmlspecialchars($line), " ");
							}

							//add to array
							$lines[] = $arrx;
						}

						?>
						<?php $length = count($lines); ?>
						<?php for ($i = 0; $i < $length; $i++) {
							$_SESSION['getPost'] = $lines[$i];

						?>
							<ul>
								<li>
									<a href="#"><?php print_r($_SESSION['getPost']); ?></a>

									<ul>


										<?php $path = "$tags";
										$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
										$nrl = count($lines); ?>
										<form method="post" id="form1" name="form1" action="savesxml.php">

											<select class="form-control" id="AnnTag" name="AnnTag">

												<li> <a href="#">
														<option value="choose"> </option>;
														<?php for ($i = 0; $i < $nrl; $i++) { ?>

															<option name="select" value="<?php echo urlencode($lines[$i]) ?>"> <?php echo $lines[$i] ?> </option>;

														<?php  } ?>

											</select> </a>
								</li>















							</ul>
							</li>
							</ul>




						<?php
						};



						echo "<br>" . "<br>" . "<br>" . "<br>";
						?>

						<!-- <input type="submit" id="loginbtn" name="submit"/> -->




					</div>

					</div>


					<div id="button1-2">
						<button class="first" type="submit" name="submit" value="save">Submit</button>
						<button class="first" type="submit" name="save" value="save">Save draft</button>
						</form>
					</div>


				</body>

				</html>


			<?php } //word






			else { ?>



				<!DOCTYPE html>
				<html lang="en">

				<head>

					<meta charset="utf-8">


					<style>
						#button1-2 {
							margin: 0 auto;
							width: 656px;
							text-align: center;
							position: absolute;
							top: 70%;
							left: 50%;
						}


						.first {
							margin-top: 10px;
							width: 20%;
							background-color: #333;
							color: #ffffff;
							padding: 12px 0;
							font-size: 18px;
							font-weight: 400;
							border-radius: 5px;
							cursor: pointer;


						}



						#logo {
							position: absolute;
							top: -1%;
							left: 2%;
							z-index: 100;


						}

						/* القوائم  */

						#navBar1 {
							text-align: right;
							background: #eff3f5;
							background-color: #333;



						}

						#navBar1 li a:hover {
							background-color: rgb(0, 13, 134);
						}

						#navBar1 li a {
							display: block;
							color: white;
							text-align: right;
							padding: 14px 16px;
							text-decoration: none;
						}

						/* القوائم  */


						.myDiv {
							padding: 1rem;
							position: relative;
							margin: 180px;
							border: 1px outset black;
							text-align: center;
							background: #d8dcdf;

						}

						.myDiv h2 {
							/* اسم المهمة مثل task1  */
							background: rgba(0, 13, 134, 0.904);
							color: white;
							margin: -1rem -1rem 1rem -1rem;
							padding: 1rem;
						}

						div a {
							color: black;
							text-decoration: none;
							font-size: 20px;
							padding: 2px;
							display: inline-block;

						}

						li.active,
						a.active {
							background-color: #f90;
						}

						ul {
							display: inline;
							margin: 0;
							padding: 0;
						}

						ul li {
							display: inline-block;
						}

						ul li:hover {
							background: #c5c5c5;

							border-radius: 9px;

						}

						ul li:hover ul {
							display: block;


						}

						ul li ul {
							position: absolute;
							width: 90px;
							display: none;
						}

						ul li ul li {
							border-radius: 1px;
							background: rgb(255, 255, 255);
							display: block;
						}

						ul li ul li a {
							display: block !important;
						}

						ul li ul li:hover {
							background: #f90;
							;
						}

						;
					</style>
				</head>






				<body>

					<div id="logo"><img src="logoWhite.png" width="80" height="80"> </div>

					<div id="navBar1">
						<ul>
							<li><a href="Annotator.php">Home</a></li>
							<li><a href="#">Annotation</a></li>
							<li><a href="#">Score</a></li>
							<li><a href="#">Show draft</a></li>
						</ul>
					</div>


					<div class="myDiv">
						<h2> <?php echo $name; ?> </h2>



						<div id="page-wrap">
							<h1>what do you see?</h1>

							<?php //$x= $_SESSION['thisDir']."/". $name
							?>

							<img src="posts/<?php echo $name ?>/<?= $images['Dataset'] ?>" width="350px" height="350px">


							<ul>


								<?php $path = "$tags";
								$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
								$nrl = count($lines); ?>
								<form method="post" id="form1" name="form1" action="savesxml2.php">
									<div class="select">
										<select class="form-control" id="AnnTag" name="AnnTag">

											<li> <a href="#">
													<option value="choose"> </option>;
													<?php for ($i = 0; $i < $nrl; $i++) { ?>

														<option name="select" value="<?php echo urlencode($lines[$i]) ?>"> <?php echo $lines[$i] ?> </option>;

													<?php  } ?>

										</select> </a></li>
									</div>







							</ul>







						</div>

					</div>


					<div id="button1-2">
						<button class="first" type="submit" name="submit" value="save">Submit</button>
						<button class="first" type="submit" name="save" value="save">Save draft</button>
						</form>
					</div>


				</body>

				</html>


<?php }
		}
	}
} ?>