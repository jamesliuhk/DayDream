function displayComments(data)
{
    var commentsBlock = document.createElement("div");
    commentsBlock.id = "cb";
    document.getElementById(data.id).appendChild(commentsBlock);
    var i=0;
    for(var cmts in data.comments)
    {
        var p = document.createElement("p");
        p.innerHTML = data.comments[i];
        p.class = "comments";
        document.getElementById("cb").appendChild(p);
        i++;
    }
    //document.getElementById(data.id).innerHTML = data.comments;
}

function inv(id)
{
    var url = "http://4.builddaydream.sinaapp.com/displayComments.php?" + "id=" + id;
    var script = document.createElement("script");  
    script.src = url;
    document.getElementsByTagName('head')[0].appendChild(script);

}