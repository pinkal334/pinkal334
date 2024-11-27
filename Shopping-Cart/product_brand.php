<?php
$page = basename(__FILE__);
require_once './db_connection.php';
require_once './header.php';

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$brand = isset($_POST['brand']) ? $_POST['brand'] : "";
	$sql = "SELECT * FROM products WHERE brand = '" . $_POST['brand'] . "'";
	$result = mysqli_query($conn, $sql);
} else {
	$sql = "SELECT * FROM products";
	$result = mysqli_query($conn, $sql);
}

// Store the fetched data in an array
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
	$products[] = $row;
}
?>

<form method="post" class="product_category-form" action="">
	<select class="select__edit-profile" name="brand" id="brand" required>
		<option value="">select brand</option>
		<?php
		$sql = "SELECT * FROM brand";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row["brand_name"] == $brand) {
					$selected = 'selected';
				} else {
					$selected = "";
				}
				echo "<option " . $selected . " value=" . $row["brand_name"] . ">" . $row["brand_name"] . "</option>";
			}
		} else {
			echo "0 results";
		}
		?>
	</select>
	<input class="btn btn-submit" type="submit" value="submit" name="submit">
</form>

<section class="product-listing">
	<div class="container">
		<h2 class="product-listing-title">Our Products</h2>
		<div class="products">
			<?php foreach ($products as $product) : ?>
				<div class="product">
					<img id="product_img" src="./admin/Images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
					<h3><?php echo $product['name']; ?></h3>
					<p>&#8360; <?php echo $product['price']; ?>/-</p>
					<a href="./cart.php?id=<?php echo $product['id']; ?>">Add to Cart</a>
					<a href="./product_details.php?id=<?php echo $product['id']; ?>">Product Details</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php require_once './footer.php'; ?>