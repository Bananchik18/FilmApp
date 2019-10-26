<?php
	header("Content-type: text/html");
	header("Access-Control-Allow-Origin: *");



	include "../configs/db.php";

	$sql = "SELECT * FROM films";

if(!empty($_GET)) {
	
	if(isset($_GET['year_min'])&& 
 		isset($_GET['year_max'])&& 
		isset($_GET['kinopoisk'])&&
 		isset($_GET['imdb']) ) {
		
		$year_min = $_GET['year_min'];
		$year_max = $_GET['year_max'];
		$kinopoisk = $_GET['kinopoisk'];
		$imdb = $_GET['imdb'];

		$sql = $sql . " WHERE year >= '$year_min' AND 
 							year <= '$year_max' AND
 							 kinopoisk >= '$kinopoisk' AND
 							  imdb >= '$imdb'";
	}
}


	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$response = [];
		while($row = $result->fetch_assoc()){
			$item = [
				"id" => $row['id'],
				"title" => $row['title'],
				"description" => $row['description'],
				"year" => $row['year'],
				"time" => $row['time'],
				"genre" => $row['genre'],
				"kinopoisk" => $row['kinopoisk'],
				"imdb" => $row['imdb'],
				"photo" => $row['photo']
			];
			$response[] = $item;
		}
		echo json_encode(["films" => $response]);
	}else{
		echo json_encode(["status" => "not found"]);
	}

?>

