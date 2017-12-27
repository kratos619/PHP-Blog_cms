<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 26-12-2017
 * Time: 23:21
 */
?>
<?php include "includes/header.php";?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
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
                            <form action="">
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Categories Titles</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Baseball Categorys</td>
                                    <td>Baseball Categorys</td>

                                </tr>
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

    <?php include "includes/footer.php"; ?>
