<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php require_once "includes/db.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
              
                </h1>
                

                <?php
                
                if(isset($_GET['page'])){
                   $page = $_GET['page'];
                }else{
                    
                    $page = "";
                }
                
                if($page == "" || $page == 1){
                    $page_1 = 0;
                    
                }else{
                    $page_1 = ($page * 5) -5;
                }
                
                
                
                // count posts
                $query = "select * from posts ";
                $find_count = mysqli_query($connection, $query);
                confirm_connection($find_count);
                $count = mysqli_num_rows($find_count);
                
                $count = ceil($count / 5);
                
               
                
                $query = "select * from posts limit {$page_1}, 5";
                $select_all_post_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_post_query)){
                    $post_id = h($row['post_id']);
                    $post_title = h($row["post_title"]);
                    $post_author = h($row["post_author"]);
                   // $post_title = $row["post_title"];
                    $post_date  = h($row["post_date"]);
                    $post_content = $row["post_content"];
                    $post_tags =  h($row["post_tags"]);
                    $post_image = h($row['post_image']);
             ?>
               
                

                <!-- First Blog Post -->
                <h2>
                    <?php echo $count; ?>
                    
                    <a href="post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?full_post=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    <?php
                } // end of while loop
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

        <ul class="pager">
            
            <?php
            for($i = 1 ; $i <= $count; $i++){
                ?>
                <?php
                if ($i == $page){ ?>

                    <li><a class="active-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php
                }else {
                    ?>
                    <li><a  href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
            <?php
            }
            
            ?>
            
        </ul>
        
<?php include "includes/footer.php"; ?>