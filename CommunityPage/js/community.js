function viewAllFollowers(num_elements)
{
    var extendedElements = num_elements-5;
    var extendedObj = document.getElementsByClassName('extendedFollower');
    var extendBtn = document.getElementsByClassName('expand_followers')[0];
    var reduceBtn = document.getElementsByClassName('hide_followers')[0];

    for(var i=0; i< extendedElements;i++)
    {
        extendedObj[i].style.display = "inline-block";
    }

    extendBtn.style.display = "none";
    reduceBtn.style.display = "block";

}
function hideExtendedFollowers(num_elements)
{
    var extendedElements = num_elements-5;
    var extendedObj = document.getElementsByClassName('extendedFollower');
    var extendBtn = document.getElementsByClassName('expand_followers')[0];
    var reduceBtn = document.getElementsByClassName('hide_followers')[0];

    for(var i=0; i< extendedElements;i++)
    {
        extendedObj[i].style.display = "none";
    }

    reduceBtn.style.display = "none";
    extendBtn.style.display = "block";
    
}
function gotoPost(post_id)
{
    var location = "../PostPage/post.php?post="+post_id;
    window.location.href = location;
}
