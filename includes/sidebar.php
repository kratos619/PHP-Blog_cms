<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 25-12-2017
 * Time: 22:06
 */
?>
<?php
require_once "db.php";
?>
<div class ="col-md-4">



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit_search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                </span>

         </div><!-- /.input-group -->
        </form> <!-- /.form group -->
    </div>
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="user_name" type="text" class="form-control" placeholder="Username or email" />
            </div><!-- /.input-group -->
            <div class="form-group">
                <input name="user_password" type="password" class="form-control" placeholder="password" />
            </div><!-- /.input-group -->
            <input type="submit" value="Sign Up" name="sign_up" class="btn btn-primary" >
        </form> <!-- /.form group -->
    </div>

    <?php

                $query = "select * from categories";
                $select_categories_sidebar = mysqli_query($connection,$query);

                ?>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                        $cat_title = $row["cat_title"];
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>
</div>
