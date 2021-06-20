<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web"; //自己创建的数据库名

$user = $_POST['user'];  //获取用户文本框内容
$pass = $_POST['pass'];  //获取密码文本框内容
$confirm = $_POST['confirm']; //获取确认密码文本框内容

//if($user == ''){  //判断用户，密码两项输入值是否为空
//    echo '<script>alert("请输入用户名!");history.go(-1);</script>'; //php内alert弹窗返回上一页面
//    exit(0);
//}
//else if($pass == ''){
//    echo '<script>alert("请输入密码!");history.go(-1);</script>';
//    exit(0);
//}
//else if(preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]){2,}$/',$pass)){
//    echo "<script>alert('密码要求既有数字又有字母');history.go(-1);</script>";
//    exit(0);
//}
//else if($pass != $confirm){ //判断密码和确认密码是否一致
//    echo '<script>alert("两次密码不一致!");history.go(-1);</script>';
//    exit(0);
//}
//else if($pass == $confirm){
//    $conn = new mysqli($servername,$username,$password,$dbname); //连接数据库
//    if($conn->connect_error){
//        die("数据库连接失败:".$conn->connect_error);
//        exit(0);
//    }else{
//        $sql = "INSERT into users (name ,password) values ('$user','$pass')";  //插入匹配到的用户名，密码，确认密码的值
//        if($conn->query($sql) === TRUE){
//            echo "<script>alert('注册成功!')</script>";
//            echo '<script>window.location="Home.php"</script>';
//        }else{
//            echo "<script>alert('用户名已存在！')</script>";
//            echo '<script>window.location="Register.php"</script>';
//        }
//    }
//}
$conn = new mysqli($servername,$username,$password,$dbname); //连接数据库
    if($conn->connect_error) {
        die("数据库连接失败:" . $conn->connect_error);
        exit(0);
    }else{
        $sql = "INSERT into users (name ,password) values ('$user','$pass')";  //插入匹配到的用户名，密码，确认密码的值
        $res=mysqli_query($sql);
        if ($res){
            echo "<script>alert('注册成功!')</script>";
            echo '<script>window.location="Home.php"</script>';
        }else{
            echo "<script>alert('用户名已存在！')</script>";
            echo '<script>window.location="Register.php"</script>';
        }
    }
mysqli_close($conn);  //关闭数据库连接
