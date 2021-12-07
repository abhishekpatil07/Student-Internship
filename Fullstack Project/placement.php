<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
	$company = $_POST['cmpny'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PLACEMENT</title>
	<link rel="stylesheet" href="assets/choices.css">
</head>
<body>
	<form method="post" action="placement.php">
		<fieldset>
		<label for="cmpny">USN</label><br>
		<input type="text" name="cmpny" placeholder="Enter the USN"><br>
		<button type="submit" name="submit">GENERATE</button>
	</fieldset>
		
	</form>
	<br><br>
	<h1>PLACED COMPANY</h1>

	<table>
		<tr>
			<th>USN</th>
			<th>COMPANY_ID</th>
		</tr>
		<?php
		 $sql = "SELECT * FROM placements WHERE USN = ?";
		 $stmt = $conn->prepare($sql);
		 $stmt->bind_param("s",$company);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 while($row = $result->fetch_assoc()){
		 	?>
		 	<tr>
		 		<td><?php echo $row['USN'];?></td>
		 		<td><?php echo $row['CompanyId'];?></td>
		 	</tr>
		 <?php
		 }
         ?>
	</table>

</body>
</html>