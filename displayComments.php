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
    $comments .= "]";
	echo "displayComments({comments:$comments,id:$id});";
}  

displayComments();
?>