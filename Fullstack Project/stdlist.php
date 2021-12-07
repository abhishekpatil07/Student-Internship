<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
	$DEPT = $_POST['DEPT'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT LIST</title>
	<link rel="stylesheet" href="assets/changes.css">
</head>
<body>
	<form method="post" action="stdlist.php">
		<fieldset>
		<label for="DEPT">DEPARTMENT</label><br>
		<input type="text" name="DEPT"><br>
		<button type="submit" name="submit">GENERATE</button>
	</fieldset>
		
	</form>
	<br><br>

	<table>
		<tr>
			<th>USN</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<?php
		 $sql = "SELECT * FROM students WHERE Department = ?";
		 $stmt = $conn->prepare($sql);
		 $stmt->bind_param("s",$DEPT);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 while($row = $result->fetch_assoc()){
		 	?>
		 	<tr>
		 		<td><?php echo $row['USN'];?></td>
		 		<td><?php echo $row['Name'];?></td>
		 		<td><?php echo $row['Email'];?></td>
		 	</tr>'
		 <?php
		 }
         ?>
	</table>

</body>
</html>