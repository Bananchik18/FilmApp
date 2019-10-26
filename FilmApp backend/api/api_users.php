<?php 
header('Access-Control-Allow-Origin: *'); 
include "../configs/db.php";

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
if($result->num_rows > 0){
	$response = [];
	while($row = $result->fetch_assoc()){
		$item = [
		"id" => $row['id'],
		"username" => $row['username'],
		"password" => $row['password'],
		"email" => $row['email'],
		"role" => $row['role'],
		"created" => $row['created']
		];
		$response[] = $item;
	}
	echo json_encode(["users" => $response]);
}else{
	echo json_encode(["status" => "not found"]);
}
