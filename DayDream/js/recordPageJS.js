function displayComments(data)
{
    var commentsBlock = document.createElement("div");
    commentsBlock.id = "cb" + data.id;
    var dayDreamNode = document.getElementById(data.id);
    dayDreamNode.appendChild(commentsBlock); //apend comments to daydream
    var i=0;
    for(var cmts in data.comments)
    {
        var p = document.createElement("p");
        p.innerHTML = data.comments[i];
        p.class = "comments";
        p.style.fontSize = "30px";
        document.getElementById("cb" + data.id).appendChild(p);
        i++;
    }
}

function inv(id)
{
    var url = "http://4.builddaydream.sinaapp.com/daydream/displayComments.php?" + "id=" + id;
    var script = document.createElement("script");  
    script.src = url;
    document.getElementsByTagName('head')[0].appendChild(script);
}