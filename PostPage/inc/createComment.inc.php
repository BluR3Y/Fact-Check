<?php

    if(isset($_POST['submit']))
    {
        include_once '../../db_connection.php';

        $database = new Database;
        $database->connect();

        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $user_comment = $_POST['newComment'];

        $comment_stmt = "INSERT INTO comments (comment_user,comment_post,comment_text)VALUES($user_id,$post_id,'$user_comment');";
        $comment_status = $database->query($comment_stmt);
        
        $post_stmt = "UPDATE posts SET post_comments = post_comments + 1 WHERE post_id=$post_id;";
        $post_status = $database->query($post_stmt);

        header("Location: ../post.php?post=$post_id");

    }else{
        header("Location: ../../HomePage/home.php");
    }



?>