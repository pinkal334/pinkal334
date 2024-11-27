<?php
$page = basename(__FILE__);
require_once './db_connection.php';
require_once './header.php';
?>

<div class="login__main-container">
	<div class="login-container">
		<h2 class="login-title">Login</h2>
		<form method="post" action="">
			<label class="login-label" for="username">Username:</label><br>
			<input class="login-input" type="text" id="username" name="username" required value="<?php if (isset($_COOKIE['username'])) {
																										echo $_COOKIE['username'];
																									} ?>"><br>
			<label class="login-label" for="password">Password:</label><br>
			<input class="login-input" type="password" id="password" name="password" required value="<?php if (isset($_COOKIE['password'])) {
																											echo $_COOKIE['password'];
																										} ?>"><br>
			<input class="login-checkbox" type="checkbox" id="remember_me" name="remember_me">
			<label class="login-label" for="remember_me">Remember Me</label><br>

			<input class="btn btn-submit" type="submit" value="submit" name="submit">
		</form>
	</div>
</div>

<?php
require_once './footer.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : "";

	$sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . md5(addslashes($password)) . "'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);

		session_start();
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['photo'] = $row['photo'];

		if (isset($remember_me) && !empty($remember_me) && $remember_me == 1) {
			$hour = time() + 3600 * 24 * 30;
			setcookie('password', $password, $hour, "/");
			setcookie('username', $username, $hour, "/");
		}

		header("Location: ./index.php");
	} else {
		echo '<script>alert("Invalid username or password. Please try again.");</script>';
	}
}
?>
