<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 28-12-2017
 * Time: 16:24
 */
?>
<?php include "includes/admin_header.php"; ?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <?php include "includes/page_header.php"; ?>
                    <?php
                    if (isset($_POST['checkBoxArray'])) {
                        foreach ($_POST['checkBoxArray'] as $item) {
                            $bulk_option = $_POST['bulk_option'];

                            switch ($bulk_option) {
                                case 'publish':
                                    $query = "update posts set post_status = '{$bulk_option}' WHERE post_id = {$item} ";
                                    $updat_to_publish = mysqli_query($connection, $query);
                                    redirec_to("posts.php");
                                    break;
                                case 'draft':
                                    $query = "update posts set post_status = '{$bulk_option}' WHERE post_id = {$item} ";
                                    $updat_to_draft = mysqli_query($connection, $query);
                                    redirec_to("posts.php");
                                    break;
                                case 'delete':
                                    $query = "delete from posts WHERE post_id = {$item} ";
                                    $delete_by_bulk = mysqli_query($connection, $query);
                                    break;

                                case 'clone':
                                    $query = "select * from posts where post_id = '{$item}'";

                                    $select_items = mysqli_query($connection, $query);
                                    confirm_connection($select_items);
                                    while ($row = mysqli_fetch_assoc($select_items)) {
                                        $post_id = $row['post_id'];
                                        $post_tags = $row['post_tags'];
                                        $post_status = $row['post_status'];
                                        $post_user = $row['post_user'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_date = $row['post_date'];
                                        $post_title = $row['post_title'];
                                        $post_image = $row['post_image'];
                                        // $post_status = $row['post_status'];
                                        $post_content = $row['post_content'];
                                        $post_author = $row['post_author'];
                                        $post_comments = $row ['post_comments'];
                                    }
                                    
        $query = "insert into posts (post_tags,post_category_id,post_title,post_author,post_date,post_image,post_content) ";
        $query .= " VALUES('{$post_tags}',{$post_category_id}, ";
        $query .= "'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}')";
        $copy_post = mysqli_query($connection, $query);
        confirm_connection($copy_post);
        break;
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">

                        <table class="table table-bordered">

                            <div id="bulkOptionContainer"  class="col-xs-4 form-group">
                                <select name="bulk_option" class="form-control" id="">
                                    <option value="">select Options</option>
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                    <option value="delete">Delete</option>
                                    <option value="clone">Clone</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                <a href="add_post.php" class="btn btn-primary">Add Post</a>
                            </div>
                            <thead>
                                <tr>
                                    <th><input id="selectAllCheckbox" class="checkbox" type="checkbox"></th>

                                    <th>Id</th>
                                    <th>Authors</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Post View Count</th>   
                                    <th>View Posts </th>
                                    <td>Date</td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

<?php
$query = "SELECT * FROM posts";
$display_posts = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($display_posts)) {
    $post_id = $row['post_id'];
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'];
    $post_user = $row['post_user'];
    $post_category_id = $row['post_category_id'];
    $post_date = $row['post_date'];
    $post_title = $row['post_title'];
    $post_image = $row['post_image'];
    // $post_status = $row['post_status'];
    $post_content = $row['post_content'];
    $post_author = $row['post_author'];
    $post_comments = $row ['post_comments'];
    $post_views = $row['post_counts'];
    ?>
                                    <tr>
                                        <td><input class="checkbox" name="checkBoxArray[]" type="checkbox" value="<?php echo $post_id; ?>"></td>
                                        <td><?php echo $post_id; ?></td>
                                        <td><?php echo $post_author; ?></td>
                                        <td><?php echo $post_title; ?></td>


    <?php
    $query = "select * from categories WHERE cat_id = {$post_category_id}";
    $set_cat = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($set_cat)) {
        $cat_by_post = $row['cat_title'];
        ?>
                                            <td><?php echo $cat_by_post; ?></td>
                                        <?php } ?>
                                        <td><?php echo $post_status; ?></td>
                                        <td><img height="50" width="100" src="images/<?php echo $post_image; ?>"></td>
                                        <td><?php echo $post_tags; ?></td>
                                        <td><?php echo $post_views; ?></td>
                                        <td><a href="../post.php?full_post=<?php echo $post_id; ?>">View Post</a></td>
                                        <td><?php echo $post_date; ?></td>
                                        <td><a href="edit_post.php?edit_post=<?php echo $post_id; ?>">Edit Post</a> || <a
                                                onclick="javascript: return confirm('Are You Sure');"  href="posts.php?delete_post=<?php echo $post_id ?>">Delete Post</a></td>
                                    </tr>
    <?php
}
?>
                                <?php                               
                                if (isset($_GET['delete_post'])) {
                                   
                                    if (isset($_SESSION['user_role'])) {
                                        if (isset($_SESSION['user_role'] == 'admin' )) {
                                    $delete_selected_post_id = $_GET['delete_post'];
                                    $query = "delete from posts WHERE post_id = {$delete_selected_post_id}";
                                    $delete_post = mysqli_query($connection, $query);
                                    confirm_connection($delete_post);
                                    redirec_to("posts.php");
                                        }
                                    }
                                    
                                }
                                ?>

                            </tbody>
                        </table>
                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

