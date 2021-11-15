function createPost()
{
    var postObj = document.getElementsByClassName('postForm')[0];
    var communityObj = document.getElementsByClassName('communityForm')[0];

    if(communityObj.style.display === 'block')
    {
        cancelCommunity();
    }

    postObj.style.display='block';

}
function cancelPost()
{
    document.getElementsByClassName('postForm')[0].style.display='none';
}
function createCommunity()
{
    var postObj = document.getElementsByClassName('postForm')[0];
    var communityObj = document.getElementsByClassName('communityForm')[0];

    if(postObj.style.display === 'block')
    {
        cancelPost();
    }
    communityObj.style.display = 'block';
}
function cancelCommunity()
{
    document.getElementsByClassName('communityForm')[0].style.display='none';
}