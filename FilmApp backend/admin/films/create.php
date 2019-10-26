<?php
	include "../../configs/db.php";
	if(isset($_POST['title']) && 
	   isset($_POST['description']) && 
	   isset($_POST['year']) &&
	   isset($_POST['time']) &&
	   isset($_POST['genre']) &&
	   isset($_POST['kinopoisk']) &&
	   isset($_POST['imdb'])){

		$GetTitle = $_POST['title'];
		$GetDescription = $_POST['description'];
		$GetYear = $_POST['year'];
		$GetTime = $_POST['time'];
		$GetGenre = $_POST['genre'];
		$Getkinoposik = $_POST['kinopoisk'];
		$GetImdb = $_POST['imdb'];
		

		if(!empty($_FILES['photo'])){
		 
						 $uploaddir = "../admin/films/images/";
						 $last = pathinfo($_FILES['photo']['name'] , PATHINFO_EXTENSION);
						 var_dump($last);
						 $finish = $uploaddir . generateRandomString(10) .".". $last;
						 var_dump($finish);
						 var_dump($_FILES['photo']['tmp_name']);
						  if(move_uploaded_file($_FILES['photo']['tmp_name'], $finish)){
						 	 $uploadfile = "http://filmapp.loc/admin/films/" . $finish;
						  }else{
						  	echo "no";
						  }
						 
						}else{
							$uploadfile = "";
						}

				$sql = "INSERT INTO `films` (`title` , `description` , `year` , `genre` , `kinopoisk` , `imdb` ,`photo` ) 
									VALUES('$title' , '$description' , '$year', '$genre' , '$kinopoisk' , '$imdb' , '$uploadfile' )";
									var_dump($sql);

				$result = $conn->query($sql);
				if($result){
					echo "movie add";
				}else{
					echo "no";
				}

		
		$sql = "INSERT INTO `films` (`title`, `description`, `year`, `time`, `genre` ,`kinopoisk` , `imdb` , `photo`)
					 VALUES ('$GetTitle', '$GetDescription', '$GetYear', '$GetTime', '$GetGenre' ,'$Getkinoposik' , '$GetImdb' , '$uploadfile')";
					 var_dump($sql);
		$result = $conn->query($sql);
		if($result){
			  header("Location: http://filmapp.loc/admin/films/");
		}
	}

	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit film</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="create.php" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="title"/>
      <textarea placeholder="description" name="description"></textarea>
      <input type="text" name="year" placeholder="year"/>
      <input type="text" name="time" placeholder="time"/>
 	  <input type="text" name="genre" placeholder="genre"/>
 	  <input type="text" name="kinopoisk" placeholder="kinopoisk"/>
 	  <input type="text" name="imdb" placeholder="imdb"/>
 	  <input type="file" name="photo"/>
      <button>Create</button>
    </form>

  </div>
</div>
</body>
</html>
