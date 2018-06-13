<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
</head>
<body>
<?php

$username = $_POST['username'] ?? "";
$password = $_POST['pass'] ?? "";
    if(!empty($username) && !empty($password) ){
        require_once "./db.php";
        $db = new \MongoDB\Driver\db_help();
        $cur = $db->is_admin($username, $password);
        if(is_null($cur)){
            echo "账号密码错误";
        }else{
            session_start();
           $_SESSION['username'] = $username;
            header("location:./index.php");exit;
        }
    }
?>
<form method="post" action="./login.php">
    <div>
        <label>用户名</label><input type="text" name="username">
        </br>
        <label>密码</label><input type="password" name="pass">
        </br>
        <input type="submit" value="登陆">
    </div>
</form>

</body>
</html>