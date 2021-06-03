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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/Search.css" media="all">
    <script src="resources/js/Search.js"></script>
    <meta charset="UTF-8">
    <title>search</title>
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
    <form method="get">
        <input type="text" placeholder="请输入艺术家或艺术品" name="key"/>
        <button type="submit" name="button">搜索</button>
    </form>
    <?php
    $key = $_GET['key'];
    $result = mysqli_query($con, "SELECT * FROM artworks
WHERE title like '%$key%' ORDER BY view");
    $row = mysqli_fetch_array($result);
    ?>
    <div class="result">
        <button class="sort">结果排序方式</button>
        <div class="result-content">
            <a href="#">浏览量排序</a>
            <a href="Search2.php">价格排序</a>
        </div>
    </div>
</div>
<?php
//foreach ($row as $value) {
//    echo "<div class='img1'>
//    <div class='img'>
//       <img src='resources/img/" . $row['imageFileName'] . "'width='200' height='200'>
//    </div>
//    <div class='side'>
//        <div class='author'>
//            $value.artist;
//        </div>
//        <div class='name'>
//           $row.title;
//        </div>
//        <div class='price'>
//            Price: . $row.price;
//        </div>
//        <div class='description'>
//            echo $row.description;
//        </div>
//    </div>
//</div>";
//}
?>
<div class="img1">
    <div class="img">
        <?php
        echo "<img src='resources/img/" . $row['imageFileName'] . "'width='200' height='200'>"
        ?>
    </div>
    <div class='side'>
        <div class='author'>
            <?php
            echo $row["artist"];
            ?>
        </div>
        <div class='name'>
            <?php
            echo $row["title"];
            ?>
        </div>
        <div class='price'>
            <?php
            echo 'Price:' . $row["price"];
            ?>
        </div>
        <div class='description'>
            <?php
            echo $row["description"];
            ?>
        </div>
    </div>
</div>

<div class="pagination">
    <ul class="pagination">
        <li><a href="#">«</a></li>
        <li><a class="active" href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>
<footer>
    <p class="footer">@Art Store 复旦大学版权所有 All rights reserved</p>
</footer>
</body>
</html>
