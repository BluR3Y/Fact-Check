<?php
    session_start();
?>
<?php

    include_once '../../db_connection.php';

    $database = new Database;
    $database->connect();

    if(isset($_POST['searchName'])){
        $givenName = $_POST['givenName'];
        
        $findUser = "SELECT * FROM users WHERE user_name='$givenName' OR user_email='$givenName'";
        $user_results = $database->query($findUser);

        if(mysqli_num_rows($user_results) > 0){
            $userInfo = $user_results->fetch_row();
            $_SESSION['username'] = $userInfo[1];
            $_SESSION['recov_question'] = $userInfo[5];
            $_SESSION['recov_answer'] = $userInfo[6];
            header("Location: ../verifyOwnership/verify.php");
            exit();
        }else{
            header("Location: recov_username.php?error=userNotFound");
            exit();
        }
    }else{
        header("Location: recov_username.php");
        exit();
    }

?>