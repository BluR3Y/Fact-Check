<?php
    include_once '../../db_connection.php';

    if(isset($_POST['joinComm_submit'])){
        $database = new Database;
        $database->connect();

        $user_id = $_POST['user_id'];
        $comm_id = $_POST['joinComm_id'];
        
        $joinStmt = "INSERT INTO followings (following_user,following_community)VALUES($user_id,$comm_id);";
        $stmtStatus = $database->query($joinStmt);

        $updateCommFollowing = "UPDATE communities SET community_num_followers = community_num_followers +1 WHERE community_id = $comm_id";
        $updateStatus = $database->query($updateCommFollowing);

    }

    header("Location: ../post.php");
    exit();

?>