<?php

include('database.php');


  $method = $_GET['method'];
  $user_id = $_GET['user_id'];
  $book_id = $_GET['book_id'];
  
  if ($method == "Like") {
    
	$query = "INSERT INTO bookmarks (user_id, book_id)  VALUES (?, ?);";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $book_id );
    mysqli_stmt_execute($stmt);
	
  }
  else {

	$query = "DELETE FROM bookmarks WHERE user_id = ? AND book_id = ? ";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $book_id );
    mysqli_stmt_execute($stmt);
  }


?>
