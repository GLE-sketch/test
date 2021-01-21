
<?php
session_start();
if(empty($_SESSION['user'])){
    echo "请先登录";
    header('Refresh:3,url=login.html');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>个人中心</h1>
<h2><span id="time"></span></h2>
<h2>用户邮箱:</h2><h3><span id="a"></span></h3>
<br>
<h2>上一次登录时间:</h2><h3><span id="b"></span></h3>
<br>
<h2>注册时间:</h2><h3><span id="c"></span></h3>

<button><a href="yantianxia.php">订座</a></button>
<button><a href="Session.php">退出</a></button>
<script src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/function.js"></script>
<script src="./js/cook.js"></script>
</body>
</html>
