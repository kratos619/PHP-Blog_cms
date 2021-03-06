<?php
// redirect to onther page
function redirec_to($page){
    header("Location:".$page);
    exit;
}

function ifitismethod($method=null){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }
    return false;
}

function islogin()
{
    if(isset($_SESSION['user_role'])){
        return true;
    }
    return false;
}

function checkifuserloginandredirect($location = null)
{
    if(isslogin()){
        redirec_to($location);
    }
}

function users_online(){
    global $connection;
    $session  = session_id();
    $time = time();
    $time_out_in_sec = 30;
    $time_out = $time - $time_out_in_sec;

    $query = "select * from users_online where session = '$session' ";
    $send_query = mysqli_query($connection,$query);
    $count = mysqli_num_rows($send_query);
    if ($count == NULL){
        mysqli_query($connection,"insert into users_online(session,time) values ('$session','$time')");
    }else{
        mysqli_query($connection,"update users_online set time='$time' where session='$session'");
    }

    $users_online_query = mysqli_query($connection,"select * from users_online where time > '$time_out'");
   return $count_users = mysqli_num_rows($users_online_query);

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

// function insert categories to categories.php
function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = escape_string($_POST['cat_title']);
        //validations
        if($cat_title == "" || empty($cat_title)){
            $message = "fields Cant be Blank";
            echo  '<div class="alert alert-danger">' . $message . '</div>';
        }else{
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUE ('{$cat_title}')";

            $create_category_query = mysqli_query($connection,$query);
            if(!$create_category_query){
                die("something went wrong" . mysqli_error($connection));
            }else{
                $message = "Categories Added";
                echo  '<div class="alert alert-success">' . $message . '</div>';
            }
        }

    }
}

//display all categories
function display_all_categories(){
    global $connection;
    $query = "SELECT * FROM categories ORDER BY cat_id ";
    $select_categories_table = mysqli_query($connection,$query);

    ?>
    <?php
    // display categories
    while ($row = mysqli_fetch_assoc($select_categories_table)){
        $categories_id = h($row['cat_id']) ;
        $categories_title = h($row["cat_title"]);
        echo "<tr>";
        echo "<td>" . $categories_title . "</td>";
        echo "<td>"."<a onclick='confirm('Are you sure want to delete it')' href='categories.php?delete_categories={$categories_id}'>Delete</a>" . " | " ."<a href='categories.php?edit_categories={$categories_id}'>Edit</a>" . "</td>";
        echo "</tr>";
    }

}

// delete selected categories
function delete_selected_categories(){
global $connection;
    $delete_categories = "delete_categories";
    if(isset($_GET[$delete_categories])){
        $selected_cat_id = escape_string($_GET[$delete_categories]);
        $query = "DELETE FROM categories WHERE cat_id = {$selected_cat_id }";
        $delete_cat = mysqli_query($connection,$query);
        redirec_to("categories.php");
    }
}

