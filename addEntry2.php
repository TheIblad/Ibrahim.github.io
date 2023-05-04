<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/blogStyle.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="CSS/mobile.css">
    <title>Add Blog</title>
</head>
<body>
    <p>Blog Posted Successfully!</p>
    <form action="addEntry.php" method="post">
        <input type="submit" value="Logout" name="Logout" id="logout">
    </form>
    <h1>Add Post</h1>
    <form id="addBlogForm" action="addPost.php" method="post">
        <label for="title">Title: </label><br>
        <input type="text" id="titleInput" name="title" placeholder="Title" required>
        <label for="content">Content: </label><br>
        <textarea type="text" id="contentInput" name="content" placeholder="Content" required></textarea>
        <input type="submit" id="postBtn" value="Post">
        <button type="button" id="resetBtn">Clear</button>
    </form>
</body>
</html>
<?php
session_start();
if (isset($_POST["Logout"])) {
    session_destroy();
    header("Location: viewBlog.php");
}

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecs417u";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
$sql = "SELECT * FROM blogtable";
$result = mysqli_query($connection, $sql);
$posts = array();
while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}
usort($posts, function($a, $b) {
    return $b['Position'] - $a['Position'];
});
foreach ($posts as $row) {
    echo '<div class="card">';
    echo '<h1 class="blog-title">' . $row['Title'] . '</h1>';
    echo '<p class="blog-content">' . $row['Content'] . '</p>';
    echo '<p class="blog-time">' . $row['Timestamp'] . '</p>';
    echo '</div>';
}
mysqli_close($connection);
?>
<script src="JS/blogScript.js"></script>