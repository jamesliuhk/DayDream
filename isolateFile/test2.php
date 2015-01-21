<?php
function readDayDream()
{
    $handle  = fopen("http://builddaydream-dbadmin.stor.sinaapp.com/daydream.txt","r");
    while(($line = fgets($handle)) !== false)
    {
    	if($error = appendDayDream($line))
    		echo $error;
        else
            echo $line."<br/>";
    }
    fclose($handle);
}

function appendDayDream($dream)
{
    $time = time();
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    if($conn->connect_error)
        die($conn->conntect_error);
    $sql = "INSERT INTO app_builddaydream.`UserDayDream` (time,daydream) VALUES ($time,'{$dream}')";
    $conn->query($sql);
    return $conn->error;
}

readDayDream();


?>