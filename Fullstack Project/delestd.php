<?php
include 'app/connect.php';
if(isset($_POST['submit'])){

	$gyear = $_POST['gyear'];
	$sql = "DELETE FROM students WHERE Grad_Year = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i",$gyear);
	$result=$stmt->execute();

	if($result){
		?> <script> alert("Record Successfully Deleted from the Database."); </script>
	<?php
	}else{ ?>
		<script> alert("The delete Operation was Unsuccessful"); </script>
	<?php
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE DATA</title>
	<link rel="stylesheet" href="assets/changes.css">
</head>
<body>

<form method="post" action="delstd.php">
	<fieldset>
	<label for="gyear"> GRADUATION YEAR </label> 
	<input type="text" name="gyear" placeholder="Enter Students Graduation year">

	<button type="submit" name="submit">SUBMIT</button>
	</fieldset>
</form>
</body>
</html>