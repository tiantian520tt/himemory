<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 12:12
@Auther: tiantian520
@Description: 身份验证
@Filename: ./admin/check.php
Powered by HiMemory, @tiantian520
*/
/* include 网站配置 */
include '../config/config.php';
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
/* 获取用户名以及密码 */
$username = $_POST['username'];
$password = $_POST['password'];
/* 判断用户名密码是否为空 */
if(empty($username) || empty($password)){
    echo "<script> alert(\"用户名或密码为空。\"); window.location.href=\"login.php\";</script>";
    die;
}
/* 判断用户名密码是否正确 */

if ($username == $admin_username){
    if ($password == $admin_password){
            setcookie("user",$username,time()+1800);
            setcookie("logon",md5($password),time()+1800);
            echo "<script> window.location.href=\"index.php?status=$username\";</script>";
            die;
    }else{
        echo "<script> alert(\"用户名或密码错误。\"); window.location.href=\"login.php\";</script>";
	    die;
    }
}else{
        echo "<script> alert(\"用户名或密码错误。\"); window.location.href=\"login.php\";</script>";
    	die;
}

?>