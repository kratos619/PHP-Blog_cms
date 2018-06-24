<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 26-12-2017
 * Time: 23:21
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
                        <div class="col-xs-6">
                            <?php
                            // insert categories
                            insert_categories();
                            ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category" />
                                </div>
                            </form>


                                    <?php
                                    // edit post display selected title
                                    if(isset($_GET['edit_categories'])){
                                        $selected_cat_id = $_GET['edit_categories'];
                                        $query = "SELECT * FROM categories WHERE cat_id = {$selected_cat_id}";
                                        $select_categories_id = mysqli_query($connection,$query);
                                        // display selected categories
                                        while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                            $categories_id = h($row['cat_id']);
                                            $categories_title = h($row["cat_title"]);

                                    ?>

                            <form action="" method="post">
                                <?php
                                // update selected categories
                                if(isset($_POST['update'])){
                                    $edit_cat_title = $_POST['edit_cat_title'];
                                    $query = "update categories set cat_title = '{$edit_cat_title}' where cat_id = {$selected_cat_id} ";
                                    $update_categories = mysqli_query($connection,$query);
                                    if(!$update_categories){
                                        die("something went wrong" . mysqli_error($connection));
                                    }else{
                                        $message = "Categories Update";
                                        echo  '<div class="alert alert-success">' . $message . '</div>';
                                        redirec_to("categories.php");
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label for="cat-title">Edit Category</label>
                                            <input type="text" value="<?php echo $categories_title;?>" class="form-control" name="edit_cat_title" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Edit Category" />
                                </div>
                            </form>
                                    <?php
                                        }
                                    }

                                    ?>



                        </div>
                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Categories Titles</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // display all categories in table
                                echo display_all_categories();
                                ?>

                                <?php
                                // delete categories
                                delete_selected_categories();
                                ?>

                                </tbody>
                            </table>
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
