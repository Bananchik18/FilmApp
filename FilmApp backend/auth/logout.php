<?php 
if(isset($_COOKIE['user_id'])) {
	setcookie("user_id", "", time()-100 , '/');
}

header("Location:/");
?>
