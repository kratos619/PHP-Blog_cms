<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 05-01-2018
 * Time: 16:04
 */
session_start();
require_once "db.php";
require_once "public_functions.php";


if(isset($_POST['sign_up'])){
    $username = mY_prep($_POST['user_name']);
    $password = mY_prep($_POST['user_password']);

    if(!empty($username) && !empty($password)){

    $query = "select * from users WHERE user_name = '{$username}' or user_email = '{$username}' and user_password = '{$password}' ";
    $login_attempt = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($login_attempt)){
        //$user_first_name = $row['user_first_name'];
        $user_first_name = h($row['user_first_name']);
        $user_last_name = h($row['user_last_name']);
        $user_name = h($row['user_name']);
        $user_password = h($row['user_password']);
        $user_email = h($row['user_email']);
        $user_role = h($row['user_role']);
        $user_id = h($row['user_id']);

    }
    
    }else {
        redirec_to('index.php');
    }

   // $password = crypt($password,$user_password);
// password_verify(user_enter_password , password_come_from_db)

   if (password_verify($password, $user_password)){
        $_SESSION['username'] = $user_name;
        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name'] = $user_last_name;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_id'] = $user_id;
        redirec_to("../admin/index.php");
    }else{
        redirec_to("../index.php");
    }

}