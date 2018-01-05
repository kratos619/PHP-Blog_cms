<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 05-01-2018
 * Time: 16:04
 */

require_once "db.php";
require_once "public_functions.php";

function mY_prep($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

if(isset($_POST['sign_up'])){
    $username = mY_prep($_POST['user_name']);
    $password = mY_prep($_POST['user_password']);

    $query = "select * from users WHERE user_name = '{$username}' or user_email = '{$username}' and user_password = '{$password}' ";
    $login_attempt = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($login_attempt)){
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
    }

    if($username !== $user_name or $username !== $user_email and $password !== $user_password){
        redirec_to("index.php");
    }elseif($username === $user_email and $password === $user_password){
        redirec_to("../admin/index.php");
    }elseif ($username === $user_name and $password === $user_password){
        redirec_to("../admin/index.php");
    }else{
        //edirec_to("../index.php");
    }

}