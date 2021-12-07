<?php
include 'app/connect.php';
session_start();

if(isset($_POST['submit'])){
	$ADMIN = $_POST['admid'];
	$pass = $_POST['Password'];
	

	$sql = "SELECT PersonId,Name,Password FROM admin WHERE PersonId=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i",$ADMIN);
	$stmt->execute();

	$stmt->bind_result($db_adminid,$db_name,$db_pass);
	if($stmt->fetch()){
		//echo $db_adminid;
	    //echo $db_pass;
	    $_SESSION['Name'] = $db_name;
	    //echo $_SESSION['Name'];
		//$pass_decode = password_verify($pass, $db_pass);
		if($pass == $db_pass){
			echo " Login successful";
			header("location:change.php");
		}else{
			echo "Incorrect password";
		}
	}else{
		echo "Incorrect ADMIN_ID";
	}
	

}

?>


<!DOCTYPE html>
<html>
<head>
<title>ADMIN LOGIN</title>
<link rel="stylesheet" href="assets/admin.css">
	

</head>
<body>

<form method="post" action="admin.php">
		<fieldset>
			<legend id="reg">ADMIN</legend>
			<br>
			<label for="admid"> ADMIN_ID </label> 
				<input type="text" name="admid" placeholder="Enter ADMIN_ID">

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
