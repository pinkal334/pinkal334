<?php 
$page = basename(__FILE__);
require_once './header.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
}
?>

<section class="checkout">
    <div class="container">
        <h2>Checkout</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            $totalPrice = 0;
            if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
                $a = 1;
                foreach ($_SESSION["shopping_cart"] as $product) {
                    $total = $product['price'];
                    $totalPrice += $total;
            ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><?php echo $total; ?></td>
            </tr>
            <?php
                    $a++;
                }
            }
            ?>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                <td><?php echo $totalPrice; ?></td>
            </tr>
        </table>
        
        <form class ="checkout-form" action="checkout_process.php" method="post">
            <h3>Shipping Information</h3>
            <label for="customer_name">Name:</label>
            <input type="text" id="customer_name" name="customer_name" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <input class="btn btn-submit" type="submit" value="Place Order">
        </form>
    </div>
</section>

<?php require_once './footer.php'; ?>
