<?php
$page = basename(__FILE__);
require('../db_connection.php');

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if ($username == "admin" && $password == "12345") {
        session_start();
        $_SESSION['username'] = "admin";
        header("Location: ./index.php");
        echo "success";
    } else {
        echo "<script>alert 'invalid username and password';</script>";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin_style.css">
    <script src="../js/login.js"></script>
    <title>Header</title>
</head>

<body>
    <div class="login__main-container">
        <div class="login-container">
            <h2 class="login-title">Login</h2>
            <form method="post" action="">
                <label class="login-label" for="username">Username:</label><br>
                <input class="login-input" type="text" id="username" name="username" required><br>

                <label class="login-label" for="password">Password:</label><br>
                <input class="login-input" type="password" id="password" name="password" required><br>

                <input type="checkbox" id="checkbox" class="form-check-input">
                <label for="checkbox">Show Password</label>

                <input class="btn btn-submit" type="submit" value="submit" id="submit" name="submit">
            </form>
        </div>
    </div>
</body>
