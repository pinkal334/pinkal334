<?php
ob_start();
$page = basename(__FILE__);
require_once '../db_connection.php';
require_once '../admin/admin_header.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if (!empty($id) && isset($id)) {
        $sql2 = "DELETE FROM products WHERE id = '" . $id . "'";
        if (mysqli_query($conn, $sql2)) {
            echo "<script> alert('Deleted successfully')  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$products = getProducts($conn);
?>

</head>

<body>

<section class="management">
    <div class="container">
        <h2>Products Management</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><img src="./Images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" /></td>
                        <td><?php echo $product['category']; ?></td>
                        <td><?php echo $product['brand']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td>
                            <a href="./update_product.php?id=<?php echo $product['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="./product.php?id=<?php echo $product['id']; ?>&action=delete" class="btn btn-delete" onClick="javascript:return confirm('Are you sure want to delete');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <a href="./add_product.php" class="add-product">Add New Product</a>
    </div>
</section>

<?php require_once './admin_footer.php'; ?>
