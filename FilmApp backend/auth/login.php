<?php
include '../configs/db.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
  
  $draftUsername = $_POST['username'];
  $draftPassword = $_POST['password'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$draftUsername' AND `password` = '$draftPassword'";
  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    setcookie("user_id", $row['id'], time()+1360, '/');
    header("Location:/");

  } else {
    echo "<h2>Пользователь не найден</h2>";
  }

}

if(isset($_COOKIE['user_id'])) {
  // header("Location:/");
}

?>

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="login.php">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
