<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php require_once "includes/db.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_POST['submit_search'])){
                  $search = escape_string($_POST['search']);

                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection,$query);
                    if(!$search_query){
                        die("query faild" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0){
                        echo "<h1>NO result</h1>";
                    }else {

                        while($row = mysqli_fetch_assoc($search_query)){
                            $post_title = h($row["post_title"]);
                            $post_author = h($row["post_author"]);
                            // $post_title = $row["post_title"];
                            $post_date  = h($row["post_date"]);
                            $post_content = h($row["post_content"]) ;
                            $post_tags = h($row["post_tags"]);
                            ?>
                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                            <hr>
                            <img class="img-responsive" src="images/image_1.jpg" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                            <?php
                        }
                    }
                }
                // end of while loop
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

<?php include "includes/footer.php"; ?>