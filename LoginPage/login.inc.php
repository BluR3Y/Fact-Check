<?php
    session_start();
?>
<?php
    include_once '../db_connection.php';

    $database = new Database;
    $database->connect();

    if(isset($_POST['LoginUser']))
    {
        $username = $_POST['username'];
        $password = $_POST['pword'];
        $directPage = $_POST['directPage'];

        if(strlen($username) != 0 && strlen($password) != 0)
        {
            $stmt = "SELECT * FROM users WHERE user_name='$username'";
            $status = $database->query($stmt);

            if(mysqli_num_rows($status) != 0)
            {
                $givenInfo = $status->fetch_assoc();
                
                if($givenInfo['user_attempts'] <3){
                    if( $password == $givenInfo['user_password'])
                    {
                        $_SESSION['user_id'] = $givenInfo['user_id'];
                        $_SESSION['user_email'] = $givenInfo['user_email'];
                        $_SESSION['user_name'] = $givenInfo['user_name'];
                        $_SESSION['user_img'] = $givenInfo['user_img'];

                        if(isset($_SESSION['last_page']))
                        {
                            if($_SESSION['last_page'] == "home"){
                                header("Location: ../HomePage/home.php");
                            }else if($_SESSION['last_page'] == "post"){
                                header("Location: ../PostPage/post.php");
                            }elseif($_SESSION['last_page'] == "community")
                            {
                                header("Location: ../CommunityPage/community.php");
                            }
                        }else{
                            header("Location: ../HomePage/home.php");   
                        }

                    }else{
                        $updateAttempts = "UPDATE users SET user_attempts = user_attempts + 1 WHERE user_id = ".$givenInfo['user_id'].";";
                        $updateAttempts = $database->query($updateAttempts);
    
                        header("Location: login.php?error=incorrectPword");
                        exit();
                    }
                }else{
                    header("Location: login.php?error=maxAttempts");
                    exit();
                }
            }else{
                header("Location: login.php?error=userDNE");
                exit();
            }
        }else{
            header("Location: login.php?error=emptyInput");
            exit();
        }
    }else{
        header("Location: login.php");
        exit();
    }

?>