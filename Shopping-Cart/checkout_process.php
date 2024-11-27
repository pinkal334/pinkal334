<?php
$page = basename(__FILE__);
require './db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];

    // Calculate total price
    if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
        foreach ($_SESSION["shopping_cart"] as $product) {
            $product_name = $product['name'];
            $quantity = $product['quantity'];
            $order_date = date("Y-m-d h:i:s");
            $customer_id = $_SESSION['user_id'];
            $price = $product['price'];

            $sql = "INSERT INTO orders (customer_name, email, product_name, quantity, order_date, customer_id, price)
                    VALUES ('$customer_name', '$email', '$product_name', '$quantity', '$order_date', '$customer_id', '$price')";
            
            mysqli_query($conn, $sql);
            echo "<script>alert('Order placed successfully!');</script>";
        }
    } else {
        echo "Error: No items in the shopping cart.";
    }

    unset($_SESSION['shopping_cart']);
}

mysqli_close($conn);
?>
