<?php

include('database.php');


  $method = $_GET['method'];
  $user_id = $_GET['user_id'];
  $book_id = $_GET['book_id'];
  
  if ($method == "Borrowing") {
	
	$sql = "SELECT * FROM `accounts` WHERE id = ?";
	$stmtt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmtt, "s", $user_id );
    mysqli_stmt_execute($stmtt);
	
	$userselect = mysqli_stmt_get_result($stmtt);
	
	while($row = mysqli_fetch_assoc($userselect)) { 
	
	    $borrower_fn = $row['firstname'];
		$borrower_ln = $row['lastname'];
	
	}
	
    	  
	  
	$status = "pending";
    
	$query = "INSERT INTO book_requests (borrower_id, book_id, status, borrower_fn, borrower_ln )  VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $user_id, $book_id, $status, $borrower_fn, $borrower_ln );
    mysqli_stmt_execute($stmt);
	
  }
  else {
	$currentStatus = "pending";  
	

	$query = "DELETE FROM book_requests WHERE borrower_id = ? && book_id = ? && status = ? ";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss",  $user_id, $book_id, $currentStatus );
    mysqli_stmt_execute($stmt);
  }


?>
