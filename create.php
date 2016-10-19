<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "tangbohao";
$password = "tangbohao";
$databasename='tangbohao';

// 创建连接
$conn = mysqli_connect($servername, $username, $password);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $databasename
		CHARACTER SET 'utf8' 
		COLLATE 'utf8_general_ci'";
if (mysqli_query($conn, $sql)) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php
$servername = "localhost";
$username = "tangbohao";
$password = "tangbohao";
$dbname = $databasename;

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table



$sql2 = "CREATE TABLE newusers (
username VARCHAR(100) NOT NULL PRIMARY KEY,
password VARCHAR(100) NOT NULL,
phone VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql2) === TRUE) {
    echo "用户数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql1 = "CREATE TABLE books (
ID INT UNSIGNED NOT NULL PRIMARY KEY  AUTO_INCREMENT,
bookname VARCHAR(100) NOT NULL ,
price VARCHAR(100) NOT NULL,
connectway VARCHAR(100) NOT NULL,
description VARCHAR(100) NOT NULL,
username VARCHAR(100) NOT NULL,
FOREIGN KEY (username) REFERENCES newusers(username),
reg_date TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql1) === TRUE) {
    echo "书籍数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}



$conn->close();
?>