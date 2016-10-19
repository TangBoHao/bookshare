<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>书籍交换平台</title>
</head>
<body>
	<div>
		<a href="register.html">注册用户</a>
		<a href="landing.html">用户登录</a>
		<span>(登陆后方可发表内容)</span>
	</div>
	<br>

<div>
	<?php
$servername = "localhost";
$username = "tangbohao";
$password = "tangbohao";
$dbname = "tangbohao";
$i=0;
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
mysqli_set_charset($conn,"utf8");
$sql = "SELECT bookname,price,connectway,description,username FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	
        $bookinformation[$i]= "<br>书名: ". $row["bookname"]."<br>期望价格: ". $row["price"]."<br>联系方式: ". $row["connectway"]."<br>书籍详细表述: ". $row["description"]."<br>发布者: ". $row["username"]."<hr>";
    	// echo $bookinformation[$i];
    	$i++;

    }
} else {
    echo "暂无已发表的内容";
}
$conn->close();

for($in=$i-1;$in>=0;$in--)
{
	echo $bookinformation[$in];
}
?>


</div>
</body>
</html>