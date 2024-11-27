<?php
ob_start();
$page = basename(__FILE__);
require_once './db_connection.php';
require_once './header.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
if (!empty($id)) {
	$sql = "SELECT * FROM products WHERE id = " . $id;
	$result = mysqli_query($conn, $sql);

	// Store the fetched data in an array
	$row = mysqli_fetch_assoc($result);
}

?>

<section class="product-details">
	<div class="container">
		<div class="product-image">
			<img src="./admin/Images/<?php echo $row['image'] ?>" alt="Product Name">
		</div>
		<div class="product-info">
			<h2><?php echo $row['name']; ?></h2>
			<p class="price">&#8360; <?php echo $row['price']; ?></p>
			<p class="description"><?php echo $row['details']; ?></p>
			<a href="./cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
		</div>
	</div>
</section>

<?php require_once './footer.php'; ?>
