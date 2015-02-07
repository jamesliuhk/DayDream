<?php
//js in this web page invoke  wexinJSBridge to customize wechat share link
$newsWeb = "
<html>
    <head>
    	<meta charset=\"UTF-8\">
        <script>
        	var imgUrl = \"%s\";
			var lineLink = \"%s\";
			var dID1 = %u;
			var dID2 = %u;
        </script>
        <script src = \"http://4.builddaydream.sinaapp.com/daydream/js/newsPageJS.js\"></script>
        <script src = \"http://4.builddaydream.sinaapp.com/xjs/wechatBrowserJS.js\"></script>
        <style>
            	img{
                	width:100%%;
                	height:50%%;  
            	}
            	div{
                	margin:0;
                	text-align:center;
                    padding-left:25px;
                    padding-right:25px;
            	}
            	p
            	{
                	font-family: \"Times New Roman\", Times, serif;
                	font-size:50px;
                	height:double;
            	}
            	#sub
            	{
                	font-size:30px;
                	height:double;
            	}
                h1{
                	font-size:60px;
                	font-family:\"Comic Sans MS\", cursive, sans-serif;
                }
            
                #head{
                	text-align:left;
                }
            	
                a:link    {color:#515151; text-decoration:none}
				a:visited {color:#515151; text-decoration:none}
				a:hover   {color:#515151; text-decoration:none}
				a:active  {color:#515151; text-decoration:none}
            
				button
            	{
                	margin-left:10px;
                    height:120px;
                    width:360px;
                    font-size:80px;
            	}
                
                input
                {
                	height:300px;
                    width:500px;
                }
            	
        	</style>
    </head>
    <body onload =\"showCommentsBox(1);showCommentsBox(0);\">
        <div id=\"head\">
        	    <h1>Day Dream</h1>
                <p id=\"sub\"><a href=\"http://mp.weixin.qq.com/s?__biz=MzAwMDE0NjQ2Mw==&mid=202185794&idx=1&sn=7548abe75286e504896686a67e7f7255#rd\">点我关注“白日梦”</a></p>
        	</div>
        <div id =\"pic\">
            <img src=\"%s\">
        </div>
        <div id=\"content\">
            <p class = \"daydream\" onClick = \"showCommentsBox(1)\">%s</p>
            
            <br/><div id = \"commentsBox1\"></div><br/>
            
            <p class = \"daydream\" onClick = \"showCommentsBox(0)\">%s</p>
            
            <br/><div id = \"commentsBox2\"></div><br/>
            
            <p>click daydream to comment</p>
        </div>
    </body>
</html>";
  
?>