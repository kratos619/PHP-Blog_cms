<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 29-12-2017
 * Time: 07:21
 */
?>
<?php include "includes/admin_header.php";?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>
    <?php
    if(isset($_POST['add_post'])){
        $post_tags = $_POST['post_tags'];
        $post_category_id = $_POST['post_category_id'];
        $post_date = date('d-m-y');
        $post_title = $_POST['post_title'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_author  = $_POST['post_author'];
        $post_view_counts = 4;
        move_uploaded_file($post_image_temp,"images/$post_image");

        $query = "insert into posts(post_tags,post_category_id,post_title,post_author,post_date,post_image,post_content,post_view_counts) ";
        $query .= " VALUES('{$post_tags}',{$post_category_id}, ";
        $query .= "'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}',$post_view_counts)";

        $create_post = mysqli_query($connection, $query);

        confirm($create_post);
    }

    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="bg-info well">Add Post</h3>
                            <form method="post" action="add_post.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="postTitle">Post Title</label>
                                    <input type="text" class="form-control" name="post_title" placeholder="Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="postcatid">Post Categories Id</label>
                                    <input type="text" class="form-control" name="post_category_id" placeholder="Post Categories Id">
                                </div>
                                <div class="form-group">
                                    <label for="post Title">Author</label>
                                    <input type="text" class="form-control" name="post_author" placeholder="Post Author">
                                </div>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="post Title">Post Status</label>
                                        <select class="form-control input-sm" name="post_status">
                                            <option value="null">Select</option>
                                            <option value="draft">Draft</option>
                                            <option value="Published">Published</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="post Image">Add Image</label>
                                    <input type="file" class="form-control" name="image" >
                                </div>
                                <div class="form-group">
                                    <label for="Post Title">Post Tags</label>
                                    <input type="text" class="form-control" name="post_tags" placeholder="Post tags">
                                </div>
                                <div class="form-group">
                                    <label for="Post Content">Post Content</label>
                                    <textarea class="form-control" name="post_content" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="submit" value="Submit" name="add_post"  class="btn btn-success btn-lg">
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="add_post" value="Cancel" class="btn btn-success btn-lg">
                                    </div>
                                </div>

                            </form>
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


