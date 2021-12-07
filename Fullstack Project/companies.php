<?php
include 'app/connect.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>COMPANY</title>
	<link rel="stylesheet" href="assets/choices.css">
</head>
<body>
	<table>
		<tr>
			<th>COMPANY_ID</th>
			<th>COMPANY_NAME</th>
			<th>EMAIL-ID</th>
			<th>PHONE_NO</th>
		</tr>
		<?php
		     $sql = "SELECT * FROM company";
		     $stmt = $conn->prepare($sql);
		     $stmt->execute();
		     $result = $stmt->get_result();
		     //get_result gives the result and stores
		     while($row = $result->fetch_assoc()){
		     	//mysqli statement class fetchs the result as an associative array
		?>
		<tr>
			<td><?php echo $row['CompanyId'];?></td>
			<td><?php echo $row['C_Name'];?></td>
			<td><?php echo $row['EmailId'];?></td>
			<td><?php echo $row['Phone'];?></td>
        </tr>
        <?php
		}
		?>
	</table>

</body>
</html>