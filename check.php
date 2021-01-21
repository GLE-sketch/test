<?php 
   $name = $_GET['name'];
   include("data.php");
   $name_sql = "select * from fors where name='$name' or em='$name' or tel='$name'";
   $name_res = mysqli_query($link,$name_sql);
   $name_info = mysqli_fetch_assoc($name_res);
   
   if($name_info){
        $response = [
            'error' => 1,
            'font' => '已存在'
        ];
        exit(json_encode($response));
    }else {
        $response = [
            'error' => 0,
            'font' => '√'
        ];
        exit(json_encode($response));
}
?>