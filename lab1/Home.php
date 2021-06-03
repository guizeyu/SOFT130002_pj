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

$result1 = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks 
ORDER BY view LIMIT 0,1");
$result2 = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks 
ORDER BY view LIMIT 1,1");
$result3 = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks 
ORDER BY view LIMIT 2,1");
$result4 = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks 
ORDER BY view LIMIT 3,1");
$resultLeft = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks
ORDER BY timeReleased LIMIT 0,1");
$resultCenter = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks
ORDER BY timeReleased LIMIT 1,1");
$resultRight = mysqli_query($con, "SELECT artworkID,artist,title,timeReleased,description,price,view,imageFileName FROM artworks
ORDER BY timeReleased LIMIT 2,1");
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
$navLeft = mysqli_fetch_array($resultLeft);
$navCenter = mysqli_fetch_array($resultCenter);
$navRight = mysqli_fetch_array($resultRight);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/Home.css" media="all">
    <script src="resources/js/Home.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <title>Home</title>
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
                    <a href="Home.php">首页 </a>
                </li>
                <li>
                    <a href="Search.php">搜索 </a>
                </li>
                <li>
                    <a href="Show.php">详情 </a>
                </li>
                <li>
                    <a href="LogIn.html">登录 </a>
                </li>
                <li>
                    <a href="Register.html">注册 </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<hr>
<div class="nav2">
    <div class="box_big">
        <div class="box">
            <?php
            echo "<a href='Show.php?id=".$row1['artworkID']."'><img src='resources/img/" . $row1['imageFileName'] . "' width='600' height='400' class='img'></a>"
            ?>
        </div>
        <div class="box">
            <?php
            echo "<a href='Show.php?id=".$row2['artworkID']."'><img src='resources/img/" . $row2['imageFileName'] . "' width='600' height='400' class='img'></a>"
            ?>
        </div>
        <div class="box">
            <?php
            echo "<a href='Show.php?id=".$row3['artworkID']."'><img src='resources/img/" . $row3['imageFileName'] . "' width='600' height='400' class='img'></a>"
            ?>
        </div>
        <div class="box">
            <?php
            echo "<a href='Show.php'><img src='resources/img/" . $row4['imageFileName'] . "' width='600' height='400' class='img'></a>"
            ?>
        </div>
    </div>
    <div class="spot">
        <div class="spot_list">1</div>
        <div class="spot_list">2</div>
        <div class="spot_list">3</div>
        <div class="spot_list">4</div>
    </div>
    <div class="btn">
        <div class="left_btn"><span> < </span></div>
        <div class="right_btn"><span> > </span></div>
    </div>
</div>
<hr>
<div class="nav3">
    <div class="nav3_left">
        <?php
        echo "<a href='Show.php?id=".$navLeft['artworkID']."'><img src='resources/img/" . $navLeft['imageFileName'] . "' width='200' height='200' class='img'></a>"
        ?>
        <div class="name">
            <?php
            echo $navLeft ["title"]
            ?>
        </div>
        <div class="author">
            <?php
            echo $navLeft ["artist"]
            ?>
        </div>
        <div class="description">
            <?php
            echo $navLeft ["description"]
            ?>
        </div>
        <div class="link">
            <?php
            echo "<a href='Show.php?id=".$navLeft['artworkID']."'>Learn More</a>"
            ?>
        </div>
    </div>
    <div class="nav3_center">
        <?php
        echo "<a href='Show.php?id=".$navCenter['artworkID']."'><img src='resources/img/" . $navCenter['imageFileName'] . "' width='200' height='200' class='img'></a>"
        ?>
        <div class="name">
            <?php
            echo $navCenter ["title"]
            ?>
        </div>
        <div class="author">
            <?php
            echo $navCenter ["artist"]
            ?>
        </div>
        <div class="description">
            <?php
            echo $navCenter ["description"]
            ?>
        </div>
        <div class="link">
            <?php
            echo "<a href='Show.php?id=".$navCenter['artworkID']."'>Learn More</a>"
            ?>
        </div>
    </div>
    <div class="nav3_right">
        <?php
        echo "<a href='Show.php?id=".$navRight['artworkID']."'><img src='resources/img/" . $navRight['imageFileName'] . "' width='200' height='200' class='img'></a>"
        ?>
        <div class="name">
            <?php
            echo $navRight ["title"]
            ?>
        </div>
        <div class="author">
            <?php
            echo $navRight ["artist"]
            ?>
        </div>
        <div class="description">
            <?php
            echo $navRight ["description"]
            ?>
        </div>
        <div class="link">
            <?php
            echo "<a href='Show.php?id=".$navRight['artworkID']."'>Learn More</a>"
            ?>
        </div>
    </div>
</div>
<footer>
    <p class="footer">@Art Store 复旦大学版权所有 All rights reserved</p>
</footer>
</body>
<script>
    changePhoto();
</script>
</html>