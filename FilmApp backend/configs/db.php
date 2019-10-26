<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// $sql = "SELECT * FROM users";
// $result = $conn->query($sql);
// if($result->num_rows > 0){
// 	while ($row = $result->fetch_assoc()) {
// 		echo "id:".$row['id']."<br>";
// 	}
// }

