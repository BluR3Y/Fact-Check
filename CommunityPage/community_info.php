<?php

    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    $communityInfo = array();

    $community_stmt = "SELECT * FROM communities WHERE community_id=".$_SESSION['last_community'].";";
    $community_status = $database->query($community_stmt);
    while($row = $community_status->fetch_assoc())
    {
        $community_id = $row['community_id'];
        $community_name = $row['community_name'];
        $community_date_created = $row['community_date_created'];
        $community_description = $row['community_description'];
        $community_creator = $row['community_creator'];
        $community_num_posts = $row['community_num_posts'];
        $community_num_followers = $row['community_num_followers'];

        $creator_stmt = "SELECT user_name FROM users WHERE user_id=$community_creator;";
        $creator_status = $database->query($creator_stmt);
        $community_creator_name = $creator_status->fetch_assoc()['user_name'];

        array_push($communityInfo, $community_id,$community_name, $community_date_created,$community_description,$community_creator,$community_creator_name,$community_num_posts,$community_num_followers);
    }

    $commPosts = array();

    $commPosts_stmt = "SELECT * FROM posts WHERE post_community=".$communityInfo[0]." ORDER BY date_created DESC;";
    $commPosts_status = $database->query($commPosts_stmt);
    while($row=$commPosts_status->fetch_assoc())
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
        $post_creator_name = $nameStatus->fetch_assoc()['user_name'];

        $getCommName = "SELECT community_name FROM communities WHERE community_id=$post_comm;";
        $commNameStatus = $database->query($getCommName);
        $post_comm_name = $commNameStatus->fetch_assoc()['community_name'];


        array_push($commPosts,array($post_id,$post_creator,$post_creator_name,$post_comm,$post_comm_name,$post_date_created,$post_title,$post_details,$post_topic,$post_likes,$post_dislikes,$post_comments));
    }

    $commFollowers = array();

    $followers_stmt = "SELECT user_name FROM users WHERE user_id IN (SELECT following_user FROM followings WHERE following_community=".$communityInfo[0].");";
    $followers_status = $database->query($followers_stmt);
    while($row=$followers_status->fetch_assoc())
    {
        array_push($commFollowers, $row['user_name']);
    }

?>