function likePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"likePost","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    console.log(user_id,post_id);
    window.location.reload(1);
}
function dislikePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"dislikePost","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    window.location.reload(1);
}
function unlikePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"unlikePost","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    window.location.reload(1);
}
function undislikePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"undislikePost","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    window.location.reload(1);
}
function switch_dislikePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"switchToDislike","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    window.location.reload(1);
}
function switch_likePost(user_id,post_id)
{
    var obj,dbParam,xmlhttp;
    obj = {"action":"switchToLike","user_id":user_id,"post_id":post_id};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updatePost.php",true);
    xmlhttp.send(dbParam);
    window.location.reload(1);
}
function promptLogIn()
{
    alert("Log In to access functionalities");
}
function submitComment()
{
    document.getElementsByClassName('commentForm')[0].submit();
}