<?php
	include "../../configs/db.php";
	if($_GET['id']){
		$sql = "DELETE FROM films WHERE id='" . $_GET['id'] . "'";
		$result = $conn->query($sql);
		header("Location:http://filmapp.loc/admin/films/");
	}

?>
