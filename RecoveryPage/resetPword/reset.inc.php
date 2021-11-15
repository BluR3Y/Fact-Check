<?php
    session_start();
?>
<?php
    include_once '../../db_connection.php';
    $database = new Database;
    $database->connect();

    if(isset($_POST['submit'])){
        $newPword = $_POST['newPword'];
        if(strlen($newPword) >= 6){
            $updatePword = "Update users SET user_password='$newPword', user_attempts=0 WHERE user_name='".$_SESSION['username']."'";
            $Pword_results = $database->query($updatePword);

            if($Pword_results)
            {
                header("Location: ../../LoginPage/login.php?passedName=".$_SESSION['username']."");
                session_destroy();
                exit();
            }else{
                header("Location: reset.php?error=unknown");
                exit();
            }
        }else{
            header("Location: reset.php?error=invalidPword");
            exit();
        }
    }else{
        header("Location: ../recov_username/recov_username.php");
        exit();
        session_destroy();
    }
?>