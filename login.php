<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Login</title>
</head>
<body>
</body>
</html>

<?php
session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecs417u";
$connection = "";
$message = "";

if (count($_POST) > 0 && isset($_POST["email"]) && isset($_POST["password"])) {
    $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name) or die('Unable To connect');
    $result = mysqli_query($connection, "SELECT * FROM usertable WHERE email='" . $_POST["email"] . "' and password = '" . $_POST["password"] . "'");
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
        if ($_SESSION["email"] == $row['email'] && $_SESSION["password"] == $row['password']) {

            header("Location:addEntry.php");
        }
    } else {
        $message = "<br> Invalid Email or Password!";
    }
}
?>

<!-- Display the login form -->
<form method="post" action="login.php">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button type="submit">Login</button>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</form>
