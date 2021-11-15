<?php

    include_once '../db_connection.php';
    include_once 'functions.inc.php';

    $database = new Database;
    $database->connect();

    if(isset($_POST['createUser'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pword = $_POST['pword'];
        $recov_question = $_POST['recov_question'];
        $recov_answer = $_POST['recov_answer'];

        if(!emptyValues($username,$email,$pword,$recov_question,$recov_answer)){
            if(validUsername($username))
            {
                $available_name = "SELECT * FROM users WHERE user_name='$username'";
                $name_results = $database->query($available_name);
                if(mysqli_num_rows($name_results) == 0)
                {
                    if(validEmail($email))
                    {
                        $available_email = "SELECT * FROM users WHERE user_email='$email'";
                        $email_results = $database->query($available_email);

                        if(mysqli_num_rows($email_results) == 0){
                            if(validPword($pword)){
                                $make_user = "INSERT INTO users(user_name, user_email, user_password, recov_question, recov_answer) VALUES ('$username', '$email', '$pword', '$recov_question', '$recov_answer')";
                                $user_results = $database->query($make_user);

                                if($user_results){
                                    header("Location: ../LoginPage/login.php?passedName=".$username."");
                                    exit();
                                }else{
                                    header("Location: create.php?error=problem");       
                                    exit();                            
                                }
                            }else{
                                header("Location: create.php?error=invalidPword");             
                                exit();                  
                            }
                        }else{
                            header("Location: create.php?error=takenEmail");
                            exit();
                        }
                    }else{
                        header("Location: create.php?error=invalidEmail");
                        exit();
                    }
                }else{
                    header("Location: create.php?error=takenName");      
                    exit();
                }
            }else{
                header("Location: create.php?error=invalidUsername");
                exit();
            }
        }else{
            header("Location: create.php?error=blanks");
            exit();
        }

    }else{
        header("Location: create.php");
        exit();
        
    }

?>