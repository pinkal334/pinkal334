<?php
$page = basename(__FILE__);
require ('../db_connection.php');
require_once('../admin/admin_header.php');

$id = isset($_GET['id']) ? $_GET['id'] : "";
if (empty($id)) {
    $sql = "SELECT * FROM orders";
} else {
    $sql = "SELECT * FROM orders WHERE customer_id = " . $id;
}
$result = mysqli_query($conn, $sql);
?>

<div class="table-container">

    <h2 class="order-manage-title">Manage orders</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        // Display orders in a table
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Order Date</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["customer_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["product_name"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["order_date"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No orders found.";
    }
    ?>
</div>

<?php require_once('../admin/admin_footer.php'); ?>
