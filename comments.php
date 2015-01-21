<?php
function Comments()
{
    include "database_operation.php";
$id = $_GET['id'];
$content = $_GET['cmt'];
$pos = $_GET['pos'];
$res = insertComment($id,$content);
if($res === true)
	$res = "comment submitted";
else;

echo "displayStatus({res:\"{$res}\",pos:{$pos}});";
}

Comments();

?>