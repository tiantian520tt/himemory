<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta charset="utf-8">
<?php
/* 
@Date: 2023/1/4 12:04
@Auther: tiantian520
@Description: 后台登录页面
@Filename: ./admin/login.php
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
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>Hi Memory - Admin Login</title>
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/menu.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>		
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		<div id="wrapper_login">
			<div id="menu">
				<div id="left"></div>
				<div id="right"></div>
				<h2>HiMemory!</h2>
				<div class="clear"></div>		
			</div>
			<div id="desc">
				<div class="body">
					<div class="col w10 last bottomlast">
						<form action="check.php" method="post">
							<p>
								<label for="username">Username:</label>
								<input type="text" name="username" id="username" value="" size="40" class="text" />
								<br />
							</p>
							<p>
								<label for="password">Password:</label>
								<input type="password" name="password" id="password" value="" size="40" class="text" />
								<br />
							</p>
							<p class="last">
								<input type="submit" value="Login" class="novisible" />
								<a href="" class="button form_submit"><small class="icon play"></small><span>Login</span></a>
								<br />
							</p>
							<div class="clear"></div>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div id="body_footer">
					<div id="bottom_left"><div id="bottom_right"></div></div>
				</div>
			</div>		
		</div>
	</body>
</html>