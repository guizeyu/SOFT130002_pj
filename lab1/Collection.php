<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataBase = "web";

// 创建连接
$con = new mysqli($servername, $username, $password, $dataBase);

// 检测连接
if ($con->connect_error) {
    die("连接失败: " . $con->connect_error);
}
$result=mysqli_query($con,"SELECT * FROM wishlist" );
$row=mysqli_fetch_array($result);
$t=$row['artworkID'];
$result1=mysqli_query($con,"SELECT * FROM artworks WHERE artworkID=$t" );
$row1=mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/Collection.css" media="all">
    <script src="resources/js/Collection.js"></script>
    <meta charset="UTF-8">
    <title>collection</title>
</head>
<body>
<header>
    <div class="nav">
        <div class="nav_first">
            Art Store
        </div>
        <div class="nav_second">
            Here is a website where you can find the best one
        </div>
        <div class="nav_third">
            <ul>
                <li>
                    <a href="Home.php">首页</a>
                </li>
                <li>
                    <a href="Search.php">搜索</a>
                </li>
                <li>
                    <a href="Show.php">详情</a>
                </li>
                <li>
                    <a href="LogIn.html">登录</a>
                </li>
                <li>
                    <a href="Register.html">注册</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<hr>
<div class="search">
    <input type="text" placeholder="请输入艺术家或艺术品">
    <button><i>搜索</i></button>
    <div class="result">
        <button class="sort">结果排序方式</button>
        <div class="result-content">
            <a href="#">默认排序</a>
            <a href="#">首字母排序</a>
            <a href="#">价格排序</a>
        </div>
    </div>
</div>
<div class="user">
    <div>
        <p>用户名：admin</p>
    </div>
    <div>
        <p>年龄：</p>
    </div>
    <div>
        <p>性别：</p>
    </div>
</div>
<div class="collection" id="collection">
    <div class="img1" id="img1">
        <div class="side">
            <div class="name">
                <?php
                echo  "<a href='Show.php?id=".$row['artworkID']."'>  </a>" ."Name:" .$row1["title"];
                ?>
            </div>
            <div class="time">
                <?php
                echo "Time:" . $row1["timeReleased"];
                ?>
            </div>
        </div>
        <div>
            <button class="button1" onclick="kill()" >delete</button>
        </div>
    </div>
</div>
<footer>
    <p class="footer">@Art Store 复旦大学版权所有 All rights reserved</p>
</footer>
</body>
</html>