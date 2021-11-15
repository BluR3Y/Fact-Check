function expandSideNav()
{
    var navOvj = document.getElementsByClassName('userSideNav')[0];
    var expandObj = document.getElementsByClassName('panelIcon')[0];


    if(navOvj.style.left === "-260px"){
        navOvj.style.left = "10px";
        expandObj.style.transform = "rotate(180deg)";
    }else{
        navOvj.style.left = "-260px";
        expandObj.style.transform = "rotate(0)";
    }

}

function joinCommunity(comm_id,comm_name,comm_desc,comm_posts,comm_followers)
{
    var joinBlock = document.getElementsByClassName("joinComm")[0];
    var joinForm = joinBlock.getElementsByClassName("joinComm_form")[0];

    joinForm.getElementsByClassName("joinComm_name")[0] = comm_name;
    joinForm.getElementsByClassName("joinComm_desc")[0].getElementsByClassName("joinComm_text")[0].innerHTML = comm_desc;
    joinForm.getElementsByClassName("joinComm_stats")[0].getElementsByClassName("joinStats_posts_val")[0].innerHTML = comm_posts;
    joinForm.getElementsByClassName("joinComm_stats")[0].getElementsByClassName("joinStats_followers_val")[0].innerHTML = comm_followers;
    joinForm.getElementsByClassName("joinComm_id")[0].value = comm_id;

    joinBlock.style.display = "block";


}

function joinComm_prompt(){
    alert("Sign In to unlock functionalities");
}

function extend_userComms(num_elements)
{
    var extendedElmts = num_elements-5;
    var docElmt = document.getElementsByClassName('userCommunity_extended');
    var reduceBtn = document.getElementsByClassName('reduce_userComms')[0];
    var extendBtn = document.getElementsByClassName('extend_userComms')[0];

    for(var i=0; i < extendedElmts; i++)
    {
        docElmt[i].style.display = "block";
    }

    extendBtn.style.display = "none";
    reduceBtn.style.display = "block";

}
function reduce_userComms(num_elements)
{
    var extendedElmts = num_elements-5;
    var docElmt = document.getElementsByClassName('userCommunity_extended');
    var reduceBtn = document.getElementsByClassName('reduce_userComms')[0];
    var extendBtn = document.getElementsByClassName('extend_userComms')[0];

    for(var i=0; i < extendedElmts; i++)
    {
        docElmt[i].style.display = "none";
    }

    reduceBtn.style.display = "none";
    extendBtn.style.display = "block";
}
function gotoPost(post_id)
{
    var location = "../PostPage/post.php?post="+post_id;
    window.location.href = location;
}
function gotoCommunity(comm_id)
{
    var location = "../CommunityPage/community.php?community="+comm_id;
    window.location.href = location;
}