<?php

session_start();
header("X-Content-Type-Options:nosniff;"); //反X-Content-Type-Options Header Missing漏洞,低危,ZAP扫描
header('X-Frame-Options:ALLOW-FROM https://himemory.191810.xyz/;'); // 修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
header('Content-Security-Policy: frame-ancestors https://himemory.191810.xyz/;'); // 针对chrome内核修复X-Frame-Options Header Not Set漏洞,低
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 12:12
@Auther: tiantian520
@Description: 注册验证
@Filename: register_check.php
Powered by HiMemory, @tiantian520
*/
//检查反CSRF令牌
if(!isset($_SESSION['token']) || !isset($_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"register.php\";</script>";
	die;
}
if (!($_SESSION['token'] === $_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"register.php\";</script>";
	die;
}


//检查验证码 防止机器刷服务器资源
if(!isset($_POST['authcode'])){
    echo "<script> alert(\"验证码错误！\"); window.location.href=\"register.php\";</script>";
	die;
}
if(trim($_POST['authcode'])!=$_SESSION['authcode']){
    echo "<script> alert(\"验证码错误！\"); window.location.href=\"register.php\";</script>";
	die;
}
/* include 网站配置 */
include './config/config.php';
/* 检查Cookie */
if (isset($_COOKIE["logon"]) && isset($_COOKIE["user"])){
	if($_COOKIE["logon"] == md5($admin_password) and $_COOKIE["user"] == $admin_username){
		echo "<script> alert(\"你已经登录！\"); window.location.href=\"index.php\";</script>";
		die;
	}
}
/* 判断是否提交了正确的内容 */
if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['re_password']) || !isset($_POST['qqid'])){
    echo "<script> alert(\"提交信息错误。\"); window.location.href=\"register.php\";</script>";
    die;
}
/* 获取用户名以及密码 */
$username = $_POST['username'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$qq_id = $_POST['qqid'];
/* 判断两次输入密码是否相同 */
if($password != $re_password){
    echo "<script> alert(\"两次密码输入不同，请重新输入！\"); window.location.href=\"register.php\";</script>";
    die;
}
/* 判断用户名密码是否为空 */
if(empty($username) || empty($password)){
    echo "<script> alert(\"用户名或密码为空。\"); window.location.href=\"register.php\";</script>";
    die;
}
/* 判断信息是否重复 */
$sql = 'SELECT * FROM users WHERE name = "'.htmlspecialchars(addslashes($username)).'" or qqid = "'.htmlspecialchars(addslashes($qq_id)).'"';
$result = $users_db->query($sql);
while($row = $result->fetchArray(SQLITE3_ASSOC)){
    //$INDEX_USERNAME = $row['name'];
    if($row['name']==htmlspecialchars(addslashes($username))){
        echo "<script>alert(\"用户名已被使用。\"); window.location.href=\"register.php\";</script>";
        die;
    }
    if($row['qqid'] == htmlspecialchars(addslashes($qq_id))){
        echo "<script>alert(\"QQ号已被使用或停用。\"); window.location.href=\"register.php\";</script>";
        die;
    }
}


/* SQL注入防护并向数据库添加用户 */
$username = htmlspecialchars(addslashes($username));
$password = md5(htmlspecialchars(addslashes($password)));
$type = 0; // 默认普通用户
$qq_id = htmlspecialchars(addslashes($qq_id));
$date_ = date('Y年m月d日 H时i分s秒');
$sql = "INSERT INTO users VALUES (null,'$username',0,0,'$password','$qq_id','呃，我是谁？','记录一些吧！','$date_','',0)";
$result = $users_db->exec($sql);
if($result){
    echo "<script> alert(\"成功！\"); window.location.href=\"login.php\";</script>";
    die;
}else{
    echo "<script> alert(\"出现错误！\"); window.location.href=\"register.php\";</script>";
    die;
}
?>