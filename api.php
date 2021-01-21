<?php
//$cook=implode (',',$_G);
$id=$_GET['user_ids'];


$link = mysqli_connect('127.0.0.1','root','root','cms');
$sql = "select id,name,em,last_logiin,`time` from fors where id='{$id}'";
$res= mysqli_query($link,$sql);
$arr = mysqli_fetch_assoc($res);
echo json_encode($arr);
