<?php
    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    $postInfo_stmt = "SELECT * FROM posts WHERE post_id=".$_SESSION['last_post'].";";
    $stmt_status = $database->query($postInfo_stmt);
    while($row=$stmt_status->fetch_assoc())
    {
        $post_id = $row['post_id'];
        $post_creator = $row['post_creator'];
        $post_community = $row['post_community'];
        $date_created = $row['date_created'];
        $post_title = $row['post_title'];
        $post_details = $row['post_details'];
        $post_topic = $row['post_topic'];
        $post_likes = $row['post_likes'];
        $post_dislikes = $row['post_dislikes'];
        $post_comments = $row['post_comments'];

        $creator_stmt = "SELECT user_name FROM users WHERE user_id=$post_creator;";
        $creator_status = $database->query($creator_stmt);
        $post_creator_name = $creator_status->fetch_assoc()['user_name'];

        $community_stmt = "SELECT community_name FROM communities WHERE community_id=$post_community;";
        $community_status = $database->query($community_stmt);
        $post_community_name = $community_status->fetch_assoc()['community_name'];

        $postInfo = array($post_id,$post_creator,$post_creator_name,$post_community,$post_community_name,$date_created,$post_title,$post_details,$post_topic,$post_likes,$post_dislikes,$post_comments);
    }

    $commentInfo = array();

    $comments_stmt = "SELECT * FROM comments WHERE comment_post =".$_SESSION['last_post'].";";
    $comment_status = $database->query($comments_stmt);
    while($row=$comment_status->fetch_assoc())
    {
        $comment_id = $row['comment_id'];
        $comment_user = $row['comment_user'];
        $comment_text = $row['comment_text'];
        $date_created = $row['date_created'];

        $comment_user_name_stmt = "SELECT user_name FROM users WHERE user_id=$comment_user;";
        $name_status = $database->query($comment_user_name_stmt);
        $comment_user_name = $name_status->fetch_assoc()['user_name'];

        array_push($commentInfo, array($comment_id,$comment_user,$comment_user_name,$comment_text,$date_created));
    }

?>