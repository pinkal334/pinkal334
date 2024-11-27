<?php
$page = basename(__FILE__);
require_once '../db_connection.php';
require_once '../admin/admin_header.php';
?>

<section class="management">
    <div class="container">
        <h2>User Management</h2>
        <table>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $a = 1; 
            $use="";
            if (mysqli_num_rows($result) > 0) {
                // Output data for each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $a . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td class='actions'>
                            <a class='btn btn-track-order' href='./order_management.php?id=" . $row["id"] . "'>Track orders</a>
                            <a class='btn btn-btn-primary' href='./edit_profile.php?id=" . $row["id"] . "'>Edit Profile</a>
                            <a class='btn btn-delete' href='./user_management.php?id=" . $row["id"] . "&action=delete' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>
                          </td>";
                    echo "</tr>";
                    $a++;
                }
            } else {
                echo "<tr>
                        <td colspan='4'>No users found.</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</section>

<?php
require_once('../admin/admin_footer.php');

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if (!empty($id) && isset($id)) {
        $sql2 = "DELETE FROM users WHERE id = '" . $id . "'";
        if (mysqli_query($conn, $sql2)) {
            echo "<script> alert('Deleted successfully')  </script>";
        } else {
            $pdmsg = "false";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
