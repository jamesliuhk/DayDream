<?php
header("Content-Type: text/html; charset=UTF-8");
mb_internal_encoding('utf-8');

include "database_operation.php"; //

	
function recordDayDream($time,$dayDream,$user)
{
    return insertDaydream($time,$dayDream,$user);
       
}
    
function getDayDream($user) //$type ==1 (get 2 random record) or $type ==2 (get user daydream list)
{
    include "newsWeb_tpl.php";
    $url =array(); //initial a array to store day dream and picture
    $userDaydream = array();
 
    //get two random day dream from database
    $total = getTotalDream(); 
    $no1 = rand(1,$total);
    $Daydream1 = "1.".queryDayDreamById($no1); //queryDayDreamById retun one day dream
    $no2 = rand(1,$total);
    $Daydream2 = "2.".queryDayDreamById($no2);
    
    //get one random picture from database
    $total = getTotalPic(); 
    $no = rand(1,$total);
    $picURL = queryPic($no);
    $url[0] = $picURL; //picture URL
    
    //define webpage URL use user name and time
    $destFileName = '1'.'_'.$user.'_'.time().'.html';
    $url[1] = "http://builddaydream-daydreamnews.stor.sinaapp.com/".$destFileName; //news URL
    
    //assemble html page content     
    $content = sprintf($newsWeb/*defined in newsWeb_tpl*/,$picURL,$url[1],$no1,$no2,$picURL,$Daydream1,$Daydream2); //use picURL and $url[1](the news url) to customize wechat timeline share link & picture
    													
	
    //writte the html page to stroage and return it
 	$storage = new SaeStorage();
 	$domain = 'daydreamnews';
 	$attr = array('encoding'=>'gzip');
    $result = $storage->write($domain,$destFileName, $content, -1, $attr, true);
    
    return $url;
}

function getDayDreamRecord($user)
{
    include "newsRecord_tpl.php";
    $url =array(); //initial a array to store day dream and picture
    $userDaydream = array();
    
    //queryDayDreamById return array consist all day dream by an user
    //$userDayDream is a 2D Array. [index][0] is ID and [index][1] is daydream
    $userDaydream = queryDayDreamByUser($user); 
    
    //get one random picture from database
    $total = getTotalPic(); 
    $no = rand(1,$total); //generate random num for day dream
    $picURL = queryPic($no);
    $url[0] = $picURL; //picture URL
    
    //define webpage URL use user name and time
    $destFileName = '2'.'_'.$user.'_'.time().'.html';
    $url[1] = "http://builddaydream-daydreamnews.stor.sinaapp.com/".$destFileName; //news URL
    
    //assemble html page content
    $list ="";
    foreach($userDaydream as $daydream)
    {
        $list .="<p id = $daydream[0] onclick = inv($daydream[0])>".$daydream[1]."</p>";
    }        
    $content = sprintf($newsRecord/*defined in newsWeb_tpl*/,$picURL,$url[1],$picURL,$list); //use picURL and $url[1](the news url) to customize wechat timeline share link & picture
    
    //writte the html page to stroage and return it
 	$storage = new SaeStorage();
 	$domain = 'daydreamnews';
 	$attr = array('encoding'=>'gzip');
    $result = $storage->write($domain,$destFileName, $content, -1, $attr, true);
    
    return $url;
}

?>