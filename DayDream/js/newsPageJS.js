/*------------------------------------*/
//JS for user comments day dream
function showCommentsBox(pos)
{
    if(pos)
    {
        var input = "<div><input type = 'text' id = 'textbox1' onkeydown = 'if(event.keyCode==13) document.getElementById(\"bt1\").click();'></div><div><button id ='bt1' onclick = 'inv(1)'>submit</button></div>";
        document.getElementById("commentsBox1").innerHTML = input;
    }
    else
    {
        var input = "<div><input type = 'text' id = 'textbox2' onkeydown = 'if(event.keyCode==13) document.getElementById(\"bt2\").click();'></div><div><button id ='bt2' onclick = 'inv(0)'>submit</button></div>";
        document.getElementById("commentsBox2").innerHTML = input;
    }
}

//----------------------------//

//below script use JSONP call insert comment script and return insert result

// This is our function to be called with JSON data
function displayStatus(data)
{
    if(data.pos)
        document.getElementById("commentsBox1").innerHTML = data.res;
    else
        document.getElementById("commentsBox2").innerHTML = data.res;
}

function inv(pos)
{
    if(pos)
    {
        var url = "http://4.builddaydream.sinaapp.com/daydream/submitComments.php?id=" + dID1 + "&cmt=" + document.getElementById("textbox1").value + "&pos=1"; // URL of the external script
        // this shows dynamic script insertion
        var script = document.createElement('script');
        script.setAttribute('src', url);
        // load the script
        document.getElementsByTagName('head')[0].appendChild(script);
    }
    else
    {
        var url = "http://4.builddaydream.sinaapp.com/daydream/submitComments.php?id=" + dID2 + "&cmt=" + document.getElementById("textbox2").value + "&pos=0"; // URL of the external script
        // this shows dynamic script insertion
        var script = document.createElement('script');
        script.setAttribute('src', url);
        // load the script
        document.getElementsByTagName('head')[0].appendChild(script);
    }
}