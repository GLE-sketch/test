
  <?php 
     //查询房间数据遍历数组
    session_start();
    if(empty($_SESSION['user'])){
        echo "请先登录";
        header('Refresh:3,url=login.html');
        exit;
    }
     include ("pdo.php");
     $pdo = getPdo();
     $sql = "select * from p_rooms";
     $res = $pdo->query($sql);
     $data = $res->fetchAll(PDO::FETCH_ASSOC);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <style>

        body{
            background:pink;
        }
        * {
            list-style: none;
            padding: 0;
            margin: 0;
            font-family: 宋体;
        }
        
        .banner{
            width:650px;
            height:650px;
            margin: 50px auto;
        }
        li {
            width: 100px;
            height: 120px;
            background: green;
            float: left;
            margin: 10px;
            border-radius: 2px;
            border-radius: 0px 0px 10px 10px;
            text-align:center;
        }

        button {
            height:40px;
            width:100%;
            border: 0px;
            border-radius: 0px 0px 10px 10px;
            cursor:pointer;
        }

        p {
            font-size: 50px;
            color: #fff;
        }

        .red{
            background-color: red;
        }
        .green{
            background-color: green;
        }
    </style>
</head>
<body>
        <div class="banner">
        <h1><span></span></h1>  
        <br>
        <h3>宴天下管理中心   
            <a href="choujiang.php">去抽奖</a>
            <a href="Session.php">退出登录</a>
        </h3>
        <?php foreach($data as $k=>$v){?>
            <?php 
                   $class = [
                       'green','red'
                   ];
                   $class_add = $class[$v['status']]                 
                ?>
            <li class="<?php echo $class_add;?>">
                <button class='but' set-id="<?php  echo $v['id'];?>">
                    <?php echo $v['status']==0?'预定':'已被预定';?>
                    <?php  echo "<br>"; echo "￥".$v['price']/100;?>
                </button>
                <p><?php echo $v['name'];?></p>
            </li>
            <?php };?>
        </div>  
</body>
</html>
<scrIpt>
   
    function time() {
        var date = new Date()
        var full = aaa(date.getFullYear())
        var mont = aaa(date.getMonth() + 1)
        var get = aaa(date.getDate())
        var hour = aaa(date.getHours())
        var minu = aaa(date.getMinutes())
        var seco = aaa(date.getSeconds())
        var str = full + "年" + mont + "月" + get + "日" + " " + hour + ":" + minu + ":" + seco
        $("span").text(str)
    }
    function aaa(val){
        return val>=10?val:"0"+val
    }
     setInterval(function(){
          time()
     },1000)
      time()
  
      $(".but").click(function () {
         var self = $(this)
         var id = self.attr("set-id")
         if(confirm("确认预定?")){
             $.ajax({
                 url:'yuding.php',
                 method:'get',
                 dataType:'json',
                 data:{id:id},
             }).done(function(data){
                 if(data.errno==0){
                     alert("预定成功")
                 }
             })
         }
        $(this).parent("li").css("background", 'red')
        $(this).text("已预定")
    })


</scrIpt>