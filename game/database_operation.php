<?php
function insertSentence($user,$content)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    if($conn->connect_error)
        die($conn->connect_error);
    $sql = "INSERT INTO app_builddaydream.Article (user,sentence) VALUES ('{$user}','$content')";
    $conn->query($sql);
    if($conn->error)
        die($conn->error);
    else
        return "success";
}

function getArticle()
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    if($conn->connect_error)
        die($conn->connect_error);
    $sql = "SELECT `sentence` FROM app_builddaydream.Article";
    $sqlReturn = $conn->query($sql);
    $article = "";
    while($sentence = $sqlReturn->fetch_assoc())
    {
        $article.=$sentence['sentence'];
    }
    return $article;
}

function getCurrentSentence()
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    if($conn->connect_error)
        die($conn->connect_error);
    $sql = "SELECT ID FROM app_builddaydream.Article ORDER BY ID DESC LIMIT 1";
    $sqlReturn = $conn->query($sql);
    $result = $sqlReturn->fetch_assoc();
    return $result['ID'];
}



?>