<?php 
include 'configs/db.php';
?>
<html>
<head>
	<title>Main</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 
if(isset($_COOKIE['user_id'])) {
	$user_id = $_COOKIE['user_id'];
	$sql = "SELECT * FROM users WHERE id='$user_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	echo "<h2>Hello, " . $row['username'] . "</h2>";
	if($row['role'] == 'admin') {
		echo "<a href='/admin'>Admin panel</a> | ";
	}
	echo "<a href='/auth/logout.php'>Logout</a>";
} else {
	echo "<a href='/auth/login.php'>Login</a> | <a href='/auth/register.php'>Register</a>";
}
?>

</body>
</html>
