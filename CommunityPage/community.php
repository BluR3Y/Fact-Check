<?php
    include_once 'header.php';
?>

    <div class='communityBanner'>
        <div class='community_main'>
            <h1><?php echo $communityInfo[1] ;?></h1>
            <p><?php echo $communityInfo[3] ;?></p>
        </div>
        <div class='community_stats'>
            <div class='stats_group1'>
                <h2 class='num_followers'>Followers: <?php echo $communityInfo[7] ;?></h2>
                <h2 class='num_posts'>Posts: <?php echo $communityInfo[6] ;?></h2>
            </div>
            <div class='stats_group2'>
                <h2 class='date_created'>Date Created: <?php echo $communityInfo[2] ;?></h2>
                <h2 class='comm_creator'>Community Admin: <?php echo $communityInfo[5] ;?></h2>
            </div>
        </div>
    </div>

    <div class='communityPosts'>
        <div class='postsDivider'>
            <h1>Community Posts</h1>
        </div>

        <div class='postSection'>
            <?php
                if(count($commPosts)>0)
                {
                    foreach($commPosts as &$val)
                    {
                        echo "
                            <div class='user_post'>
                                <div class='post_top'>
                                    <h1>Posted by <span>".$val[2]."</span> on <span>".$val[5]."</span>"; 
                                    if($val[8] != null){echo " - Topic: <span>$val[8]</span>";}
                                    echo "</h1>
                                </div>
                                <div onclick='gotoPost($val[0])' class='post_main'>
                                    <h1>".$val[6]."</h1>
                                    <p>".$val[7]."</p>
                                </div>
                                <div class='post_bottom'>
                                    <div class='post_Liked'>
                                        <button onclick=''gotoPost($val[0]) class='Liked_like'>".$val[9]." &#128077;</button>
                                        <button onclick='gotoPost($val[0])' class='Liked_dislike'>".$val[10]." &#128078;</button>
                                    </div>
                                    <div class='bottom_comment'>
                                        <button onclick='gotoPost($val[0])'>Comments ".$val[11]."</button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }else{
                    echo "
                        <div class='user_post_none'>
                            <h1>No posts in this community</h1>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>

    <div class='communityFollowers'>
        <div class='comm_Follows_top'>
            <h1>Followers</h1>
        </div>
        <div class='comm_Follows_main'>
            <?php
                if($commFollowers>0)
                {
                    foreach($commFollowers as $key=> &$val)
                    {
                        if($key<5)
                        {
                            echo "
                                <div class='comm_follower'>
                                    <h2>$val</h2>
                                </div>
                            ";
                        }else{
                            echo "
                                <div class='comm_follower extendedFollower'>
                                    <h2>$val</h2>
                                </div>
                            ";
                        }
                    }
                }else{
                    
                }
            ?>
        </div>
        <div class='comm_Follows_bottom'>
                <?php if(count($commFollowers)>5){echo "<button onclick='viewAllFollowers(".count($commFollowers).")' class='expand_followers'>View All</button><button onclick='hideExtendedFollowers(".count($commFollowers).")' class='hide_followers'>Reduce</button>";} ?>
        </div>
    </div>


<?php
    include_once 'footer.php';
?>