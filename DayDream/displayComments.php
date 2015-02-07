<?php
include "database_operation.php";
function displayComments()
{
    $comments = "[";
    $id = $_GET['id'];
    $commentsList = queryCommentsByDayDreamId($id);
    foreach($commentsList as $comment)
    {
        $comments .= "\"".$comment."\",";
    }
    
    /*insert a empty string to mathch last comma, 
    if not the string array shoule be ["string1","string2",]. 
    Added empty string it become ["string1","string2",""]
    which matched the sytax*/
    $comments .="\"\"";
    
    
    $comments .= "]"; 
    echo "displayComments({comments:$comments,id:$id});"; // callback function name is dispayComments
}  

displayComments();
?>