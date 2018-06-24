<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 31-12-2017
 * Time: 06:34
 */
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Email</th>
        <th>Role</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $display_users = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($display_users)){
        $user_id = h($row['user_id']);
        $user_name = h($row['user_name']);
        $user_first_name = h($row['user_first_name']);
        $user_last_name  = $row['user_last_name'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
        ?>
        <tr>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $user_first_name; ?></td>
            <td><?php echo $user_last_name; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_role; ?></td>
            <td><a href="users.php?source=edit_users&user_id=<?php echo $user_id; ?>">Edit User</a>
                |
                <a onclick="javascript: return confirm('Are You Sure');" href="users.php?delete_user=<?php echo $user_id; ?>">Delete User</a>
            </td>
        </tr>
        <?php
    }
    ?>
    <?php
//    if(isset($_GET['delete_post'])){
//        $delete_selected_post_id = $_GET['delete_post'];
//        $query = "delete from posts WHERE post_id = {$delete_selected_post_id}";
//        $delete_post = mysqli_query($connection, $query);
//        confirm_connection($delete_post);
//        redirec_to("posts.php");
//    }
    ?>
    </tbody>
</table>
<?php
if(isset($_GET['delete_user'])){
    $selected_user_id = $_GET['delete_user'];
    $query = "delete from users WHERE user_id = {$selected_user_id}";
$delete_comment = mysqli_query($connection,$query);
redirec_to("users.php");
}
?>