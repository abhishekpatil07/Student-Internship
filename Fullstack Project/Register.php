 <?php
include 'app/connect.php';//connecting the page to database page
if(isset($_POST['submit'])){
	$USN = $_POST['usn'];
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Pass = $_POST['password'];
	$Confp = $_POST['confpassword'];
	$Phone = $_POST['phno'];
	$Dept = $_POST['Department'];
	$Gradyear = $_POST['gyear'];

	$pwd = password_hash($Pass, PASSWORD_DEFAULT);
	//inbuit hash password

	$usn_check = "SELECT * FROM students WHERE USN = ?";
	$usn_stmt = $conn->prepare($usn_check);
	$usn_stmt->bind_param("s",$USN);
	$usn_stmt->execute();

	$usn_stmt->store_result();
	if($usn_stmt->num_rows()>0){
		?>
		<script>alert("User already registered!");</script>
		<!--CHecks if the row or usn is repeated-->
		<?php
	}else{



//template for sql query
	$sql = "INSERT INTO students(USN,Name,Email,Password,Phone_no,Department,Grad_Year) VALUES(?,?,?,?,?,?,?)";

//preparing the statement
	if($stmt = $conn->prepare($sql)){
	$stmt->bind_param("ssssisi",$USN,$Name,$Email,$pwd,$Phone,$Dept,$Gradyear);
	$result = $stmt->execute();
  
 }else{
	$error = $conn->errno." ".$conn->error;
	echo $error;
 }

	if($result){
		header("location:loggin.php");
	}

 }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>

	<script type="text/javascript">
		function validate(){
			var pwd1 = document.getElementById("pwd1");
			var pwd2 = document.getElementById("pwd2");

			if(pwd1.value.length < 6){
				alert("Password must have more than Six characters.");
				return false;
			}
			else{
				if(pwd1.value != pwd2.value){
					alert("Passwords do not match. Re-Enter it.");
					return false;
				}
				else{
					return true;
				}
			}
		}

	</script>


	<link rel="stylesheet" href="assets/Register.css">
</head>
<h1>Please fill this form to register</h1>
<body>
	<form action="Register.php" method="post">
		<fieldset>
			<legend> REGISTER </legend>
			<label for='usn'>USN</label><br>
			<input type='text' name='usn' id='usn' maxlength="10" minlength="10" placeholder="Enter your USN"><br><br> 

			<label for="name"> NAME </label><br>
			<input type="text" name="name" id="name" placeholder="Enter your name"><br><br>

			<label for="email"> EMAIL-ID </label><br>
			<input type="Email" name="email" id='email'
			placeholder="Enter your Mail-id"><br><br>

			<label for="password"> PASSWORD </label><br>
			<input type="PASSWORD" name="password" id="pwd1" placeholder="Enter your password"><br><br>

			<label for="confpassword"> CONFIRM PASSWORD </label><br>
			<input type="PASSWORD" name="confpassword" id="pwd2" placeholder="Enter your password to confirm"><br><br>

			<label for="phno"> PHONE NUMBER  </label><br>
			<input type="tel" name="phno" id="phno"
			placeholder="Enter your phone number"  maxlength="10"><br><br>

			<label for="dept"> DEPARTMENT </label><br>
			<select name="Department" id="dept">
			<option>Select...</option>
			<option value="CSE"> Computer Science</option>
			<option value="ECE"> Electronics and communications</option>
			<option value="MECH"> Mechanical</option>
			<option value="CIV"> Civil</option>
			<option value="IS"> Information Science</option>
		</select><br><br>

		<label for="gyear"> GRADUATING YEAR </label><br>
		<input type="number" name="gyear" id="gyear"  MIN="2021" max=2040 step=1 value="2021"><br><br>

		<button type="submit" name="submit"><b> SUBMIT </b> </button>
			<br><br>

		<a href="loggin.php" style="text-decoration: none; color:black;">
		Already have an account?<br>or<br></a>
		
		<a href="admin.php" style="text-decoration: none; color: black;">Are you an Admin?</a><br>

		</fieldset>
	</form>

</body>
</html>


 