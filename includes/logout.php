<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 06-01-2018
 * Time: 05:46
 */
session_start();
require_once "db.php";
require_once "public_functions.php";
$_SESSION['username'] = null;
$_SESSION['user_first_name'] = null;
$_SESSION['user_last_name'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_email'] = null;
redirec_to("../index.php");