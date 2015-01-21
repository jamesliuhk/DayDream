<?php
$newsRecord = "<html>
    	<head>
        	<meta charset=\"UTF-8\">
            <script>
            	var imgUrl = \"%s\";
				var lineLink = \"%s\";
            </script>
            <script src = \"http://4.builddaydream.sinaapp.com/xjs/wechatBrowserJS.js\"></script>
            <script src = \"http://4.builddaydream.sinaapp.com/xjs/recordPageJS.js\"></script>
        	<style>
            	img{
                	width:100%%;
                	height:50%%;
            	}
            	div{
                	margin:0;
                	text-align:center;
            	}
            	p
            	{
                	font-family: \"Times New Roman\", Times, serif;
                	font-size:50px;
                	height:double;
            	}
                h1{
                	font-size:80px;
                }
        	</style>
    	</head>
    	<body>
        	<div id=\"head\">
        	    <h1>Day Dream</h1>
        	</div>
        	<div id =\"pic\">
            	<img src=\"%s\">
        	</div>
        	<div id=\"content\">
            		%s
        	</div>
    	</body>
	</html>"
?>