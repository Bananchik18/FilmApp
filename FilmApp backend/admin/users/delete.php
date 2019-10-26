<?php
	include "../../configs/db.php";
	if($_GET['id']){
		
		$sql = "DELETE FROM `users` WHERE  id='" . $_GET['id'] . "' AND role='user' ";

		$conn->query($sql);
		header("Location:http://filmapp.com/admin/users/");
	}
?>
