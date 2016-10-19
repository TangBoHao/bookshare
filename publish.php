<?php
header("Content-type: text/html; charset=utf-8");
function gjj($str)
{
    $farr = array(
        "/\\s+/",
        "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
        "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
    );
    $str = preg_replace($farr,"",$str);
    return addslashes($str);
}

function hg_input_bb($array)
{
    if (is_array($array))
    {
        foreach($array AS $k => $v)
        {
            $array[$k] = hg_input_bb($v);
        }
    }
    else
    {
        $array = gjj($array);
    }
    return $array;
}
$_REQUEST = hg_input_bb($_REQUEST);
$_GET = hg_input_bb($_GET);
$_POST = hg_input_bb($_POST);
session_start();
echo $_SESSION['name'];

$servername = "localhost";
$username = "tangbohao";
$password = "tangbohao";
$dbname = "tangbohao";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$bookname=$_POST['bookname'];
$price=$_POST['price'];
$connectway=$_POST['connectway'];
$description=$_POST['description'];
$name=$_SESSION['name'];

$sql = "INSERT INTO books (bookname,price,connectway,description,username) VALUES ('$bookname','$price','$connectway','$description','$name')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>
	alert('书籍信息发布成功');
	window.location='http://www.scuec.top';
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}