 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
    <?php
    // if(isset($_POST['submit'])){
    //     $firstname = h($_POST['firstname']);
    //     $lastname = h($_POST['lastname']);
    //     $email = h($_POST['email']);
    //     $message = h($_POST['message']);
    // }
    
    ?>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact Us</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        
                        <div class="form-group">
                            <label for="username" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="username" class="form-control" placeholder="Last Name">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control"  name="message" id="" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send Message">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
