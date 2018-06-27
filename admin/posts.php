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
                                        $post_id = h($row['post_id']);
                                        $post_tags = h($row['post_tags']);
                                        $post_status = h($row['post_status']);
                                        $post_user = h($row['post_user']);
                                        $post_category_id = h($row['post_category_id']);
                                        $post_date = h($row['post_date']);
                                        $post_title = h($row['post_title']);
                                        $post_image = h($row['post_image']);
                                        // $post_status = $row['post_status'];
                                        $post_content = h($row['post_content']);
                                        $post_author = h($row['post_author']);
                                        $post_comments = h($row ['post_comments']);
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
    $post_id = h($row['post_id']);
    $post_tags = h($row['post_tags']);
    $post_status = h($row['post_status']);
    $post_user = h($row['post_user']);
    $post_category_id = h($row['post_category_id']);
    $post_date = h($row['post_date']);
    $post_title = h($row['post_title']);
    $post_image = h($row['post_image']);
    // $post_status = $row['post_status'];
    $post_content = h($row['post_content']);
    $post_author = h($row['post_author']);
    $post_comments = h($row ['post_comments']);
    $post_views = h($row['post_counts']);
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
        $cat_by_post = h($row['cat_title']);
        ?>
                                            <td><?php echo $cat_by_post; ?></td>
                                        <?php } ?>
                                        <td><?php echo $post_status; ?></td>
                                        <td><img height="50" width="100" src="images/<?php echo $post_image; ?>"></td>
                                        <td><?php echo $post_tags; ?></td>
                                        <td><?php echo $post_views; ?></td>
                                        <td><a href="../post.php?full_post=<?php echo $post_id; ?>">View Post</a></td>
                                        <td><?php echo $post_date; ?></td>
                                        <td><a href="edit_post.php?edit_post=<?php echo $post_id; ?>">Edit Post</a> || <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Delete</button></td>
                                    </tr>
    <?php
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <a href="posts.php?delete_post=<?php echo $post_id ?>" class="btn btn-danger btn-lg">Delete Post</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php include "includes/admin_footer.php"; ?>

  

                                <?php                               
                                if (isset($_GET['delete_post'])) {
                                    if (isset($_SESSION['user_role'])) {
                                     if (isset($_SESSION['user_role']) == 'admin') {
                                    $delete_selected_post_id = escape_string($_GET['delete_post']);
                                    $query = "delete from posts WHERE post_id = {$delete_selected_post_id}";
                                    $delete_post = mysqli_query($connection, $query);
                                    confirm_connection($delete_post);
                                    redirec_to("posts.php");
                                        }
                                    }
                                    
                                }
                                ?>