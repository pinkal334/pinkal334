<?php
$page = basename(__FILE__);
require_once '../db_connection.php';
require_once '../admin/admin_header.php';

$name = $image = $category = $brand = $price = $details = '';
$photoErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['id'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $image = isset($_POST['image']) ? $_POST['image'] : "";
    $category = isset($_POST['category']) ? $_POST['category'] : "";
    $brand = isset($_POST['brand']) ? $_POST['brand'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
    $details = isset($_POST['details']) ? $_POST['details'] : "";

    if (
        $_FILES['image']['size'] > 0 &&
        (
            ($_FILES["image"]["type"] == "image/gif") ||
            ($_FILES["image"]["type"] == "image/jpeg") ||
            ($_FILES["image"]["type"] == "image/pjpeg") ||
            ($_FILES["image"]["type"] == "image/png")
        ) &&
        ($_FILES["image"]["size"] < 2097152)
    ) {
        if ($_FILES["image"]["error"] > 0) {
            echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
        } else {
            $fileName = trim($_FILES['image']['name']);
            $tmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $targetDir = "./Images/";
            $target = $targetDir . basename($_FILES['image']['name']);
            $image = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
    } else {
        $photoErr = "Sorry, there was a problem uploading your file.";
    }
}

if (empty($photoErr) && isset($_POST['submit'])) {
    $sql = "INSERT INTO products (name, image, category, brand, price, details) VALUES ('$name', '$image', '$category', '$brand', '$price', '$details')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert 'Product added successfully.</script>'";
        header("Location: product.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="container__edit-profile">
    <h2 class="title__edit-profile">Add Product</h2>
    <form class="form__edit-profile" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label class="label__edit-profile" for="name">Name:</label>
        <input class="input-text__edit-profile" type="text" id="name" name="name" value="<?php echo $name ?>" required><br>

        <label class="label__edit-profile" for="image">Image:</label>
        <input type="file" id="image" name="image" onchange="previewImage(event)"><br>
        <?php if (!isset($_POST['id']) || empty($image)) {
            $style = 'display: none';
        } ?>
        <img id="preview" alt="" src="<?php echo './images/' . $image; ?>" style="<?php echo $style; ?>">
        <br>
        <input type="button" name="hide" id="myBtn" value="Remove" onclick="hideImage()" style="<?php echo $style; ?>">

        <label class="label__edit-profile" for="category">Category:</label>
        <select class="select__edit-profile" name="category" required>
            <option value="">select category</option>
            <?php
            $sql = "SELECT * FROM category";
            echo $category;
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["category_name"] == $category) {
                        $selected = 'selected';
                    } else {
                        $selected = "";
                    }
                    echo "<option " . $selected . " value=" . $row["category_name"] . ">" . $row["category_name"] . "</option>";
                }
            } else {
                echo "0 results";
            } ?>
        </select>

        <label class="label__edit-profile" for="brand">Brand:</label>
        <select class="select__edit-profile" name="brand" required>
            <option value="">select category</option>
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
            } ?>
        </select>

        <label class="label__edit-profile" for="price">Price:</label>
        <input class="input-text__edit-profile" type="number" id="price" name="price" value="<?php echo $price ?>" required><br>

        <label class="label__edit-profile" for="details">Details:</label><br>
        <textarea class="input-text__edit-profile" id="details" name="details" rows="4" cols="50"><?php echo $details ?></textarea><br>

        <input class="input-submit__edit-profile" type="submit" name="submit" value="Add Product">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#image").change(function(e) {
            let imgURL = URL.createObjectURL(e.target.files[0]);
            $("#myBtn").css("display", "block");
            $("#preview").css("display", "block");
            $("#preview").attr("src", imgURL);
        });

        $("#myBtn").click(function(e) {
            $("#myBtn").css("display", "none");
            $("#preview").css("display", "none");
            $("#image").val(null);
        });
    });
</script>

<?php require_once '../admin/admin_footer.php'; ?>
