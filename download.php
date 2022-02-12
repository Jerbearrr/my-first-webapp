<?php

include('database.php');

date_default_timezone_set('Asia/Shanghai'); 

  $userid = $_GET['userid'];
  $file_id = $_GET['file_id'];
  $download_date = date("Y-m-d H:i:s");
  $download_due = date('Y-m-d H:i:s', strtotime("+7 days"));
  

    $sql = "SELECT * FROM books WHERE id=$file_id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
	if($file['downloadablefile']!=''){
		
	$query = "INSERT INTO download_record (user_id, book_id, download_date, download_due)  VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iiss", $userid, $file_id, $download_date, $download_due );
    mysqli_stmt_execute($stmt);
		
		
		
    $filepath = 'uploads/downloadablefiles/' . $file['downloadablefile'];

    if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    exit;
    }else{
echo "File does not exist.";
	}
	}else{
		echo "File does not exist.";
		
	}

   
?>