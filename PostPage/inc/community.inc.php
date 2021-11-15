<?php
    
    if(isset($_POST['createCommunity']))
    {
        include_once '../../db_connection.php';
        $database = new Database;
        $database->connect();

        $name = $_POST['community_name'];
        $details = $_POST['community_description'];
        $user_id = $_POST['userID'];

        $communityStmt = "INSERT INTO communities(community_name,community_description,community_creator)VALUES('$name','$details',$user_id);";
        $communityStatus = $database->query($communityStmt);

    }

    header("Location: ../post.php");
    exit();

?>