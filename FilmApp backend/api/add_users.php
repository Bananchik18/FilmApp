<?php 
header("Access-Control-Allow-Origin: *");
	include "../configs/db.php";
	if(isset($_POST['login']) &&
		isset($_POST['email']) &&
		isset($_POST['password'])){

		$GetLogin = $_POST['login'];
		$GetEmail = $_POST['email'];
		$GetPssword = $_POST['password'];

		$sql = "INSERT INTO `users`(`username` , `password` ,`email` , `role`) VALUES('$GetLogin' , '$GetPssword' , '$GetEmail' , 'user')";
		var_dump($sql);

		$result = $conn->query($sql);
		var_dump($result);
		if($result){
			echo "add userss";
		}else{
			echo "no";
		}
	}


