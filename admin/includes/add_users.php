<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 29-12-2017
 * Time: 07:21
 */
?>
<div id="wrapper">
    <!-- Navigation -->
    <?php
    if(isset($_POST['create_user'])){
        $user_name = $_POST['user_name'];
        $user_first_name = $_POST['user_first_name'];
        $user_last_name = $_POST['user_last_name'];
        $user_email = $_POST['user_email'];
        //$user_image = $_POST['user_image'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        
        // //add salt
        // $query = "select user_salt from users";
        // $select_rand_salt = mysqli_query($connection, $query);
        // confirm_connection($select_rand_salt);
        // $row = mysqli_fetch_assoc($select_rand_salt);
        // $salt = $row['user_salt'];
        
        //crypt password
        $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
        
        $query = "insert into users (user_name, user_password, user_first_name, user_last_name, user_email,user_role) ";
        $query .= "values ('{$user_name}','{$user_password}','{$user_first_name}','{$user_last_name}','{$user_email}','{$user_role}')";

        $create_user = mysqli_query($connection, $query);
        confirm_connection($create_user);
        redirec_to("users.php");
    }
    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="bg-info well">Add Users</h3>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="user_first_name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="user_last_name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" name="user_name" placeholder="user name">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" name="user_email" placeholder="Email">
                                </div>
                                <div class="row">
                                <div class="col-sm-3" >
                                    <label>Select Role</label>
                                <select name="user_role" class="form-group form-control">
                                    <option value="null" >Select</option>
                                    <option value="Admin" >Admin</option>
                                    <option value="Subscriber" >Subscriber</option>
                                </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" name="user_password" placeholder="Password">
                                </div>



                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="submit" value="Submit" name="create_user"  class="btn btn-success btn-lg">
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="add_post" value="Cancel" class="btn btn-success btn-lg">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

    <!-- /#page-wrapper -->

