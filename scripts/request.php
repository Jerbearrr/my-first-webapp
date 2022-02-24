<?php
include("../database.php");

if (isset($_POST['book_borrowed'])) {
    //UPDATE WHEN BOOK IS BORROWED/CLAIMED BY THE USER/STUDENT
    $request = $_POST['book_borrowed'];
    $deadline = new DateTime("now + 7 days");
    $timezone = new DateTimeZone('Asia/Tokyo');
    $deadline->setTimezone($timezone);

    $query = "UPDATE book_requests SET status = 'borrowed', date_of_return = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $deadline->format("Y-m-d H:i:s"), $request);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_errno($stmt)){
        header("Location: ../ManageTransactionStatus.php?success=false");
        exit();
    } else{
        header("Location: ../ManageTransactionStatus.php?success=true");
    }
}

if (isset($_POST['book_returned'])) {
    //UPDATE WHEN BOOK IS RETURNED BY THE USER/STUDENT
    $request = $_POST['book_returned'];

    $query = "SELECT date_of_return FROM book_requests WHERE id = ?;";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $request);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $returnDate = mysqli_fetch_row($result)[0];

    $today = new DateTime("now");
    $timezone = new DateTimeZone('Asia/Singapore');
    $today->setTimezone($timezone);
    
    if (strtotime($returnDate) > strtotime($today->format("Y-m-d H:i:s"))) {
        //RETURN OF THE BOOK IS LATE
        $isOnTime = 0;
    } else {
        //RETURN OF THE BOOK IS ON TIME
        $isOnTime = 1;
    }
    
    $query = "UPDATE book_requests SET status = 'returned', return_isLate = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii",$isOnTime, $request);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_errno($stmt)){
        header("Location: ../ManageTransactionStatus.php?success=false");
        exit();
    } else{
        header("Location: ../ManageTransactionStatus.php?success=true");
        exit();
    }
}

if (isset($_POST['requestsId'])) {
    $requests = $_POST['requestsId'];
}

if (isset($_POST['AcceptRequest'])) {
    $request = $_POST['AcceptRequest'];
    $query = "UPDATE book_requests SET status = 'confirmed' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $request);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_errno($stmt)) {
        header("Location: ../ManageTransactionReq.php?success=false");
        exit();
    } else {
        header("Location: ../ManageTransactionReq.php?success=true");
        exit();
    }
}

if (isset($_POST['RejectRequest'])) {
    $request = $_POST['RejectRequest'];
    $query = "UPDATE book_requests SET status = 'declined' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $request);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_errno($stmt)) {
        header("Location: ../ManageTransactionReq.php?success=false");
        exit();
    } else {
        header("Location: ../ManageTransactionReq.php?success=true");
        exit();
    }
}

if (isset($_POST['AcceptRequests'])) {
    //Accept button clicked!
    foreach ($requests as $bookid) {
        $query = "UPDATE book_requests SET status = 'confirmed' WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $bookid);
        mysqli_stmt_execute($stmt);
    }

    if (mysqli_stmt_errno($stmt)) {
        header("Location: ../ManageTransactionReq.php?success=false");
        exit();
    } else {
        header("Location: ../ManageTransactionReq.php?success=true");
        exit();
    }
}

if (isset($_POST['RejectRequests'])) {
    //Reject button clicked!
    foreach ($requests as $bookid) {
        $query = "UPDATE book_requests SET status = 'declined' WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $bookid);
        mysqli_stmt_execute($stmt);
    }

    if (mysqli_stmt_errno($stmt)) {
        header("Location: ../ManageTransactionReq.php?success=false");
        exit();
    } else {
        header("Location: ../ManageTransactionReq.php?success=true");
        exit();
    }
}
