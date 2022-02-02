<?php

include('database.php');



  $userid = $_GET['userid'];
  $file_id = $_GET['file_id'];
  

    $sql = "SELECT * FROM books WHERE id=$file_id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
	if($file['downloadablefile']!=''){
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
	}}else{
		 header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
	}

?>