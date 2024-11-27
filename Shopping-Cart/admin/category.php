<?php
$page = basename(__FILE__);
require('../db_connection.php');
require_once('../admin/admin_header.php');
ob_start();

$value = "Add Category";
$id = isset($_GET['id']) ? $_GET['id'] : "";

if (isset($_GET['id']) && !isset($_GET['action'])) {
    $value = "Edit";
    $sql = "SELECT * FROM category WHERE id = " . $id;
    $result = mysqli_query($conn, $sql);
    $col = mysqli_fetch_assoc($result);
    $edit_category = $col['category_name'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $category_name = $_POST['category_name'];

        $sql = "UPDATE category SET `category_name` = '$category_name' WHERE id = " . $id;

        if (mysqli_query($conn, $sql)) {
            header("Location: category.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if (!empty($id) && isset($id)) {
        $sql2 = "DELETE FROM category WHERE id = '" . $id . "'";
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
        <h2>Categories Management</h2>

        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $a = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                ?>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="./category.php?id=<?php echo $id ?>" class="btn btn-edit">Edit</a>
                                <a href="./category.php?id=<?php echo $id ?>&action=delete" class="btn btn-delete" onClick="javascript:return confirm('Are you sure want to delete');">Delete</a>
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
        <form class="form-category" action="" method="post" enctype="multipart/form-data">
            <label class="category-label" for="category_name">New Category Name:</label>
            <input class="add-new-category" type="text" id="category_name" name="category_name" value="<?php if (isset($edit_category)) {
                                                                                                                echo $edit_category;
                                                                                                            } ?>" required><br>
            <input class="category-submit" type="submit" name="submit" value="<?php echo $value; ?>">
        </form>
    </div>
</section>

<?php
require_once('../admin/admin_footer.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !isset($_GET['id'])) {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: category.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
