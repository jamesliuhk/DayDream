<?
function getTotalDream()
{
	$conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT COUNT(ID) FROM app_builddaydream.`ValidDayDream`";
    $sqlReturn = $conn->query($sql);
    $res = $sqlReturn->fetch_assoc();  
    return $res['COUNT(ID)'];
}

function queryDayDreamById($index)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT daydream FROM app_builddaydream.`ValidDayDream` WHERE ID={$index}";
    $sqlReturn = $conn->query($sql);
    $res = $sqlReturn->fetch_assoc();
    return $res['daydream'];
}

function queryDayDreamByUser($index)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT * FROM app_builddaydream.UserDayDream WHERE user='{$index}'";
    $sqlReturn = $conn->query($sql);
    $list = array();
    $i =0;
    while($res = $sqlReturn->fetch_assoc())
    {
        $list[$i][0] = $res['ID'];
        $list[$i][1] = $res['daydream'];
        $i +=1;
    }
    return $list;
}

function insertDayDream($time,$dayDream,$user)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "INSERT INTO app_builddaydream.UserDayDream (time,daydream,user) VALUES ({$time},'{$dayDream}','{$user}')";
     
    if($conn->query($sql)==true)
            return "Insert Success";
    return $conn->error;
}


function getTotalPic()
{
	$conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT COUNT(ID) FROM app_builddaydream.`pic`";
    $sqlReturn = $conn->query($sql);
    $res = $sqlReturn->fetch_assoc();
    return $res['COUNT(ID)'];

}

function queryPic($index)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT url FROM app_builddaydream.`pic` WHERE ID={$index}";
    $sqlReturn = $conn->query($sql);
    $res = $sqlReturn->fetch_assoc();
    return $res['url'];
}

function insertComment($dreamID,$comment)
{
	$conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "INSERT INTO app_builddaydream.Comments (Daydream_ID,Comments) VALUES ('{$dreamID}','{$comment}')";
    if($conn->query($sql) == true)
            return true;
    return $conn->error;

}

function queryCommentsByDayDreamId($index)
{
    $conn = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if($conn->connect_error)
    	die($conn->connect_error);
    $sql = "SELECT Comments FROM app_builddaydream.`Comments` WHERE Daydream_ID={$index}";
    $sqlReturn = $conn->query($sql);
    $list = array();
    $i =0;
  while($res = $sqlReturn->fetch_assoc())
    {
        $list[$i] = $res['Comments'];
        $i++;
    }
    return $list;
}

?>