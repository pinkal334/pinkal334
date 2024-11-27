<?php
ob_start();
$page = basename(__FILE__);
require('../db_connection.php');
require_once('../admin/admin_header.php');

$value = "Add Brand";
$id = isset($_GET['id']) ? $_GET['id'] : "";

if (isset($_GET['id']) && !isset($_GET['action'])) {
    $value = "Edit";
    $sql = "SELECT * FROM brand WHERE id = " . $id;
    $result = mysqli_query($conn, $sql);
    $col = mysqli_fetch_assoc($result);
    $edit_brand = $col['brand_name'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $brand_name = $_POST['brand_name'];

        $sql = "UPDATE brand SET `brand_name` = '$brand_name' WHERE id = " . $id;

        if (mysqli_query($conn, $sql)) {
            header("Location: brand.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if (!empty($id) && isset($id)) {
        $sql2 = "DELETE FROM brand WHERE id = '" . $id . "'";
        if (mysqli_query($conn, $sql2)) {
            echo "<script> alert('Deleted successfully') </script>";
        } else {
            $pdmsg = "false";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<section class="management">
    <div class="container">
        <h2>Brands Management</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM brand";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $a = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                ?>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $row['brand_name'] ?></td>
                            <td>
                                <a href="./brand.php?id=<?php echo $id ?>" class="btn btn-edit">Edit</a>
                                <a href="./brand.php?id=<?php echo $id ?>&action=delete" class="btn btn-delete" onClick="javascript:return confirm('Are you sure want to delete');">Delete</a>
                            </td>
                        </tr>
                <?php
                        $a++;
                    }
                } else {
                    echo "0 results";
                }
                ?>

            </table>
        </div>
        <form class="form-brand" action="" method="post">
            <label for="brand_name">New Brand Name:</label>
            <input class="add-new-brand" type="text" id="brand_name" name="brand_name" value="<?php if (isset($edit_brand)) {
                                                                                                        echo $edit_brand;
                                                                                                    } ?>">
            <input class="submit-new-brand" type="submit" name="submit" value="<?php echo $value; ?>">
        </form>
    </div>
</section>

<?php
include("../admin/admin_footer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !isset($_GET['id'])) {
    $brand_name = $_POST['brand_name'];

    $sql = "INSERT INTO brand (brand_name) VALUES ('$brand_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: brand.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
