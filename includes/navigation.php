
<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 25-12-2017
 * Time: 21:53
 */
//echo basename($_SERVER[PHP_SELF]);
?>
<?php session_start(); ?>
<?php require_once "db.php";?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">


        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/PHP-Blog_cms/">MY CMS</a>
        </div>




        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $query = "select * from categories";
                $select_all_categories_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                    $cat_title = $row["cat_title"];
                  $cat_id = $row['cat_id'];
                    echo "<li><a href='cat.php?cat_type=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
                <li><a href="admin">Admin</a></li>
                <?php
                if(isset($_SESSION['user_role'])){
                    if(isset($_GET['full_post'])){
                        $selected_post_id =  $_GET['full_post'];

                echo   "<li><a href='admin/edit_post.php?edit_post={$selected_post_id}'>Edit This Post</a></li>";

                    }

                }

                ?>
<li><a href="registration.php">Registration</a></li>
<li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

