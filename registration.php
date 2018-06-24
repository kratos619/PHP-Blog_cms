 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                <?php 
                if(isset($_POST['submit'])){ 
                    $username = mY_prep($_POST['username']);
                    $email = mY_prep($_POST['email']);
                    $password = mY_prep($_POST['password']);
                  $firstname = mY_prep($_POST['firstname']);
                    $lastname = mY_prep($_POST['lastname']);
                    $userrole = "subscriber";
                  
                     //new encrypt password
                    $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
                
                    // $query = "select user_salt from users";
                    // $select_rand_salt = mysqli_query($connection, $query);
                    // confirm_connection($select_rand_salt);
                    // $row = mysqli_fetch_array($select_rand_salt);
                    // $salt = $row['user_salt'];
                    
                   
                    
                   if(empty($email) and empty($username) and empty($password)){
                       echo "Fields cannot be empty";
                   }else{
                      $query  = "insert into users (user_name,user_password,user_first_name,user_last_name,user_email,user_role) values";
                      $query .= "('{$username}','{$password}','{$firstname}','{$lastname}','{$email}','{$userrole}')";
                    $registerUser = mysqli_query($connection, $query);
                    confirm_connection($registerUser);
                    
                     $message = "user Successfully created";
                   }
                         
                }
                $message = "";
                ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h1><?php echo $message ; ?></h1>
                        <div class="form-group">
                            <label for="username" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="username" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
