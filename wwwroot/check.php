<?php
session_start();
header("X-Content-Type-Options:nosniff;"); //反X-Content-Type-Options Header Missing漏洞,低危,ZAP扫描
header('X-Frame-Options:ALLOW-FROM https://himemory.191810.xyz/;'); // 修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
header('Content-Security-Policy: frame-ancestors https://himemory.191810.xyz/;'); // 针对chrome内核修复X-Frame-Options Header Not Set漏洞,低
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 12:12
@Auther: tiantian520
@Description: 身份验证
@Filename: check.php
Powered by HiMemory, @tiantian520
*/
//检查反CSRF令牌
if(!isset($_SESSION['token']) || !isset($_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"login.php\";</script>";
	die;
}
if (!($_SESSION['token'] === $_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"login.php\";</script>";
	die;
}
//检查验证码 防止机器刷服务器资源
if(!isset($_POST['authcode'])){
    echo "<script> alert(\"验证码错误！！\"); window.location.href=\"login.php\";</script>";
	die;
}
if(trim($_POST['authcode'])!=$_SESSION['authcode']){
    echo "<script> alert(\"验证码错误！\"); window.location.href=\"login.php\";</script>";
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
if (!isset($_POST['username']) || !isset($_POST['password'])){
    echo "<script> alert(\"提交信息错误。\"); window.location.href=\"login.php\";</script>";
    die;
}
/* 判断from地址是否是站内地址 */
if(!all_external_link($_POST['from'])){
    echo "<script> alert(\"提交信息错误。FROM BANNED.\"); window.location.href=\"login.php\";</script>";
    die;
}

/* from地址“.”个数过多可能是未检测到的外链，应该过滤 */
if(substr_count($_POST['from'],'.') >= 2){
    echo "<script> alert(\"提交信息错误。FROM BANNED.\"); window.location.href=\"login.php\";</script>";
    die;
}

/* 获取用户名以及密码 */
$username = $_POST['username'];
$password = $_POST['password'];
/* 判断用户名密码是否为空 */
if(empty($username) || empty($password)){
    echo "<script> alert(\"用户名或密码为空。\"); window.location.href=\"login.php\";</script>";
    die;
}
/* 判断用户名密码是否正确 */
$sql = 'SELECT * FROM users WHERE name = "'.htmlspecialchars(addslashes($username)).'" and password = "'.md5(htmlspecialchars(addslashes($password))).'"';
$result = $users_db->query($sql);
while($row = $result->fetchArray(SQLITE3_ASSOC)){
    //$INDEX_USERNAME = $row['name'];
    if($username == $row['name'] and md5($password) == $row['password']){
        setcookie("user",$username,time()+1800);
        setcookie("logon",md5($password),time()+1800);
        /* 拿返回地址并跳转 */
        echo "<script> window.location.href=\"".htmlspecialchars(addslashes($_POST['from']))."\";</script>";
        die;
    }else{
        echo "<script> alert(\"用户名或密码错误。\"); window.location.href=\"login.php?from=".htmlspecialchars(addslashes($_POST['from']))."\";</script>";
        die;
    }
}
echo "<script> alert(\"用户名或密码错误。\"); window.location.href=\"login.php?from=".htmlspecialchars(addslashes($_POST['from']))."\";</script>";
die;
?>