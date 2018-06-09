<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 25-12-2017
 * Time: 18:16
 */

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = null;
$db['db_name'] = 'blog_cms';

foreach ($db as $item => $value){
    define(strtoupper($item),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($connection){

}