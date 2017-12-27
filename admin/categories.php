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

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                //validations
                                if($cat_title == "" || empty($cat_title)){
                                    $message = "fields Cant be Blank";
                                echo  '<div class="alert alert-danger">' . $message . '</div>';
                                }else{
                                    $query = "INSERT INTO categories (cat_title) ";
                                    $query .= "VALUE ('{$cat_title}')";

                                    $create_category_query = mysqli_query($connection,$query);
                                    if(!$create_category_query){
                                        die("something went wrong" . mysqli_error($connection));
                                    }else{
                                        $message = "Categories Added";
                                        echo  '<div class="alert alert-success">' . $message . '</div>';
                                    }
                                }

                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category" />
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories_table = mysqli_query($connection,$query);

                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Categories Titles</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    while ($row = mysqli_fetch_assoc($select_categories_table)){
                                    $categories_id = $row['cat_id'];
                                    $categories_title = $row["cat_title"];
                                    echo "<tr>";
                                    echo "<td>" . $categories_id . "</td>";
                                    echo "<td>" . $categories_title . "</td>";
                                    echo "</tr>";
                                }
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
