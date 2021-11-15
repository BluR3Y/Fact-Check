<?php
    include_once 'header.php';
?>

    <div class='searchBanner'>
        <h1>Results for <span><?php echo $_SESSION['search_stmt'] ?></span></h1>
    </div>
    <div class='results'>
        <?php
            if($_SESSION['search_results']>0)
            {
                foreach($_SESSION['search_results'] as &$val)
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

<?php
    include_once 'footer.php';
?>