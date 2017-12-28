<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 27-12-2017
 * Time: 23:30
 */

// redirect to onther page
function redirec_to($page){
    header("Location:".$page);
}

// function insert categories to categories.php
function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
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
        $categories_id = $row['cat_id'];
        $categories_title = $row["cat_title"];
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
        $selected_cat_id = $_GET[$delete_categories];
        $query = "DELETE FROM categories WHERE cat_id = {$selected_cat_id }";
        $delete_cat = mysqli_query($connection,$query);
        redirec_to("categories.php");
    }
}

