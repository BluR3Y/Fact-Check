<?php
    include_once "header.php";
?>

    <div class="Main">

        <div class="disc_divider">
            <p>Discover new Communities</p>
        </div>

        <div class="discover">
            <div class="joinComm">
                <form class="joinComm_form" action="inc/joinComm.inc.php" method="POST">
                    <h1 class="joinComm_name"></h1>
                    <div class="joinComm_desc">
                        <h1>Community Description:</h1>
                        <p class="joinComm_text"></p>
                    </div>
                    <div class="joinComm_stats">
                        <p class="joinStats_posts">Posts: <span class="joinStats_posts_val"></span></p>
                        <p class="joinStats_followers">Followers: <span class="joinStats_followers_val"></span></p>
                    </div>
                    <input type="hidden" class="joinComm_id" name="joinComm_id">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                    <div class="joinComm_btns">
                        <button class="joinComm_cancel">Cancel</button>
                        <button class="joinComm_submit" type="submit" name="joinComm_submit">Join</button>
                    </div>
                </form>
            </div>

            <?php
                if(count($_SESSION['discover_comms']) > 0){
                    foreach($_SESSION['discover_comms'] as &$val){
                        $comm_id = $val[0];
                        $comm_name = $val[1];
                        $comm_desc = $val[2];
                        $comm_posts = $val[3];
                        $comm_followers = $val[4];
    
                        echo "
                        <div class='disc_comm'"; 
                            if(isset($_SESSION['user_id'])){
                                echo "onclick='joinCommunity($comm_id,&quot;$comm_name&quot;,&quot;$comm_desc&quot;,$comm_posts,$comm_followers)'";
                            }else{
                                echo "onclick='joinComm_prompt()'";
                            }
                        echo ">
                            <div class='disc_comm_name'>
                                <h1>$comm_name</h1>
                            </div>
                            <div class='disc_comm_desc'>
                                <p>$comm_desc</p>
                            </div>
                            <div class='disc_comm_stats'>
                                <p class='disc_comm_stats_posts'>Posts: $comm_posts</p>
                                <p class='disc_comm_stats_followers'>Followers: $comm_followers</p>
                            </div>
                        </div>
                        ";
                    
                    }
                }else{
                    echo "
                        <div class='disc_comms_none'>
                            <h1>Sorry No discoverable communities at this time</h1>
                        </div>
                    ";
                }
            ?>
        </div>

        <div class="userCommunities">
                <div class="userComm_text">
                    <h1>My Communities</h1>
                </div>
                <div class="userComms">
                    <?php
                        if(isset($_SESSION['user_id'])){
                            if(count($_SESSION['user_communities'])>0){
                                foreach($_SESSION['user_communities'] as $key=> &$val){
                                    $comm_id = $val[0];
                                    $comm_name = $val[1];
    
                                    if($key<5){
                                        echo "
                                        <div class='userCommunity'>
                                            <div class='userCommunity_form'>
                                                
                                                <button onclick='gotoCommunity($val[0])' class='comm_form_submit' >$val[1]</button>
                                            </div>
                                        </div>";
                                    }else{
                                        echo "
                                            <div class='userCommunity_extended'>
                                                <button type='submit' class='comm_form_submit' >$val[1]</button>
                                            </div>";
                                    }
                                }
                            }else{
                                echo "<div class='userComms_none'>
                                    <h1>You have are not part of any communities</h1>
                                </div>";
                            }
                        }else{
                            echo "
                                <div class='userComms_none'>
                                    <h1>Sign In to view your Communities</h1>
                                </div>
                            ";
                        }

                    ?>
                    <div class="userComms_bottom">
                        <?php 
                            if(isset($_SESSION['user_communities'])){
                                if(count($_SESSION['user_communities']) > 5){
                                    echo "<div class='extend_userComms'><button onclick='extend_userComms(".count($_SESSION['user_communities']).")'>View All</button></div>";
                                    echo "<div class='reduce_userComms'><button onclick='reduce_userComms(".count($_SESSION['user_communities']).")'>Reduce</button></div> "; 
                                } 
                            }
                        ?>
                    </div>
                </div>
        </div>

        <div class="myPosts">
            <?php
                if(isset($_SESSION['user_id'])){
                    echo "
                        <div class='postPrompt'>
                            <h1>Recent Posts from Communities</h1>
                        </div>
                    ";

                    if(count($_SESSION['user_recent_posts'])>0)
                    {
                        foreach($_SESSION['user_recent_posts'] as $key=> &$val)
                        {
                            echo "
                            <div class='userPost'>
                                <div onclick='gotoPost($val[0])' class='postInfo'>
                                    <h1 class='postInfo_text'>Posted on <span>$val[2]</span> By <span>$val[1]</span> On <span>$val[3]</span>";  
                                    if($val[6] != NULL){echo " - Topic: <span>$val[6]</span>";}
                                    echo "</h1>
                                </div>
                                <div onclick='gotoPost($val[0])' class='postContent'>
                                    <h1 class='postContent_title'>$val[4]</h1>
                                    <p class='postContent_details'>$val[5]</p>
                                    
                                </div>
                                <div class='postStats'>
                                        <div class='postStats_liked'>
                                            <div class='postStats_like'><h1>$val[7] &#128077;</h1></div>
                                            <div class='postStats_dislike'><h1>$val[8] &#128078;</h1></div>
                                        </div>
                                        <div class='postStats_comment'><h1>$val[9] Comment &#128394;</h1></div>
                                </div>
                            </div>
                            ";
                        }
                    }else{
                        echo "
                            <div class='userPost_none'>
                                <h1>No recent posts from your communities</h1>
                            </div>
                        ";
                    }
                }else{
                    echo "
                        <div class='postPrompt'>
                            <h1>Recent Posts</h1>
                        </div>
                    ";

                    foreach($_SESSION['guest_recent_posts'] as $key=> &$val)
                    {
                        echo "
                        <div class='userPost'>
                            <div onclick='gotoPost($val[0])' class='postInfo'>
                                <h1 class='postInfo_text'>Posted on <span>$val[2]</span> By <span>$val[1]</span> On <span>$val[3]</span>";  
                                if($val[6] != NULL){echo " - Topic: <span>$val[6]</span>";}
                                echo "</h1>
                            </div>
                            <div onclick='gotoPost($val[0])' class='postContent'>
                                <h1 class='postContent_title'>$val[4]</h1>
                                <p class='postContent_details'>$val[5]</p>
                                
                            </div>
                            <div class='postStats'>
                                    <div class='postStats_liked'>
                                        <div class='postStats_like'><h1>$val[7] &#128077;</h1></div>
                                        <div class='postStats_dislike'><h1>$val[8] &#128078;</h1></div>
                                    </div>
                                    <div class='postStats_comment'><h1>$val[9] Comments 10000;</h1></div>
                            </div>
                        </div>
                        ";
                    }
                }



            ?>
                
        </div>

    </div>

<?php
    include_once "footer.php";
?>