<?php
/**
 * Created by PhpStorm.
 * User: Gaurav
 * Date: 31-12-2017
 * Time: 06:34
 */
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Authors</th>
        <th>Comment</th>
        <th>email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $display_comments = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($display_comments)){
        $comment_id = h($row['comment_id']);
        $comment_post_id = h($row['comment_post_id']);
        $comment_author = h($row['comment_author']);
        $comment_content  = h($row['comment_content']);
        $comment_email = h($row['comment_email']);
        $comment_status = h($row['comment_status']);
        $comment_date = h($row['commetn_date']);
        ?>
        <tr>
            <td><?php echo $comment_id; ?></td>
            <td><?php echo $comment_author; ?></td>
            <td><?php echo $comment_content; ?></td>
            <td><?php echo $comment_email; ?></td>
            <td><?php echo $comment_status; ?></td>
            <?php
            $query = "select * from posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = h($row['post_id']);
                $post_title = h($row['post_title']);
                ?>

                <td><a href="../post.php?full_post=<?php echo $post_id; ?>"> <?php echo $post_title; ?> </a></td>
                <?php
            }
            ?>
            <td><?php echo $comment_date; ?></td>
            <td><a href="comments.php?approve=<?php echo $comment_id; ?>">Approve</a> | <a
                    href="comments.php?unapprove=<?php echo $comment_id; ?>">Un-Approve</a> | <a
                    href="comments.php?delete_comment=<?php echo $comment_id; ?>">Delete</a> </td>
        </tr>
        <?php
    }
    ?>
    <?php
//    if(isset($_GET['delete_post'])){
//        $delete_selected_post_id = $_GET['delete_post'];
//        $query = "delete from posts WHERE post_id = {$delete_selected_post_id}";
//        $delete_post = mysqli_query($connection, $query);
//        confirm_connection($delete_post);
//        redirec_to("posts.php");
//    }
    ?>
    </tbody>
</table>
<?php
if(isset($_GET['approve'])){
    $selected_comment_id = escape_string($_GET['approve']);
    $query = "update comments set comment_status = 'approve' WHERE comment_id = {$selected_comment_id}";
    $approve_comments = mysqli_query($connection, $query);
    redirec_to("comments.php");
}

if(isset($_GET['unapprove'])){
    $selected_comment_id = escape_string($_GET['unapprove']);
    $query = "update comments set comment_status = 'unapprove' WHERE comment_id = {$selected_comment_id}";
    $unapprove_comments = mysqli_query($connection, $query);
    redirec_to("comments.php");
}

if(isset($_GET['delete_comment'])){
    $selected_comment_id = escape_string($_GET['delete_comment']);
    $query = "delete from comments WHERE comment_id = {$selected_comment_id}";
$delete_comment = mysqli_query($connection,$query);
redirec_to("comments.php");
}
?>