<?php
	include "../../configs/db.php";

	if(isset($_GET['id'])){
		$sql = "SELECT * FROM users WHERE id='" . $_GET['id'] . "'";
		$result = $conn->query($sql);
		if($result->num_rows == 0){
			echo "User not found <a href='/admin/users/'>Users</a>";
		}
		$user = $result->fetch_assoc();
	}

	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
		$GetId = $_POST['id'];
		$GetUsername = $_POST['username'];	
		$GetPassword = $_POST['password'];
		$GetEmail = $_POST['email'];
		$GetRole = $_POST['role'];


			$sql = "UPDATE `users` SET `username`='$GetUsername', `password`='$GetPassword', `email`='$GetEmail', `role`='$GetRole' 
					WHERE id='$GetId'";
			$result = $conn->query($sql);
			if($result){
				echo "Update User";
				header("Location:http://filmapp.com/admin/users/");
				
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
    <form class="login-form" method="post" action="edit.php?id=<?php echo $user['id'];?>">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <input type="text" name="username" placeholder="username" value="<?php echo $user['username']; ?>"/>
      <input type="password" name="password" placeholder="password" value="<?php echo $user['password']; ?>"/>
      <input type="text" name="email" placeholder="email" value="<?php echo $user['email']; ?>"/>
      <select name="role">
      	<option value="user" <?php if($user['role'] == "user"){echo "selected";}?>>User</option>
      	<option value="admin"<?php if($user['role'] == "admin"){echo "selected";}?>>Admin</option>
      </select>
      <button>Create</button>
    </form>
  </div>
</div>
</body>
</html>
