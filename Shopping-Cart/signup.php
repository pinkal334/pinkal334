<?php
$page = basename(__FILE__);
ob_start();
require_once './db_connection.php';
require_once('./header.php');

//declar error variables
$nameErr = $lnameErr = $usernameErr = $emailErr = $mobileErr = $emailErr = $pswErr = $confirm_passwordErr = $photoErr = "";
$nameErr = $emailErr = $mobileErr = $genderErr = $first_name = $email = $mobile = $psw = $last_name = $username = $photo = "";
if (isset($_POST['submit']) && !empty($_POST['submit']) && empty($id)) {
	$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
	$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$mobile = isset($_POST['mobile']) ? floatval($_POST['mobile']) : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$password = isset($_POST['password']) ? md5(addslashes($_POST['password'])) : "";
	$photo = isset($_POST['photo']) ? $_POST['photo'] : "";


	//validation proocess
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($first_name)) {
			$nameErr = "first name is required";
		} else if (!preg_match("/^[a-zA-Z ]*$/", $first_name) && (strlen($first_name) < 3)) {
			$nameErr = "Only alphabets and white space are allowed and minimun 3 charachers are required";
		}

		// Validate last name
		if (empty($last_name)) {
			$lnameErr = "Last name is required";
		} else if (!preg_match("/^[a-zA-Z]*$/", $last_name) || strlen($last_name) < 2) {
			$lnameErr = "Last name should contain only alphabetic characters and have at least 2 characters";
		}

		if (empty($username)) {
			$usernameErr = "Username name is required";
		} else if (strlen($username) > 25) {
			$usernameErr = "User name must be less than 25 characters";
		} else {
			$que = "SELECT username FROM users where username='" . $username . "'";
			$result = mysqli_query($conn, $que);

			if (mysqli_num_rows($result) > 0) {
				$usernameErr = "username already exist";
			}
		}

		if (strlen($mobile) != 10) {
			$mobileErr = "Mobile must be 10 numbers";
		}

		if (empty($email)) {
			$emailErr = "email name is required";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		} else {
			$que = "SELECT email FROM users where Email='" . $email . "'";
			$result = mysqli_query($conn, $que);

			if (mysqli_num_rows($result) > 0) {
				$emailErr = "Email already exist";
			}
		}

		$psw = $_POST['password'];
		$length = strlen($psw);
		$confirm_password = $_POST['confirm_password'];
		if (empty($psw)) {
			$pswErr = "Password is required";
		} else if ($length < 8 || $length > 16) {
			$pswErr = "Password must be between 8 and 16 characters long.";
		}

		if ($psw != $confirm_password) {
			$confirm_passwordErr = "Password is not match";
		}

		if (
			$_FILES['photo']['size'] > 0 &&
			(($_FILES["photo"]["type"] == "image/gif") ||
				($_FILES["photo"]["type"] == "image/jpeg") ||
				($_FILES["photo"]["type"] == "image/pjpeg") ||
				($_FILES["photo"]["type"] == "image/png") &&
				($_FILES["photo"]["size"] < 2097152))
		) {

			if ($_FILES["photo"]["error"] > 0) {
				echo "Return Code: " . $_FILES["photo"]["error"] . "<br />";
			} else {
				$fileName = trim($_FILES['photo']['name']);
				$tmpName  = $_FILES['photo']['tmp_name'];
				$fileSize = $_FILES['photo']['size'];
				$fileType = $_FILES['photo']['type'];
				$target = "./user_image/";
				$target = $target . basename($_FILES['photo']['name']);
				$photo = basename($_FILES['photo']['name']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $target);
			}
		} else {
			$photoErr = "Sorry, there was a problem uploading your file.";
		}
	}
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!empty($id) && isset($id)) {
	$sql1 = "SELECT * FROM users where id=" . $id;
	$res1 = mysqli_query($conn, $sql1);
	$col1 = mysqli_fetch_assoc($res1);
	$first_name = $col1['first_name'];
	$last_name = $col1['last_name'];
	$username = $col1['username'];
	$mobile = $col1['mobile'];
	$email = $col1['email'];
}

?>
<div class="registration__container">
		<h2 class="registration__title">User Registration</h2>
		<form id="myForm" onsubmit="return validateForm()" action="" method="POST" enctype="multipart/form-data">

			<label class="registration__label" for="first_name">First Name:</label> <span class="error-message">*<?php echo $nameErr; ?></span><br>
			<input class="registration__input" type="text" id="first_name" name="first_name" value="<?php echo $first_name ?>"><br>


			<label class="registration__label" for="last_name">Last Name:</label> <span class="error-message">*<?php echo $lnameErr; ?></span><br>
			<input class="registration__input" type="text" id="last_name" name="last_name" value="<?php echo $last_name ?>"><br> 

			<label class="registration__label" for="username">Username:</label> <span class="error-message">*<?php echo $usernameErr; ?></span><br>
			<input class="registration__input" type="text" id="username" name="username" value="<?php echo $username ?>"><br> 


			<label class="registration__label" for="mobile">Mobile Number:</label> <span class="error-message">*<?php echo  $mobileErr; ?></span><br>
			<input class="registration__input" type="tel" id="mobile" name="mobile" value="<?php echo $mobile ?>"><br> 


			<label class="registration__label" for="email">Email Address:</label> <span class="error-message">*<?php echo $emailErr; ?></span><br>
			<input class="registration__input" type="email" id="email" name="email" value="<?php echo $email ?>"><br> 


			<label class="registration__label" for="photo">User Photo:</label> <span class="error-message">*<?php echo $photoErr; ?></span><br>
			<input class="registration__input" type="file" id="photo" name="photo" accept="image/jpeg, image/png"><br>
			<?php if (!isset($_GET['id']) || empty($image)) {
				$style = 'display: none';
			} ?>
			<img id="preview" alt="" src="<?php echo './Images/' . $image; ?>" style="<?php echo $style; ?>">
			<br>
			<input type="button" name="hide" id="myBtn" value="Remove" onclick="hideImage()" style="<?php echo $style; ?>">


			<label class="registration__label" for="password">Password:</label> <span class="error-message">*<?php echo  $pswErr; ?></span><br>
			<input class="registration__input" type="password" id="password" name="password" value=""><br>


			<label class="registration__label" for="confirm_password">Confirm Password:</label> <span class="error-message">*<?php echo $confirm_passwordErr; ?></span><br>
			<input class="registration__input" type="password" id="confirm_password" name="confirm_password"><br>

			<input class="registration__input" type="submit" value="submit" name="submit">


		</form>
	</div>
	<script src="./js/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#photo").change(function(e) {
				let imgURL = URL.createObjectURL(e.target.files[0]);
				$("#myBtn").css("display", "block");
				$("#preview").css("display", "block");
				$("#preview").attr("src", imgURL);
			});

			$("#myBtn").click(function(e) {
				$("#myBtn").css("display", "none");
				$("#preview").css("display", "none");
				$("#photo").val(null);
			})

		});
	</script>

<?php
require_once('./footer.php');

if (isset($_POST['submit'])) {
	if (empty($nameErr) && empty($lnameErr) && empty($usernameErr) && empty($emailErr) && empty($mobileErr) & empty($emailErr) && empty($pswErr) && empty($confirm_passwordErr) && empty($photoErr)) {
		// Insert data into database
		$sql = "INSERT INTO users (first_name,last_name,username,mobile,email,photo,password) VALUES ('$first_name','$last_name','$username','$mobile','$email','$photo','$password')";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Registartion Successfully.');</script>";
			header("Location: ./login.php");
		} else {
			echo "Error: " . mysqli_error($conn);
		}
	}
}

?>