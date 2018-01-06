<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 31-12-2017
 * Time: 06:18
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 28-12-2017
 * Time: 16:24
 */
?>
<?php include "includes/admin_header.php";?>
<?php
$userrole = $_SESSION['user_role'];
if($userrole === 'subscriber'){
    redirec_to("index.php");
}
?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <?php include "includes/page_header.php";?>

                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                        }else{
                        $source = "";
                        }
                        switch ($source){
                            case 'add_users':
                                include "includes/add_users.php";
                                break;
                            case 'edit_users':
                                include "includes/edit_users.php";
                                break;
                            default:
                                include "includes/view_all_users.php";

                        }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>





