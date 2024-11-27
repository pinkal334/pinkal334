<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin_style.css">
    <title>
        <?php
            if ($page == "index.php") {
                echo "Dashboard";
            } elseif ($page == "brand.php") {
                echo "Brand";
            } elseif ($page == "category.php") {
                echo "Category";
            } elseif ($page == "edit_profile.php") {
                echo "Edit Profile";
            } elseif ($page == "login.php") {
                echo "Login";
            } elseif ($page == "product_details.php") {
                echo "Product Details";
            } elseif ($page == "order_management.php") {
                echo "Order Management";
            } elseif ($page == "product.php") {
                echo "Product";
            } elseif ($page == "update_product.php") {
                echo "Update Product";
            } elseif ($page == "user_management.php") {
                echo "User Management";
            }
        ?>
    </title>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="admin-title"><a href="./index.php">Shopping Site Admin</a></h1>
            <nav>
                <ul>
                    <div class="navigation__menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <li class="navigation__item"><a href="./index.php">Dashboard</a></li>
                    <li class="navigation__item"><a href="./category.php">Categories</a></li>
                    <li class="navigation__item"><a href="./brand.php">Brands</a></li>
                    <li class="navigation__item"><a href="./product.php">Products</a></li>
                    <li class="navigation__item"><a href="./user_management.php">User Management</a></li>
                    <li class="navigation__item"><a href="./logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <script src="../js/script.js"></script>
</body>

</html>
<?php
if (!isset($_SESSION['username']) || $_SESSION['username'] != "admin") {
    header("Location: ./login.php");
    exit();
}
?>
