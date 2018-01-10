<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 28-12-2017
 * Time: 16:24
 */
?>
<?php include "includes/admin_header.php";?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <?php include "includes/page_header.php";?>
                    <div class="row">

                        <div class="col-md-8">
                            <h3 class="bg-info well">Edit Post</h3>
                            <?php
                            // edit post display selected title
                            if(isset($_GET['edit_post'])){
                                $selected_post_id = $_GET['edit_post'];
                                $query = "SELECT * FROM posts WHERE post_id= {$selected_post_id}";
                                $edit_post = mysqli_query($connection,$query);
                                // display selected posts
                                while ($row = mysqli_fetch_assoc($edit_post)) {
                                    $post_tags = $row['post_tags'];
                                    $post_status  = $row['post_status'];
                                    $post_user = $row['post_user'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_date = $row['post_date'];
                                    $post_title = $row['post_title'];
                                    $post_image = $row['post_image'];
                                    $post_status = $row['post_status'];
                                    $post_content = $row['post_content'];
                                    $post_author  = $row['post_author'];
                                    $post_comments =$row ['post_comments'];
                                    ?>
                                 <form method="post" action="edit_post.php?edit_post=<?php echo $selected_post_id;?>" enctype="multipart/form-data">
                                     <?php
                                     //update post
                                     if(isset($_POST['update_post'])){

                                         $selected_post_id = $_GET['edit_post'];
                                         $post_tags = $_POST['post_tags'];
                                         //$post_status  = $_POST['post_status'];
                                         //$post_user = $_POST['post_user'];
                                         $post_category_id = $_POST['post_category_id'];
                                        $post_date = "now()";
                                         $post_title = $_POST['post_title'];
                                         //$post_image = $_POST['post_image'];
                                         $post_content = $_POST['post_content'];
                                         $post_author  = $_POST['post_author'];

                                         $post_image = $_FILES['image']['name'];
                                         $post_image_temp = $_FILES['image']['tmp_name'];
                                         move_uploaded_file($post_image_temp,"images/$post_image");

                                         $query = "update posts set post_image='{$post_image}', post_title='{$post_title}',post_date={$post_date}, post_category_id={$post_category_id},post_author='{$post_author}',post_image='{$post_image}', post_tags='{$post_tags}',post_content='{$post_content}' where post_id ={$selected_post_id}";
                                         $update_post = mysqli_query($connection, $query);
                                         confirm_connection($update_post);
                                         echo "<p class='alert-success lead'> post Updated <a href='posts.php?full_post=$selected_post_id;'>View Post</a> </p>";
                                     }
                                     ?>
                                <div class="form-group">
                                    <label for="postTitle">Post Title</label>
                                    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title" placeholder="Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="postcatid">Post Categories Id</label>
                                    <input type="text" class="form-control" value="<?php echo $post_category_id; ?>"  name="post_category_id" placeholder="Post Categories Id">
                                </div>
                                <div class="form-group">
                                    <label for="post Title">Author</label>
                                    <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author" placeholder="Post Author">
                                </div>
                                <div class="form-group">
                                    <label for="post Image">Add Image</label>
                                    <input type="file" class="form-control" name="image" >
                                </div>
                                <div class="form-group">
                                    <label for="Post Title">Post Tags</label>
                                    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>" placeholder="Post tags">
                                </div>
                                <div class="form-group">
                                    <label for="Post Content">Post Content</label>
                                    <textarea class="form-control" name="post_content" rows="3"><?php echo $post_content; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="submit" value="Update" name="update_post"  class="btn btn-success btn-lg">
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="add_post" value="Cancel" class="btn btn-success btn-lg">
                                    </div>
                                </div>


                            </form>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
