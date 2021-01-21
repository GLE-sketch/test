<?php
session_start();
unset($_SESSION['user']);
setcookie('user_names','',time()-1);
setcookie('user_ids','',time()-1);
echo "正在退出";
header('Refresh:2,url=login.html');