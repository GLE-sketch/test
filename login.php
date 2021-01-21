<?php 
      
    $name = $_POST['name'];  
    $pwd = $_POST['pwd'];   
    include("data.php");
    if(empty($name)){
        $response = [
            'error' => 30000,
            'font' => '账号必填'
        ];
         exit(json_encode($response));
    }
    if(empty($pwd)){
        $response = [
            'error' => 40000,
            'font' => '密码必填'
        ];
         exit(json_encode($response));
    }
    $sql = "select em,name,pwd,id from fors where (id='$name' or em = '$name' or name = '$name' or pwd='$pwd' or tel = '$name')";
    $res = mysqli_query($link,$sql);
    $info = mysqli_fetch_assoc($res);  
    // print_r($info);exit;
    if($info){
        if(password_verify($pwd,$info['pwd'])){
            session_start();
            $_SESSION['user']=$info['name'];
            $_SESSION['id']=$info['id'];
            setcookie('user_names',$info['name'],time()+86400*7);
            setcookie('user_ids',$info['id'],time()+3600*24*7);
            $time = time();
            $sql="update fors set last_logiin='$time' where id = $info[id]";
            $res= mysqli_query($link,$sql);

              $response = [
                'error' => 0,
                'font' => '登录成功'
            ];
             exit(json_encode($response));
        }else {
            $response = [
                  'error' => 1,
                  'font' => '密码或账号有误'
              ];
               exit(json_encode($response));
        }
    }
    
?>