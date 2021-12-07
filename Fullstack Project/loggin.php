<!--WEBDAY-15,16-->
<?php
include 'app/connect.php';
session_start();

if(isset($_POST['submit'])){
	$USN = $_POST['USN'];
	$pass = $_POST['Password'];
	

	$sql = "SELECT USN,Name,Password FROM students WHERE USN=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$USN);
	$stmt->execute();

	$stmt->bind_result($db_usn,$db_name,$db_pass);
	if($stmt->fetch()){
		//echo $db_usn;
	    //echo $db_pass;
	    $_SESSION['Name'] = $db_name;
	    //echo $_SESSION['Name'];
		$pass_decode = password_verify($pass, $db_pass);
		if($pass_decode){
			echo " Login successful";
			header("location:choice.php");
		}else{
			echo "Incorrect password";
		}
	}else{
		echo "Incorrect USN";
	}
	

}

?>


<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>

	<link rel="stylesheet" href="assets/loggin.css">

</head>
<body>

<form method="post" action="loggin.php">
		<fieldset>
			<legend id="reg">LOGIN</legend>
			<br>
			<label for="USN"> USN </label> 
				<input type="text" name="USN" placeholder="Enter USN">

			<br>
			<label for="Password"> PASSWORD </label> 	
			<input type="password" name="Password" placeholder="Enter Password" ><br><br>
			
			
			<button type="submit" name="submit"><b> SUBMIT </b> </button>
			<br><br>
			<a href="Register.php"> Don't Have an Account? </a><br>
			
			</fieldset>
	</form>
</body>
</html>