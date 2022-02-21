<?php

include("../database.php");
if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
}


//SEARCH FOR BOOKS IN THE DATABASE RELATED TO THE KEYWORD($keyword)
$query = "SELECT * FROM books where title LIKE CONCAT('%',?,'%') ";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $keyword);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
?>
    <ul style="list-style-type: none;padding: 5px 0px;">
        <a href="./scripts/getBookInfo.php?id=<?php echo $row['id'] ?>">
            <li onclick="fill(<?php echo $row['title'] ?>)">
                <p style="font-size: 18px;font-weight: bold;"><?php echo $row['title'] ?></p>
                <p><?php echo $row['author'] ?></p>
            </li>
        </a>
    </ul>
<?php
}
?>