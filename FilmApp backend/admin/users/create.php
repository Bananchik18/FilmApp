<?php
	include "../../configs/db.php";
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
		$GetUsername = $_POST['username'];	
		$GetPassword = $_POST['password'];
		$GetEmail = $_POST['email'];
		$GetRole = $_POST['role'];

		$sql = "SELECT * FROM users WHERE username='$GetUsername'";
  		$result = $conn->query($sql);

  		if($result->num_rows > 0) {
			echo "Such user already exists";
		}else{
			$sql = "INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES ('$GetUsername', '$GetPassword', '$GetEmail', '$GetRole')";
			$result = $conn->query($sql);
			if($result){
				header("Location:http://filmapp.com/admin/users/");
			}
		}



	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="create.php">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="email" placeholder="email"/>
      <select name="role">
      	<option value="user">User</option>
      	<option value="admin">Admin</option>
      </select>
      <button>Create</button>
    </form>
  </div>
</div>
</body>
</html>
