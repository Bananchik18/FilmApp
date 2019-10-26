<?php
// connect db
include '../configs/db.php';

// если был отправлен пост запрос с формы регистрации 
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {


  $draftUsername = $_POST['username'];
  $draftPassword = $_POST['password'];
  $draftEmail = $_POST['email'];

  $sql = "INSERT INTO `users` (`username`, `email`, `password`, `role`) 
            VALUES ('$draftUsername', '$draftEmail', '$draftPassword', 'user')";

  if($conn->query($sql)) {

    $sql = "SELECT * FROM users WHERE username='$draftUsername' AND password='$draftPassword'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    setcookie("user_id", $row['id'], time()+1360, '/');
    header("Location:/");
  } else {
    echo "<h2>ERROR</h2>";
  }

}

if(isset($_COOKIE['user_id'])) {
  header("Location:/");
}
?>

<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="login-page">
  <div class="form">
    <form class="register-form" action="register.php" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="email" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>

</body>
</html>
