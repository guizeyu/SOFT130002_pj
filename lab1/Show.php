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

$id = $_GET['id'];
$result = mysqli_query($con, "SELECT artist,title,timeReleased,description,price,view,imageFileName FROM artworks
WHERE artworkID='$id'");
mysqli_query($con,"UPDATE artworks SET view =view+1
WHERE artworkID='$id'");
$row = mysqli_fetch_array($result);
//$row["view"] += 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/Show.css" media="all">
    <script src="resources/js/Show.js"></script>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body>
<header>
    <div class="nav">
        <div class="nav_first">Art Store</div>
        <div class="nav_second">
            <ul>
                <li>
                    <a href="Home.php">首页</a>
                </li>
                <li>
                    <a href="Search.html">搜索</a>
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
<div class="img">
    <?php
    echo "<img src='resources/img/" . $row['imageFileName'] . "'width='300' height='450'>"
    ?>
</div>
<div class="side">
    <div class="name">
        <?php
        echo $row["title"];
        ?>
    </div>
    <div class="author">
        <a href="Search.php">
            <?php
            echo "artist:" . $row["artist"];
            ?></a>
    </div>
    <div class="time">
        <?php
        echo "Time:" . $row["timeReleased"];
        ?>
    </div>
    <div class="view">
        <?php
        echo "view:" . $row["view"];
        ?>
    </div>
    <div class="price">
        <?php
        echo "Price:" . $row["price"];
        ?>
    </div>
    <div class="description">
        <?php
        echo $row["description"];
        ?>
    </div>
    <button class="button" onclick="message()" id="button">Add to Collection</button>
</div>
<footer>
    <div class="footer">
        <p>@Art Store 复旦大学版权所有 All rights reserved</p>
    </div>
</footer>
</body>
</html>