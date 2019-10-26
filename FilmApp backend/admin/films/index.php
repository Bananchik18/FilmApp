<?php
	include "../../configs/db.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<a href="create.php">Create Film</a>
		<tr>
			<th>id</th>
			<th>title</th>
			<th>description</th>
			<th>year</th>
			<th>time</th>
			<th>genre</th>
			<th>photo</th>
			<th>kinopoisk</th>
			<th>imdb</th>
		</tr>
		<?php
			$sql = "SELECT * FROM films";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['year']; ?></td>
							<td><?php echo $row['time']; ?></td>
							<td><?php echo $row['genre']; ?></td>
							<td><?php echo $row['kinopoisk']; ?></td>
							<td><?php echo $row['imdb']; ?></td>
							<td><?php echo $row['photo']; ?></td>
							<td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
							<td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
					<?php
				}
			}
		?>
	</table>

</body>
</html>
