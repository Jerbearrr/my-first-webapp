<?php
include("../database.php");

if (isset($_POST)) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];
	$imageverifier = $_POST['imageverifier'];
	$downloadablefile = downloadablefile();
	$image = uploadFile();
	


   

     $query1 =  "SELECT * FROM books where id = ? ;";
	 $stmtr = mysqli_prepare($conn, $query1);
	 mysqli_stmt_bind_param($stmtr, 's', $id);
	 mysqli_stmt_execute($stmtr);
	 $bookselect = mysqli_stmt_get_result($stmtr);
	 while($row = mysqli_fetch_assoc($bookselect)) { 
	     if($image == ''){
			 
			$image = $row["image"];
			 
			 
		 }else if($image != ''){
			  $image = $image;
		 }else if($image == $row["image"]){
			 $image = $row["image"];
		 }
	 }
	 
	 $query2 =  "SELECT * FROM books where id = ? ;";
	 $stmtrt = mysqli_prepare($conn, $query2);
	 mysqli_stmt_bind_param($stmtrt, 's', $id);
	 mysqli_stmt_execute($stmtrt);
	 $bookselect1 = mysqli_stmt_get_result($stmtrt);
	 while($row1 = mysqli_fetch_assoc($bookselect1)) { 
	     if($downloadablefile == ''){
			 
			$downloadablefile = $row1["downloadablefile"];
			 
			 
		 }else if($downloadablefile != ''){
			  $downloadablefile = $downloadablefile;
		 }else if($downloadablefile == $row1["downloadablefile"]){
			 $downloadablefile = $row1["downloadablefile"];
		 }
	 }
	
	
}
$query = "UPDATE books SET title = ?, author = ?, isbn = ?, publisher = ?, description = ?, image = ?, downloadablefile = ? WHERE id = ? ;"; 
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'sssssssi', $title, $author, $isbn, $publisher, $description, $image, $downloadablefile, $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_stmt_errno($stmt)) {
    header("Location: ../ManageBookspageEdit.php?success=false");
    exit();
} else {
    header("Location: ../ManageBookspageEdit.php?success=true");
    exit();
}

function downloadablefile() {
	

	$filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/downloadablefiles/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if ($size != 0){
    if (!in_array($extension, ['pdf', 'docx'])) {
        header('Location: ../ManageBookspageEdit.php?success=false&error=InvalidFile');
		exit();
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
       header('Location: ../ManageBookspageEdit.php?success=false&error=notFile');
	   exit();
    } else {
		
		if (move_uploaded_file($file, $destination)) {
        return htmlspecialchars(basename($_FILES['myfile']['name']));
    } else {
        header('Location: ../ManageBookspageEdit.php?success=false&error=upload');
        exit();
    }
    }
	}else {
		return htmlspecialchars(basename(NULL));
		
	}

        // move the uploaded (temporary) file to the specified destination


		
	}
	
function uploadFile()
{

	 
	 
	
    $target_dir = "../uploads/images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
	
if($_FILES['image']['name'] != "") {
	
	
    if (isset($_POST['submit'])) {
        $checkFile = getimagesize($_FILES['image']['tmp_name']);
        if ($checkFile !== false) {
            echo "File is an image - " . $checkFile['mime'] . '.';
        } else {
            header('Location: ../ManageBookspageEdit.php?success=false&error=notImage');
            exit();
        }
    }

    //Check file type 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        header('Location: ../ManageBookspageEdit.php?success=false&error=fileType');
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        //Returns file path
        return htmlspecialchars(basename($_FILES["image"]["name"]));
    } else {
        header('Location: ../ManageBookspageEdit.php?success=false&error=upload');
        exit();
    }
}else{
		return htmlspecialchars(basename(NULL));
		
	}
}



?>