<?php
	include "../../configs/db.php";

	if($_GET['id']){
		$sql = "SELECT * FROM films WHERE id='" . $_GET['id'] . "'";
		$result = $conn->query($sql);
		$film = $result->fetch_assoc();
	}
	if(isset($_POST['title']) && 
	   isset($_POST['description']) && 
	   isset($_POST['year']) && 
	   isset($_POST['time']) && 
	   isset($_POST['genre']) &&
	   isset($_POST['kinopoisk']) &&
	   isset($_POST['imdb'])){

		$GetId = $_GET['id'];
		$GetTitle = $_POST['title'];
		$GetDescription = $_POST['description'];
		$GetYear = $_POST['year'];
		$GetTime = $_POST['time'];
		$GetGenre = $_POST['genre'];
		$Getkinoposik = $_POST['kinopoisk'];
		$GetImdb = $_POST['imdb'];


		if(!empty($_FILES)){
					 $uploaddir = "images/";
					 // $uploadfile = $uploaddir . $_FILES['photo']['name'];
					 var_dump($_FILES['photo']['name']);
					 $last = pathinfo($_FILES['photo']['name'] , PATHINFO_EXTENSION);
					 var_dump($last);
					 $finish = $uploaddir . generateRandomString(10) .".". $last;

					 if(move_uploaded_file($_FILES['photo']['tmp_name'], $finish)){
					 	$uploadfile = "http://filmapp.loc/admin/films/" . $finish;
					 }else{
					 	echo "no";
					 }
					 
				}else{
					$uploadfile = "";
				}

		$sql = "UPDATE `films` SET `title` = '$GetTitle' , `description` = '$GetDescription' , `year` = '$GetYear', `time` = '$GetTime', `genre` = '$GetGenre', `kinopoisk` = '$Getkinoposik' , `imdb` = '$GetImdb' ,  `photo` = '$uploadfile' WHERE id='$GetId'";
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
    <form class="login-form" method="post" action="edit.php?id=<?php echo $film['id']; ?>" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="title" value="<?php echo $film['title']; ?>" />
      <textarea placeholder="description" name="description"><?php echo $film['description'];?></textarea>
      <input type="text" name="year" placeholder="year" value="<?php echo $film['year'];?>" />
      <input type="text" name="time" placeholder="time" value="<?php echo $film['time'];?>"/>
 	  <input type="text" name="genre" placeholder="genre" value="<?php echo $film['genre'];?>"/>
   	  <input type="text" name="kinopoisk" placeholder="kinopoisk" value="<?php echo $film['kinopoisk'];?>"/>
 	  <input type="text" name="imdb" placeholder="imdb" value="<?php echo $film['imdb'];?>"/>
 	  <input type="file" name=photo value="<?php echo $film['photo']; ?>">
      <button>Create</button>
    </form>
  </div>
</div>
</body>
</html>
