<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 27-12-2017
 * Time: 23:30
 */

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