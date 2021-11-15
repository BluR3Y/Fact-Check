<?php

    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    $userLike_stmt = "SELECT like_status FROM likes WHERE like_post=".$postInfo[0]." AND like_user=".$_SESSION['user_id'].";";
    $userLike_status = $database->query($userLike_stmt);

    if(mysqli_num_rows($userLike_status) >0)
    {
        $userLike_post = $userLike_status->fetch_assoc()['like_status'];
    }else{
        $userLike_post = -1;
    }



?>