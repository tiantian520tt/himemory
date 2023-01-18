<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<?php
/* 
@Date: 2023/1/4 12:04
@Auther: tiantian520
@Description: 用户注册页面
@Filename: register.php
Powered by HiMemory, @tiantian520
*/
/* include 网站配置 */
include './config/config.php';
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
		<title>Hi Memory - User Register</title>
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/menu.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>		
		<link rel="stylesheet" href="css/login.css" type="text/css" media="screen" charset="utf-8" />
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
						<form action="register_check.php" method="post">
						    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
							<p>
								<label for="username">用户名:</label>
								<input type="text" name="username" id="username" value="" size="35" class="text" />
								<br />
							</p>
							<p>
								<label for="password">密码:</label>
								<input type="password" name="password" id="password" value="" size="35" class="text" />
								<br />
							</p>
                            <p>
								<label for="password">重复密码:</label>
								<input type="password" name="re_password" id="re_password" value="" size="35" class="text" />
								<br />
							</p>
                            <p>
								<label for="password">QQ号:（一个QQ号仅允许注册一次，且不允许盗用他人QQ号）</label>
								<input type="text" name="qqid" id="qqid" value="" size="35" class="text" />
								<br />
							</p>
							<p>
								<label for="authcode">验证码：</label>
								<img src="authcode.php" id="authimg" onclick="this.src='authcode.php?id='+Math.random()" />
								<input type="text" name="authcode" id="authcode" value="" size="35" class="text" />
								<br />
							</p>
							
							
							<p class="last">
								<input type="submit" value="注册" class="novisible" />
								<a href="" class="button form_submit"><small class="icon play"></small><span>注册</span></a><br/>
								<a href="login.php">注册过了？点击登录</a>
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