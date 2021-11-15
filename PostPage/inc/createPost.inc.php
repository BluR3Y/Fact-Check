<?php

    if(isset($_POST['createPost']))
    {
        include_once '../../db_connection.php';
        $database = new Database;
        $database->connect();

        $title = $_POST['title'];
        $text = $_POST['post'];
        $topic = $_POST['topic'];
        $user_id = $_POST['userID'];
        $community_id = $_POST['community'];
        
        $postStmt = "INSERT INTO posts(post_creator,post_community,post_title,post_details,post_topic)VALUES($user_id,$community_id,'$title','$text','$topic');";
        $postStatus = $database->query($postStmt);
        
        $commStmt = "UPDATE communities SET community_num_posts = community_num_posts + 1 WHERE community_id = $community_id;";
        $commStatus = $database->query($commStmt);
    }

    header("Location: ../post.php");
    exit();
?>