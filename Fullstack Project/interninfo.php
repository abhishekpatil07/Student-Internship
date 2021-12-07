<?php
include 'app/connect.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>INTERNSHIP DETAILS</title>
	
		<link rel="stylesheet" href="assets/choices.css">
</head>
<body>
	<table>
		<tr>
			<th>COMPANY_ID</th>
			<th>COMPANY_NAME</th>
			<th>EMAIL-ID</th>
			<th>PHONE_NO</th>
			<th>START_DATE</th>
			<th>END_DATE</th>
			<th>SKILLS</th>
		</tr>
		<?php
		     $sql = "SELECT * FROM internship";
		     $stmt = $conn->prepare($sql);
		     $stmt->execute();
		     $result = $stmt->get_result();
		     //get_result gives the result and stores
		     while($row = $result->fetch_assoc()){
		     	//mysqli statement class fetchs the result as an associative array
		?>
		<tr>
			<td><?php echo $row['Internship_Id'];?></td>
			<td><?php echo $row['CompanyId'];?></td>
			<td><?php echo $row['Description'];?></td>
			<td><?php echo $row['Location'];?></td>
			<td><?php echo $row['Start_date'];?></td>
			<td><?php echo $row['End_date'];?></td>
			<td><?php echo $row['Skills'];?></td>
        </tr>
        <?php
		}
		?>
	</table>

</body>
</html>