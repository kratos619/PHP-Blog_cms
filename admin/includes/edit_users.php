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
    <div class="row">
        <div class="col-md-8">
            <h3 class="bg-info well">Add Users</h3>
    <?php
    if(isset($_GET['user_id'])){
    $selected_user = $_GET['user_id'];
    $query = "select * from users WHERE user_id = {$selected_user} ";
   $display_selected_user = mysqli_query($connection, $query);
        confirm_connection($display_selected_user);
   while ($row = mysqli_fetch_assoc($display_selected_user)){
       $user_id = $row['user_id'];
       $user_name = $row['user_name'];
       $user_first_name = $row['user_first_name'];
       $user_last_name  = $row['user_last_name'];
       $user_email = $row['user_email'];
       $user_role = $row['user_role'];
       $user_image = $row['user_image'];

       ?>
            <form method="post" action="users.php?source=edit_users&user_id=<?php echo $selected_user; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" value="<?php echo $user_first_name; ?>" name="user_first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $user_last_name; ?>" name="user_last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" value="<?php echo $user_name; ?>" name="user_name" placeholder="user name">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email" placeholder="Email">
                </div>
                <div class="row">
                    <div class="col-sm-3" >
                        <label>Select Role</label>
                        <select name="user_role"  class="form-group form-control">
                            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                            <?php
                            if($user_role === 'admin'){
                                echo "<option value='subscriber' >" . "Subscriber" . "</option>";

                            } else if($user_role = 'subscriber'){
                                echo "<option value='admin' >" . "Admin" . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" value="<?php  ?>" class="form-control" name="user_password" placeholder="Password">
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <input type="submit" value="Submit" name="update_user"  class="btn btn-success btn-lg">
                    </div>
                    <div class="col-xs-2">
                        <a href="users.php">
                            <input value="Cancel"  class="btn btn-success btn-lg">
                        </a>
                    </div>
                </div>
            </form>
       <?php
   }
    }
    ?>
            <?php
            if(isset($_POST['update_user'])){
                $user_name = $_POST['user_name'];
                $user_first_name = $_POST['user_first_name'];
                $user_last_name = $_POST['user_last_name'];
                $user_email = $_POST['user_email'];
                //$user_image = $_POST['user_image'];
                $user_role = $_POST['user_role'];
                $user_password = $_POST['user_password'];

                $query = "update users set  user_name = '{$user_name}', user_first_name = '{$user_first_name}', user_last_name = '{$user_last_name}', user_email = '{$user_email}', user_role = '{$user_role}', user_password = '{$user_password}' WHERE user_id = {$selected_user} ";

                $create_user = mysqli_query($connection, $query);
                confirm_connection($create_user);
                redirec_to("users.php");
            }
            ?>
        </div>
    </div>
