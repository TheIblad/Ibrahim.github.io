<?php
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="ecs417u";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name); //connects website to my database

$title = $_POST["title"]; //making local variable of my blogtable variables not for the other 2 though because they are not filled by me(timestamp and position)
$content = $_POST["content"];

$sql="INSERT INTO blogtable(title, content) VALUES (?, ?)";
//this inputs what the user puts in the addpost.php and puts that into the database
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ss", $title, $content);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0){
    header("Location:addEntry2.php");
} else {
    echo "Not added successfully";
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>