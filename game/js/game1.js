var current;

function initialized()
{
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            document.getElementById("story").value = xmlhttp.responseText;
    }
    xmlhttp.open("GET","http://4.builddaydream.sinaapp.com/game/game1BackEnd.php",true);
    xmlhttp.send();
}

function getCurrent()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","http://4.builddaydream.sinaapp.com/game/game1GetCurrent.php",false);
    xmlhttp.send();
    current = xmlhttp.responseText;
}

function checkCurrent()
{
    var pending;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","http://4.builddaydream.sinaapp.com/game/game1CheckCurrent.php?cur=" + current,false);
    xmlhttp.send();
    pending = xmlhttp.responseText;
    return pending;
}


function addSentence()
{
    var res;
    var sentence = prompt("输入你的下一句话吧:","");
    if(sentence ==null)
    	return;
    if(sentence.length > 20)
    {
        alert("超过20个字啦");
    }
    else
    {
        //check if latest sentence has been wrote.
        res = checkCurrent();
        checkCurrent();
        if(  res == "false")
        {
            alert("刚才那句被人写啦，只有接着写咯！");
            getCurrent();
            initialized();
            
        }
        else //write into database
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if(xmlhttp.readyState ==4 && xmlhttp.status ==200)
                    document.getElementById("story").value = xmlhttp.responseText;
            }
            xmlhttp.open("GET","http://4.builddaydream.sinaapp.com/game/game1BackEnd.php?sen=" + sentence,true);
            xmlhttp.send();
            //update story
            initialized();
            getCurrent();
        }
    }
    
}
