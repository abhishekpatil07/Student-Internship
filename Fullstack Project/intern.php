<?php
include 'app/connect.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>INTERN</title>
	<link rel="stylesheet" href="assets/choices.css">
</head>
<body>
	<table>
		<tr>
			<th>INTERNSHIP_ID</th>
			<th>DESCRIPTION</th>
			<th>SKILLS</th>
		</tr>
		<?php
		     $sql = "SELECT * FROM intern";
		     $stmt = $conn->prepare($sql);
		     $stmt->execute();
		     $result = $stmt->get_result();
		     //get_result gives the result and stores
		     while($row = $result->fetch_assoc()){
		     	//mysqli statement class fetchs the result as an associative array
		?>
		<tr>
			<td><?php echo $row['Internship_Id'];?></td>
			<td><?php echo $row['Description'];?></td>
			<td><?php echo $row['Skills'];?></td>
        </tr>
        <?php
		}
		?>
	</table>

</body>
</html>