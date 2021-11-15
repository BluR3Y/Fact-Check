<?php

    session_start();

    if(isset($_POST['submit']))
    {
        include_once '../../db_connection.php';

        $database = new Database;
        $database->connect();

        $results = array();

        $searchStmt = explode(" ",$_POST['Search']);
        $beginStmt = "SELECT * FROM posts WHERE post_details ";
        foreach($searchStmt as $key=>&$val)
        {
            $addedStmt;
            if($key==0)
            {
                $addedStmt = "LIKE '%$val%' ";
            }else{
                $addedStmt = "OR post_details LIKE '%$val%' ";
            }
            $beginStmt = $beginStmt.$addedStmt;
        }
        $beginStmt = $beginStmt. ";";

        $search_status= $database->query($beginStmt);
        while($row=$search_status->fetch_assoc())
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

            $getCreatorName = "SELECT user_name FROM users WHERE user_id=$post_creator;";
            $nameStatus = $database->query($getCreatorName);
            $post_creator_name = $nameStatus->fetch_assoc()['user_name'];

            $getCommName = "SELECT community_name FROM communities WHERE community_id=$post_community;";
            $commNameStatus = $database->query($getCommName);
            $post_community_name = $commNameStatus->fetch_assoc()['community_name'];
            

            array_push($results, array($post_id,$post_creator,$post_creator_name,$post_community,$post_community_name,$date_created,$post_title,$post_details,$post_topic,$post_likes,$post_dislikes,$post_comments));
        }

        $_SESSION['search_results'] = $results;
        $_SESSION['search_stmt'] = $_POST['Search'];

        header("Location: ../../ResultsPage/results.php");

    }else{
        header("Location: ../home.php");
        exit();
    }



?>