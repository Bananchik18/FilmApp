<?php
	include "../configs/db.php";
	if(!isset($_COOKIE['user_id'])){
		header("Location:/");
	}
	$user_id = $_COOKIE['user_id'];
	$sql = "SELECT * FROM users WHERE id = '$user_id'";
	$result = $conn->query($sql);
	//var_dump($result);

	if($result->num_rows > 0){
		 $row = $result->fetch_assoc();
		 if($row['role'] != "admin"){
			header("Location:/");
		 }

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<h2>Welcome , Admin :)</h2>
	<a href="/admin/users/">Users</a>
	<a href="/admin/films">Films</a>
</body>
</html>
