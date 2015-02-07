<?php
header("Content-Type: text/html; charset=UTF-8");
include "database_operation.php";

if($_GET['sen']!='null' && $_GET['sen']!='')
	insertSentence("web",$_GET['sen'].". ");

echo getArticle();


?>