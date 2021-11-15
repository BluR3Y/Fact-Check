<?php

    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    $_SESSION['discover_comms'] = array();
    $_SESSION['guest_recent_posts'] = array();

    $Discov_Stmt = "SELECT *, MAX(community_num_followers) FROM communities GROUP BY community_id LIMIT 5;";
    $Discov_Status = $database->query($Discov_Stmt);
    while($row=$Discov_Status->fetch_assoc())
    {
        $comm_id = $row['community_id'];
        $comm_name = $row['community_name'];
        $comm_descr = $row['community_description'];
        $comm_posts = $row['community_num_posts'];
        $comm_followers = $row['community_num_followers'];

        array_push($_SESSION['discover_comms'],array($comm_id,$comm_name,$comm_descr,$comm_posts,$comm_followers));
    }

    $recentposts_Stmt = "SELECT * FROM posts ORDER BY date_created DESC LIMIT 5";
    $recentposts_status = $database->query($recentposts_Stmt);
    while($row=$recentposts_status->fetch_assoc())
    {
        $post_id = $row['post_id'];
        $post_creator = $row['post_creator'];
        $post_comm = $row['post_community'];
        $post_date_created = $row['date_created'];
        $post_title = $row['post_title'];
        $post_details = $row['post_details'];
        $post_topic = $row['post_topic'];
        $post_likes = $row['post_likes'];
        $post_dislikes = $row['post_dislikes'];
        $post_comments = $row['post_comments'];

        $getCreatorName = "SELECT user_name FROM users WHERE user_id=$post_creator;";
        $nameStatus = $database->query($getCreatorName);
        $post_creator = $nameStatus->fetch_assoc()['user_name'];

        $getCommName = "SELECT community_name FROM communities WHERE community_id=$post_comm;";
        $commNameStatus = $database->query($getCommName);
        $post_comm = $commNameStatus->fetch_assoc()['community_name'];

        array_push($_SESSION['guest_recent_posts'], array($post_id,$post_creator,$post_comm,$post_date_created,$post_title,$post_details,$post_topic,$post_likes,$post_dislikes,$post_comments));
        
    }

?>