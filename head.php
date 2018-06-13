<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书管理系统</title>
</head>
<body>
<?php
$session = $_GET['session']?? "";
if(!empty($session)){
    session_destroy();
    header("location:./login.php");
}
session_start();
$username = $_SESSION['username'];
if(is_null($username)){
    header("location:./login.php");
};
?>
<div>
    <h3>当前登录用户:<?php echo $username?><a href="head.php?session=clear">退出登陆</a></h3>

</div>
