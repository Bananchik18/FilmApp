<?php
	include "../../configs/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<a href="create.php">Create User</a>
	<table>
		<tr>
			<th>#</th>
			<th>username</th>
			<th>email</th>
			<th>role</th>
			<th>created</th>
			<th>Options</th>
		</tr>
	<?php
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['role']; ?></td>
						<td><?php echo $row['created']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['id'];?>">Remove</a>
						</td>

					</tr>
				<?php
			}
		}
	?>
</table>
</body>
</html>
