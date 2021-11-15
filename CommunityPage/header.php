<?php
    session_start();

    if(isset($_GET['community']))
    {
        $_SESSION['last_community'] = $_GET['community'];
    }else{
        if(!isset($_SESSION['last_community']))
        {
            header("Location: ../HomePage/home.php");
            exit();
        }
    }

    include_once 'community_info.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php echo $communityInfo[1]; ?></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/community.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/community.js"></script>
</head>
<body>

    <div class="navbar">
        <a href="../HomePage/home.php" id="logo">Fact Check</a>

        <div class="searchBar">
            <form action="inc/search.inc.php" method="POST">
                <input type="text" placeholder="What is ..." name="Search">
                <button type="submit" name="submit">&#128269;</button>
            </form>
        </div>

        <div class="nav-content">

            <?php
                if(isset($_SESSION["user_id"]))
                {
                    echo "
                        <div class='user-content'>

                            <div class='community'>
                                <button onclick='createCommunity()' title='Create a community' class='community_Btn'>Community</button> 

                                <form class='communityForm' action='inc/community.inc.php' method='POST'>
                                    <h1>Create a community where you can express your ideas with like minded people</h1>

                                    <input type='' class='community_name' placeholder='Community Name' name='community_name' required>

                                    <textarea class='community_description' placeholder='This community is about...' name='community_description' required></textarea>

                                    <input type='hidden' name='userID' value='".$_SESSION['user_id']."'>

                                    <button class='community_submit' type='submit' name='createCommunity'>Create Community</button>
                                    <button onclick='cancelCommunity()' class='community_cancel'>Cancel</button>

                                </form>

                            </div>

                            <div class='post'>
                                <button onclick='createPost()' title='Create a post' class='postBtn'>&#9998;</button>

                                <form class='postForm' action='inc/createPost.inc.php' method='POST'>

                                    <input type='text' class='title' placeholder='Title' name='title' required>

                                    <select class='post_community' name='community' required>
                                            <option value='' disabled selected>Select Community</option>";
                                    if(count($_SESSION['user_communities'])>0)
                                    {
                                        foreach($_SESSION['user_communities'] as &$val){
                                            $comm_id = $val[0];
                                            $comm_name = $val[1];
                                            echo"<option value='".$comm_id."'>".$comm_name."</option>";
                                        }
                                    }else{
                                        echo "<option value=''disabled>You aren't in any</option>";
                                    }
                    
                    echo"
                                    
                                    <textarea class='postText' placeholder='My question is...' name='post' required></textarea>

                                    <input type='text' class='topic' placeholder='Optional:topic' name='topic'>

                                    <input type='hidden' name='userID' value='".$_SESSION['user_id']."'>

                            
                                    <button id='submit' type='submit' name='createPost'>Post</button>
                                    <button onclick='cancelPost()' id='cancel'>Cancel</button>
                                   
                                </form>
                            </div>

                            <div class='profile'>
                                <button class='dropBtn'>".$_SESSION["user_name"]."</button>
                                <div class='profile-content'>
                                    <a href='#'>Profile</a>
                                    <a href='#'>Settings</a>
                                    <a href='inc/logout.inc.php'>LogOut</a>
                                </div>
                            </div>

                        </div>
                    ";
                }else{
                    echo "
                        <div class='guest-content'>
                            <a href='../LoginPage/login.php'>Log In</a>
                            <a href='../CreatePage/create.php'>Sign Up</a>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>

