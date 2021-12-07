<?php
include 'app/connect.php';//connecting the page to database page
if(isset($_POST['submit'])){
	$CID = $_POST['cid'];
	$CName = $_POST['name'];
	$Email = $_POST['email'];
	$Phone = $_POST['phno'];


	$cid_check = "SELECT * FROM company WHERE CompanyId = ?";
	$cid_stmt = $conn->prepare($cid_check);
	$cid_stmt->bind_param("i",$CID);
	$cid_stmt->execute();

	$cid_stmt->store_result();
	if($cid_stmt->num_rows()>0){
		?>
		<script>alert("Company already registered!");</script>
		<?php
	}else{



//template for sql query
	$sql = "INSERT INTO company(CompanyId,C_Name,EmailId,Phone) VALUES(?,?,?,?)";

//preparing the statement
	if($stmt = $conn->prepare($sql)){
	$stmt->bind_param("issi",$CID,$CName,$Email,$Phone);
	$result = $stmt->execute();
  
 }else{
	$error = $conn->errno." ".$conn->error;
	echo $error;
 }

	if($result){
		header("location:companies.php");
	}

 }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" href="assets/changes.css">
</head>
<body>
	<form action="add.php" method="post">
		<fieldset>
			<legend> UPDATE </legend>
			<label for='cid'>COMPANY_ID</label><br>
			<input type='number' name='cid' placeholder="Enter COMPANY_ID"><br><br> 

			<label for="name">COMPANY NAME </label><br>
			<input type="text" name="name" id="name" placeholder="Enter company name"><br><br>

			<label for="email"> EMAIL-ID </label><br>
			<input type="Email" name="email" id='email'
			placeholder="Enter company Mail-id"><br><br>

			<label for="phno"> PHONE NUMBER  </label><br>
			<input type="tel" name="phno" placeholder="Enter company phone number"  maxlength="10"><br><br>

			<button type="submit" name="submit"><b> SUBMIT </b> </button>
			<br><br>
		</fieldset>
	</form>

</body>
</html>