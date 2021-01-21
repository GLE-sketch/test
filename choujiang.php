

<?php
session_start();
if(empty($_SESSION['user'])){
    echo "请先登录";
    header('Refresh:3,url=login.html');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <style>
        * {
            font-weight: 1000; 
        }

        .header {
            width: 400px;
        }

        img {
            width: 90px;
            height: 90px;
        }

        .img {
            width: 90px;
            height: 89px;
            float: left;
            margin: 10px;
            border: 2px solid #fff;
        }

        hr {
            width: 500px;
            margin-right: 1000px;
            clear: both;
        }

        .randClass {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <div id="timer"></div>
    <div id="warring"></div>
    <hr>
    <div class="header">
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div> 
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
        <div class="img"><img src="images/time.jpg" alt=""></div>
    </div>
    <hr>
    <button id="start">开始</button>
    <button id="stop">停止</button>
    <a href="Session.php">退出登录</a>
    <a href="yantianxia.php">去订座</a>
</body>

</html>
<script>
    $("#start").on("click",function () {
       

        var maxtime = 10 * 60;
       setInterval(function(){
            if (maxtime >= 0) {
                minutes = Math.floor(maxtime / 60);
                seconds = Math.floor(maxtime % 60);
                msg = "剩余时间" + "  " + "00" + ":" + minutes + ":" + seconds;
                document.all["timer"].innerHTML = msg;
                if (maxtime == 5 * 60);
                --maxtime;
            } else {
                clearInterval(timer);
                alert("时间到，结束!");
            }
        },1000)
       var timers = setInterval(function () {
            var rand = Math.floor(Math.random() * 100 % 9)
            $(".img").each(function (index) {
                $(this).removeClass("randClass")
                if (index == rand) {
                    $(this).addClass("randClass")
                }
            })
        },30)
        $("#stop").on("click",function(){
            clearAllTimers(timers)
            timers.splice(0,timers.length)
            $.ajax({
                    url: 'choujiang1.php',
                    method: 'get',
                    dataType: 'json'
                }).done(function(d){         //请求成功 回调函数 d为服务返回的数据
                    divs.empty()        // 清除 div中内容
                    divs.each(function(index){      // 遍历 div
                        if($(this).hasClass('border')){     //找到 包含选中样式的div
                            divs.eq(index).append(d.msg)        //在选中的div中显示中奖信息
                            $(this).css("background","white")
                        }
                    })
                    $("#btn2").unbind('click')          // 删除 之前绑定的事件，防止事件叠加

                })
    })
    })





</script>