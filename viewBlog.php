<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/blogStyle.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="CSS/mobile.css">
    <title>Blog</title>
</head>
<body>
    <!--<div class="login-form-container">
        <form class="login-form" method="post" action="login.php">
            <label for="email"><b>Email: </b></label>
            <input type="email" placeholder="Enter Email" id="email" name="email" required>
            <br>
            <label for="password"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>-->
    <header id="header">
        <div class="container">
            <nav class="links">
                <ul class="links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html#AboutMe">About Me</a></li>
                    <li><a href="Portfolio.html">Portfolio</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                    <li><a href="index.html#ContactMe">Contact</a></li>
                    <li><a href="login.html">Login</a></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--
    <form method="post" action="login.php">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <button type="submit">Login</button>
    </form>
    -->
    <form class="blog-filter" method="post" action="">
        <label for="month">Select a month:</label>
        <select name="month" id="month">
            <option value=""> Select a month </option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <button type="submit">Filter</button>
    </form>
</body>
</html>
<?php
//Connecting to my database called ecs417
$connection = mysqli_connect("localhost", "root", "", "ecs417u");
//This gets the selected month value from the form
$month = isset($_POST['month']) ? $_POST['month'] : '';
//stores all the data(blog posts) into $sql
$sql = "SELECT * FROM blogtable";
if (!empty($month)) {
    $sql .= " WHERE MONTH(Timestamp) = '$month'";
}
//It store the results in $result
$result = $connection->query($sql);
//Made an array to store the data
$posts = array();
if ($result->num_rows > 0) {
    //I get the rows and store them as associative array in $posts
    while ($row = $result->fetch_assoc()) {
        $post = array(
            "Position" => $row["Position"],
            "Title" => $row["Title"],
            "Content" => $row["Content"],
            "Timestamp" => $row["Timestamp"]
        );
        $posts[] = $post;
    }
    //Did a bubblesort using Position which just numbers all posts
    $n = count($posts);
    for ($i = 0; $i < $n-1; $i++) {
        for ($j = 0; $j < $n-$i-1; $j++) {
            // Compare the "Position" of two adjacent posts and swap them if they are not in order
            if ($posts[$j]['Position'] < $posts[$j+1]['Position']) {
                // Swap posts
                $temp = $posts[$j];
                $posts[$j] = $posts[$j+1];
                $posts[$j+1] = $temp;
            }
        }
    }
    //shows all the blog posts in order
    foreach ($posts as $post) {
        echo '<div class="card">';
        echo '<h1 class="blog-title">' . $post['Title'] . '</h1>';
        echo '<p class="blog-content">' . $post['Content'] . '</p>';
        echo '<p class="blog-time">' . $post['Timestamp'] . '</p>';
        echo '</div>';
    }
} else {
    echo "No posts found.";
}
//closes the connectection with the database ecs417u
mysqli_close($connection);
?>
<script src="JS/blogScript.js"></script>