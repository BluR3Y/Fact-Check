<?php
    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    $_SESSION['user_communities'] = array();
    $_SESSION['discover_comms'] = array();
    $_SESSION['user_recent_posts'] = array();

    $getFollowings = "SELECT following_community FROM followings WHERE following_user=".$_SESSION['user_id'].";";
    $FollowingStatus = $database->query($getFollowings);
    while($row=$FollowingStatus->fetch_assoc())
    {
        $comm_id = $row['following_community'];

        $getCommName = "SELECT community_name FROM communities WHERE community_id=$comm_id";
        $CommNameStatus = $database->query($getCommName);
        $commInfo = $CommNameStatus->fetch_assoc();
        $comm_name = $commInfo['community_name'];

        array_push($_SESSION['user_communities'],array($comm_id,$comm_name));
    }
    
    $Discov_Stmt = "SELECT * FROM communities WHERE community_id NOT IN (SELECT following_community FROM followings WHERE following_user=".$_SESSION['user_id'].");";
    $stmtStatus = $database->query($Discov_Stmt);
    while($row=$stmtStatus->fetch_assoc())
    {
        array_push($_SESSION['discover_comms'], array($row['community_id'],$row['community_name'],$row['community_description'],$row['community_num_posts'],$row['community_num_followers']));
        
    }
    
    $commPosts = "SELECT * FROM posts WHERE post_community IN (SELECT following_community FROM followings WHERE following_user=".$_SESSION['user_id'].") ORDER BY date_created DESC;";
    $commPosts_status = $database->query($commPosts);
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
        $post_creator = $nameStatus->fetch_assoc()['user_name'];

        $getCommName = "SELECT community_name FROM communities WHERE community_id=$post_comm;";
        $commNameStatus = $database->query($getCommName);
        $post_comm = $commNameStatus->fetch_assoc()['community_name'];


        array_push($_SESSION['user_recent_posts'],array($post_id,$post_creator,$post_comm,$post_date_created,$post_title,$post_details,$post_topic,$post_likes,$post_dislikes,$post_comments));
    }
?>