<?php
session_start();
if(isset($_SESSION['login_user']) || isset($_COOKIE['cookiename'])){
session_destroy();
if(isset($_COOKIE['cookiename'])){
    setcookie('cookiename',"",time()-3600,'/');
}
header("location:./index.php");
}else{
    header("location:./index.php");
}


?>