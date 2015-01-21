<?php

$newsRecord = "<html>
    	<head>
        	<meta charset=\"UTF-8\">
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
            <script type=\"text/javascript\">
            var imgUrl = \"%s\";
        	var lineLink = \"%s\";
        	var descContent = \"来看看别人的白日梦吧！\";
        	var shareTitle = '白日梦';
        	var appid = '';
        
        function shareFriend() {
            WeixinJSBridge.invoke('sendAppMessage',{
                \"appid\": appid,
                \"img_url\": imgUrl,
                \"img_width\": \"200\",
                \"img_height\": \"200\",
                \"link\": lineLink,
                \"desc\": descContent,
                \"title\": shareTitle
            }, function(res) {
                //_report('send_msg', res.err_msg);
            })
        }
        function shareTimeline() {
            WeixinJSBridge.invoke('shareTimeline',{
                \"img_url\": imgUrl,
                \"img_width\": \"200\",
                \"img_height\": \"200\",
                \"link\": lineLink,
                \"desc\": descContent,
                \"title\": shareTitle
            }, function(res) {
                   //_report('timeline', res.err_msg);
            });
        }
        function shareWeibo() {
            WeixinJSBridge.invoke('shareWeibo',{
                \"content\": descContent,
                \"url\": lineLink,
            }, function(res) {
                //_report('weibo', res.err_msg);
            });
        }
        // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function(argv){
                shareFriend();
            });
            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function(argv){
                shareTimeline();
            });
            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function(argv){
                shareWeibo();
            });
        }, false);
        </script>
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