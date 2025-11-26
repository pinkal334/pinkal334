<?php
session_start();

// Reset profile if requested
if (isset($_POST['resetProfile'])) {
    unset($_SESSION['username']);
    unset($_SESSION['profilePic']);
}

// Default values
$username = $_SESSION['username'] ?? "User";
$profilePic = $_SESSION['profilePic'] ?? "assets/default_picture.jpg";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['saveProfile'])) {
    // Username
    $username = !empty($_POST["username"]) ? $_POST["username"] : "User";

    // Profile picture
    if (!empty($_FILES["profilePic"]["name"])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $targetFile = $targetDir . basename($_FILES["profilePic"]["name"]);
        move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile);
        $profilePic = $targetFile;
    } else {
        $profilePic = "assets/default_picture.jpg";
    }

    // Save to session
    $_SESSION["username"] = $username;
    $_SESSION["profilePic"] = $profilePic;
}

// Greeting function
function getGreeting()
{
    $hour = date("H");
    if ($hour < 12) return "Good Morning...";
    if ($hour < 16) return "Good Afternoon...";
    if ($hour < 19) return "Good Evening...";
    return "Good Night...";
}

// Reset profile
if (isset($_POST['resetProfile'])) {
    unset($_SESSION['username']);
    unset($_SESSION['profilePic']);
    unset($_SESSION['profile_set']); // important: remove the flag
    header("Location: " . $_SERVER['PHP_SELF']); // reload page
    exit;
}

// Handle cancel
if (isset($_POST['cancel'])) {
    $_SESSION['username'] = "User";
    $_SESSION['profilePic'] = "assets/default_picture.jpg";
    $_SESSION['profile_set'] = true;
    header("Location: " . $_SERVER['PHP_SELF']); // reload page to close popup
    exit;
}
?>

<link rel="stylesheet" href="./style.css">

<?php if (empty($_SESSION['username']) || empty($_SESSION['profilePic'])): ?>
    <div class="popup show">
        <div class="popup-content">
            <h2>Set Your Profile</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Enter your name">
                <input type="file" name="profilePic" accept="image/*">
                <div class="popup-buttons">
                    <button type="submit" name="saveProfile">Save</button>
                    <button type="submit" name="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>