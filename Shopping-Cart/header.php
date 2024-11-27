<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['user_id'])) {
    $style = "inline";
} else {
    $style = "none";
}

if (isset($_SESSION['user_id'])) {
    $logout = "inline";
} else {
    $logout = "none";
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/user_style.css" type='text/css'>
    <title>
        <?php
        if ($page == "index.php") {
            echo "Products";
        } elseif ($page == "cart.php") {
            echo "Cart";
        } elseif ($page == "checkout_process.php") {
            echo "checkout";
        } elseif ($page == "login.php") {
            echo "Login";
        } elseif ($page == "product_categories.php") {
            echo "Category";
        } elseif ($page == "product_brand.php") {
            echo "Brands";
        }elseif ($page == "product_details.php") {
            echo "Product Details";
        } elseif ($page == "signup.php") {
            echo "Signup";
        } elseif ($page == "user_profile.php") {
            echo "Checkout";
        }
        ?>
    </title>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="header__title"><a href="./index.php">Shopping Site</a></h1>
            <nav>
                <ul>
                    <div class="navigation__menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <li class="navigation__item"><a href="./index.php">Home</a></li>
                    <li class="navigation__item"><a href="./user_profile.php">Checkout</a></li>
                    <li class="navigation__item"><a href="./product_categories.php">Category</a></li>
                    <li class="navigation__item"><a href="./product_brand.php">Brands</a></li>
                    <li class="navigation__item"><a href="./signup.php" class="navigation__link" style="display: <?php echo $style ?>;">Signup</a></li>
                    <li class="navigation__item"><a href="./login.php" class="navigation__link" style="display: <?php echo $style ?>;">Login</a></li>
                    <li class="navigation__item"><a href="./logout.php" class="navigation__link" style="display: <?php echo $logout ?>;">Logout</a></li>
                    <li class="navigation__item"><a href="./cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
                    <li class="navigation__item" style="display: <?php echo $logout; ?>;"><img id="profile_img" src="./user_image/<?php echo $_SESSION['photo']; ?>"></li>
                </ul>
            </nav>
        </div>
    </header>
    <script src="./js/script.js"></script>
</body>

</html>
