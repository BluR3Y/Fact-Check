<?php
    include_once 'header.php';
?>

    <div class='postInfo'>
        <div class='postInfo_top'>
            <h1 class='postInfo_text'>Posted on <span><?php echo $postInfo[4] ?></span> By <span><?php echo $postInfo[2] ?></span> On <span><?php echo $postInfo[5] ?></span>
            <?php if($postInfo[8] != NULL){echo " - Topic: <span>".$postInfo[8]."</span>";} ?>
            </h1>
        </div>
        <div class='postContent'>
            <h1 class='postContent_title'><?php echo $postInfo[6] ?></h1>
            <p class='postContent_details'><?php echo $postInfo[7] ?></p>
            
        </div>
        <div class='postInfo_bottom'>
                <div class='postStats_liked'>
                    <div <?php if(isset($_SESSION['user_id'])){ if($userLike_post == 1){ echo "class='postStats_like likedBtn_highlight' onclick='unlikePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}elseif($userLike_post == 0){echo "class='postStats_like likedBtn_default' onclick='switch_likePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}elseif($userLike_post== -1){echo "class='postStats_like likedBtn_default' onclick='likePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}}else{ echo "class='postStats_like likedBtn_default' onclick='promptLogIn()'";} ?>><h1><?php echo $postInfo[9] ?> &#128077;</h1></div>
                    <div <?php if(isset($_SESSION['user_id'])){ if($userLike_post == 1){echo "class='postStats_dislike likedBtn_default' onclick='switch_dislikePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}elseif($userLike_post == 0){echo "class='postStats_dislike likedBtn_highlight' onclick='undislikePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}elseif($userLike_post== -1){echo "class='postStats_dislike likedBtn_default' onclick='dislikePost(".$_SESSION['user_id'].",".$postInfo[0].")'";}}else{ echo "class='postStats_dislike likedBtn_default' onclick='promptLogIn()'";} ?>><h1><?php echo $postInfo[10] ?> &#128078;</h1></div>
                </div>
        </div>
    </div>

    <div class='commentDivider'>
        <h1>Comments: <?php echo $postInfo[11];?></h1>
        <form class='addComment' action="inc/createComment.inc.php" method="POST"><input type="hidden" name="user_id" <?php if(isset($_SESSION['user_id'])){echo "value='".$_SESSION['user_id']."'";} ?> ><input type="hidden" name="post_id" <?php echo "value='".$postInfo[0]."'"; ?> ><input type="text" name="newComment" <?php if(isset($_SESSION['user_id'])){ echo "placeholder='Add Comment' required";}else{echo "placeholder='Sign In to Comment' disabled";} ?>><button type="submit" name="submit" <?php if(!isset($_SESSION['user_id'])){echo "disabled";} ?>>Add Comment</button></form>
    </div>

    <div class='commentSection'>
        <?php
            foreach($commentInfo as $val)
            {
                echo "
                    <div class='Comment'>
                        <div class='comment_top'>
                            <h1><span>".$val['2']."</span> commented on <span>".$val[4]."</span></h1>
                        </div>
                        <div class='comment_main'>
                            <p>".$val[3]."</p>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>

<?php
    include_once 'footer.php';
?>