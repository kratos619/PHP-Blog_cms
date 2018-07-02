<?php

/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 27-12-2017
 * Time: 23:30
 */

function islogin()
{
    if(isset($_SESSION['user_role'])){
        return true;
    }
    return false;
}


function ifitismethod($method= null){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }
    return false;
}



function checkifuserloginandredirect($location = null)
{
    if(islogin()){
        redirec_to($location);
    }
}
function mY_prep($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function h($string){
return htmlspecialchars($string);
}


function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function confirm_connection($result){
    global $connection;
    if(!$result){
        die("something went wrong" . mysqli_error($connection));
    }
}

// redirect to onther page
function redirec_to($page){
    header("Location:".$page);
}

function login_user($username , $password){
    global $connection;
$username = trim($username);
$password  = trim($password);

    $username = mY_prep($_POST['username']);
    $password = mY_prep($_POST['password']);

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
 // $password = crypt($password,$user_password);
// password_verify(user_enter_password , password_come_from_db)

if (password_verify($password, $user_password)){
    $_SESSION['username'] = $user_name;
    $_SESSION['user_first_name'] = $user_first_name;
    $_SESSION['user_last_name'] = $user_last_name;
    $_SESSION['user_role'] = $user_role;
    $_SESSION['user_id'] = $user_id;
    redirec_to("/PHP-Blog_cms/admin/index.php");
}else{
    return false;
}
return true;
}else{
    return false;
}
}