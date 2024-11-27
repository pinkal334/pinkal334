<?php
$page = basename(__FILE__);
require './db_connection.php';
require_once('./header.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

function searchForId($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['id'] == $id) {
            return true;
        }
    }
    return false;
}

$msg = '';

// Check if $_SESSION['shopping_cart'] is set and is an array
if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
    $msg = searchForId($id, $_SESSION['shopping_cart']);
} else {
    // $_SESSION['shopping_cart'] is not set or is not an array
    $msg = false;
}

// var_dump($msg);

if (!empty($id) && isset($id) && empty($_GET['action'])) {

    $sql1 = "SELECT * FROM products where id = " . $id;
    $res1 = mysqli_query($conn, $sql1);
    $col1 = mysqli_fetch_assoc($res1);

    $name = $col1['name'];
    $details = $col1['details'];
    $price = $col1['price'];
    $image = $col1['image'];
    $category = $col1['category'];
    $brand = $col1['brand'];

    $cartArray = array(
        array(
            'id' => $id,
            'name' => $name,
            'details' => $details,
            'price' => $price,
            'category' => $category,
            'image' => $image,
            'brand' => $brand,
            'quantity' => "1"
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        echo "<script>alert('Product is added to your cart!')</script>";
        // echo"empty cart";
    } elseif (!$msg) {
        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
    } elseif ($msg) {
        echo "<script>alert('item is already exist!')</script>";
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
if (isset($_GET['id']) && $action == "remove") {
    $a = 0;
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
        if ($_GET['id'] == $value['id']) {
            unset($_SESSION["shopping_cart"][$a]);
            echo "<script>alert('item removed successfully!')</script>";
        }
        $a++;
    }
}

if (isset($_GET['action']) && $_GET['action'] == "clear_cart") {
    unset($_SESSION['shopping_cart']);
}
?>

<section class="cart">
    <div class="container-cart">
        <h2>Your Shopping Cart</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php
            if (isset($_SESSION['shopping_cart']) && is_array($_SESSION['shopping_cart'])) {
                $a = 1;
                foreach ($_SESSION["shopping_cart"] as $product) { ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?><input type="hidden" id="price" class="price" value="<?php echo $product['price']; ?>"></td>
                        <td>1</td>
                        <td><span id="bulk" class="total"><?php echo $product['price']; ?></span></td>
                        <td>
                            <?php echo
                            "<a href='./cart.php?id=" . $product['id'] . "&action=remove' class='btn btn-remove'>Remove</a></td>";
                            ?>
                    </tr>
            <?php
                    $a++;
                }
            } ?>

        </table>
        <div class="cart-actions">
            <a href="./index.php">Continue Shopping</a>
            <a href="./cart.php?action=clear_cart">Clear Cart</a>
            <a href="./user_profile.php">Proceed to Checkout</a>
        </div>
    </div>
</section>

<?php require_once('./footer.php') ?>
