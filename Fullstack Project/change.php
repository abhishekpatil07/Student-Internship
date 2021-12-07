<?php
session_start();
if(!isset($_SESSION['Name'])){	header("location:admin.php");
}//if variable is not set
?>
<!DOCTYPE html>
<html>
<head>
	<title>SELECT ACTION</title>
	<link rel="stylesheet" href="assets/change.css">
<body>
	<div class="nav">
	<ul>
		<li><a href="add.php">UPDATE </a></li>
		<li><a href="delestd.php">DELETE </a></li>
		<li><a href="stdlist.php">STUDENT LIST</a></li>
		<li><a href="loggout.php">LOG OUT</a></li>
	</ul>
</div>

	<h1> WELCOME! </h1>
	<h2> <?php 
			echo $_SESSION['Name'];
		?>
	</h2>
	<p></p>
	
</body>
</html>