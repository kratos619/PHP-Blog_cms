
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php

                if(isset($_GET['full_post'])) {
                    $selected_post_id = $_GET['full_post'];
                    $query = "SELECT * FROM posts WHERE post_id = {$selected_post_id}";
                    $select_all_post_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_post_query)){
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        // $post_title = $row["post_title"];
                        $post_date = $row["post_date"];
                        $post_content = $row["post_content"];
                        $post_tags = $row["post_tags"];
                        $post_image = $row['post_image'];

                   ?>

                <!-- Blog Post -->

                <!-- Title -->
                    <h3><?php echo $post_title; ?></h3>
                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                    <p class="lead"><?php echo $post_content; ?> </p>
                <hr>

                <!-- Blog Comments -->

                        <?php
                    }
                }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" role="form">
                        <label>Name</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <label>Email</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <label>comment</label>
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Comment</button>
                    </form>
                    <?php
                    if(isset($_POST['submit_comment'])  && isset($_GET['full_post'])){
                        $selected_post_id = $_GET['full_post'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        
                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                            
                        $query = "insert into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, commetn_date) ";
                        $query .= "VALUES ({$selected_post_id} , '{$comment_author}', '{$comment_email}', '{$comment_content}','unapproved',now())";
                        $create_comment = mysqli_query($connection, $query);

                        confirm_connection($create_comment);

                        }else{
                            echo "<script>alert('fields can not be empty');</script>";
                        }
                        
                    }
                    ?>
                </div>
                <!-- Comment -->
                <?php
                $query = "select * from comments WHERE comment_post_id = {$selected_post_id } AND comment_status = 'approve'";
                $display_comment = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($display_comment)){
                    $comment_content = $row['comment_content'];
                    $commetn_date = $row['commetn_date'];
                    $comment_author = $row['comment_author'];
                ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author; ?>
                                <small><?php echo $commetn_date;?></small>
                            </h4>
                        <?php echo $comment_content; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
