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

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Authors</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>comments</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM posts";
                                $display_posts = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($display_posts)){
                                    $post_id = $row['post_id'];
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
                                <tr>
                                    <td><?php echo $post_id; ?></td>
                                    <td><?php echo $post_author; ?></td>
                                    <td><?php echo $post_title; ?></td>
                                    <td><?php echo $post_category_id; ?></td>
                                    <td><?php echo $post_status; ?></td>
                                    <td><?php echo $post_image; ?></td>
                                    <td><?php echo $post_tags; ?></td>
                                    <td><?php echo $post_comments; ?></td>
                                    <td><?php echo $post_date; ?></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>

