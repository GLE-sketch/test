<?php 

  $id = $_GET['id'];
  include "pdo.php";
  $pdo = getPdo();
  $sql = "update p_rooms set status='1' where id=$id";
  $res = $pdo->query($sql);
  if($res){
    $response = [
        'errno' => 0,
        'msg'   => 'ok'
    ];

    die(json_encode($response));
  }else {
    $response = [
        'errno' => 1,
        'msg'   => 'no'
    ];

    die(json_encode($response));
  }

 
 

?>