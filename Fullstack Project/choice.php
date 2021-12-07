<?php
session_start();
if(!isset($_SESSION['Name'])){	header("location:loggin.php");
}//if variable is not set
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHOICE</title>
	<link rel="stylesheet" href="assets/choice.css">
</head>
<body>
	<div class="nav">
	<ul>
		<li><a href="companies.php" >COMPANIES </a></li>
		<li><a href="interninfo.php" >INTERNSHIP DETAILS </a></li>
		<li><a href="intern.php" >SHORT LIST</a></li>
		<li><a href="placement.php" >PLACEMENT</a></li>
		<li><a href="logout1.php" >LOG OUT </a></li>
	</ul>
</div>

	<h1> WELCOME! </h1>
	<h2> <?php 
			echo $_SESSION['Name'];
		?>
	</h2>
	<P>Dear student, here you can find the details of companies offering internship and the necessary requirements for the same.</P>
	<p>Also check out the company you got placed in!</p>

</body>
</html>
