<?php
header("Access-Control-Allow-Origin: *");
include "../configs/db.php";
if( isset( $_POST['my_file_upload'] ) && isset($_POST['title']) &&
   isset($_POST['description']) &&
   isset($_POST['year']) &&
   isset($_POST['genre']) &&
   isset($_POST['kinopoisk']) &&
   isset($_POST['imdb'])){

   	$title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $kinopoisk = $_POST['kinopoisk'];
    $imdb = $_POST['imdb']; 
	

	$uploaddir = '../admin/films/images/'; 



	$files      = $_FILES; 
	$done_files = array();

	
	foreach( $files as $file ){
		$file_name = $file['name'];
		$last = pathinfo($file_name , PATHINFO_EXTENSION);
		$finish = $uploaddir . generateRandomString(10) .".". $last;
		if( move_uploaded_file( $file['tmp_name'], "$finish"  ) ){
	
		}

	}

	$finish = "http://filmapp.loc/" . $finish;
 	$sql = "INSERT INTO `films` (`title` , `description` , `year` , `genre` , `kinopoisk` , `imdb` ,`photo` ) 
 						VALUES('$title' , '$description' , '$year', '$genre' , '$kinopoisk' , '$imdb' , '$finish' )";
						var_dump($sql);

	$result = $conn->query($sql);
	if($result){
		echo "movie add";
	}else{
		echo "no";
	}







	// foreach( $files as $file ){
	// 	$file_name = $file['name'];

	// 	if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
	// 		$done_files[] = realpath( "$uploaddir/$file_name" );
	// 	}
	// }

	// $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');

	// die( json_encode( $data ) );
}

// if(isset($_POST['title']) &&
//    isset($_POST['description']) &&
//    isset($_POST['year']) &&
//    isset($_POST['genre']) &&
//    isset($_POST['kinopoisk']) &&
//    isset($_POST['imdb'])){

//    	$title = $_POST['title'];
//     $description = $_POST['description'];
//     $year = $_POST['year'];
//     $genre = $_POST['genre'];
//     $kinopoisk = $_POST['kinopoisk'];
//     $imdb = $_POST['imdb'];
   
// 	if(!empty($_FILES['photo'])){

// 			 $uploaddir = "../admin/films/images/";
// 			 $last = pathinfo($_FILES['photo']['name'] , PATHINFO_EXTENSION);
// 			 var_dump($last);
// 			 $finish = $uploaddir . generateRandomString(10) .".". $last;
// 			 var_dump($finish);
// 			 var_dump($_FILES['photo']['tmp_name']);
// 			  if(move_uploaded_file($_FILES['photo']['tmp_name'], $finish)){

// 			 	 $uploadfile = "http://filmapp.loc/" . $finish;
// 			  }else{
// 			  	echo "no";
// 			  }
			 
// 			}else{
// 				$uploadfile = "";
// 			}

// 	$sql = "INSERT INTO `films` (`title` , `description` , `year` , `genre` , `kinopoisk` , `imdb` ,`photo` ) 
// 						VALUES('$title' , '$description' , '$year', '$genre' , '$kinopoisk' , '$imdb' , '$uploadfile' )";
// 						var_dump($sql);

// 	$result = $conn->query($sql);
// 	if($result){
// 		echo "movie add";
// 	}else{
// 		echo "no";
// 	}


// }


	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}



