<?php
    include_once '../db_connection.php';

    header("Content-Type: application/json; charset=UFT-8");

    $info = file_get_contents('php://input');
    $data = json_decode($info,false);
    $action = $data->action;

    $database = new Database;
    $database->connect();

    if($action == "likePost")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id;

        $post_stmt = "UPDATE posts SET post_likes = post_likes + 1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $like_stmt = "INSERT INTO likes (like_post,like_user,like_status)VALUES($post_id,$user_id,1);";
        $like_status = $database->query($like_stmt);

    }elseif($action == "dislikePost")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id;  

        $post_stmt = "UPDATE posts SET post_dislikes = post_dislikes+1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $dislike_stmt = "INSERT INTO likes (like_post,like_user,like_status)VALUES($post_id,$user_id,0);";
        $dislike_status = $database->query($dislike_stmt);
    
    }elseif($action == "unlikePost")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        $post_stmt = "UPDATE posts SET post_likes = post_likes - 1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $unlike_stmt = "DELETE FROM likes WHERE like_post=$post_id AND like_user=$user_id;";
        $unlike_status = $database->query($unlike_stmt);
    }elseif($action == "undislikePost")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        $post_stmt = "UPDATE posts SET post_dislikes = post_dislikes - 1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $undislike_stmt = "DELETE FROM likes WHERE like_post=$post_id AND like_user=$user_id;";
        $undislike_status = $database->query($undislike_stmt);
    }elseif($action == "switchToDislike")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        $post_stmt = "UPDATE posts SET post_dislikes = post_dislikes + 1,post_likes = post_likes - 1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $liked_stmt = "UPDATE likes SET like_status = 0 WHERE like_post=$post_id AND like_user=$user_id;";
        $liked_status = $database->query($liked_stmt);

    }elseif($action == "switchToLike")
    {
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        $post_stmt = "UPDATE posts SET post_dislikes = post_dislikes - 1,post_likes = post_likes + 1 WHERE post_id = $post_id;";
        $post_status = $database->query($post_stmt);

        $liked_stmt = "UPDATE likes SET like_status = 1 WHERE like_post=$post_id AND like_user=$user_id;";
        $liked_status = $database->query($liked_stmt);
    }


?>