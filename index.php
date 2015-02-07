<?php
include "wechat_tpl.php";
include "daydream/DayDream.php";
include "game/gameHost.php";
//获取微信发送数据
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
 
if (!empty($postStr))  //提取,拆分微信推送消息
{
          
    	//解析数据
          $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    	//发送消息方ID
          $fromUsername = $postObj->FromUserName;
    	//接收消息方ID
          $toUsername = $postObj->ToUserName;
   	 	//消息类型
          $formMsgType = $postObj->MsgType;
    	//消息内容
    	  $content=trim($postObj->Content);
    	//时间
    	  $msgCreateTime = $postObj->CreateTime;  
}

else 
{
      echo "error";
      exit();
}
          
//system function direction
    
    	  if($formMsgType=="event") 					//reply for subscribe
          {
              $eventType=$postObj->Event; 	//$postObj is an global object
              
        		if($eventType=="subscribe")
              {
                	$msgType = "text";
                    $contentStr = "亲爱的梦友，欢迎订阅“白日梦”/爱你，在这里，没有无奈的“没办法”/委屈，没有苦闷的“不得不”/::8，只有“我想”“我要”“我希望”，只有爱做梦的你我他/爱心/爱心
                    				\n1.输入你的白日梦，与你分享别人的白日梦 \n2.输入“record”，回忆你曾拥有的白日梦\n\n发布你的梦，分享你的梦，记录你的梦，让我们一起找回白日梦感觉";
              		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, time(), $msgType, $contentStr);
              }
              
          }
    	
          else if($formMsgType=="text") 				//text meesage
          {
        
              if($content =="record")
             {
                  
                  	$URL = getDayDreamRecord($fromUsername); //getUserDream($user,$type), $type=2 return record of $user
                  	$msgType = "news";
                  	$newsTitle = "Day Dream";
                  	$description = "your daydream";
                  	$picURL = $URL[0]; //index 0 contain picture url, while
                  	$newsURL  = $URL[1]; //index 1 contain new url 
        		  	$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, time(), $msgType, 1, $newsTitle, $description, $picURL, $newsURL);
             }
              else if($content == "游戏")
              {
                  	$URL = getGameAdress(1); //getUserDream($user,$type), $type=2 return record of $user
                  	$msgType = "news";
                  	$newsTitle = "白日梦开脑洞";
                  	$description = "今日游戏：故事接龙";
                  	$picURL = "http://builddaydream-bddres.stor.sinaapp.com/writing.jpg"; //index 0 contain picture url, while
                  	$newsURL  = $URL; //index 1 contain new url 
        		  	$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, time(), $msgType, 1, $newsTitle, $description, $picURL, $newsURL);
              }
              else
              {
                  	$URL = getDayDream($fromUsername); //getUserDream($user,$type), $type=1 return two/ random day dream
                  	recordDayDream($msgCreateTime,$content,$fromUsername);
                  	$msgType = "news";
                  	$newsTitle = "Day Dream";
                  	$description = "day dream of others";
                  	$picURL = $URL[0]; //index 0 contain picture url, while
                  	$newsURL  = $URL[1]; //index 1 contain news url
                  	$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, time(), $msgType, 1, $newsTitle, $description, $picURL, $newsURL);
              }
          }
    	else
          	{
              $msgType = "text";
              $contentStr = "谢谢你的留言！";
              $resultStr = sprintf($textTpl, $fromUsername, $toUsername, time(), $msgType, $contentStr);
             }
		echo $resultStr;
?>