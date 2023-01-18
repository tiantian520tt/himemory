<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

/* 
@Date: 2023/1/4 18:08
@Auther: tiantian520
@Description: 后台文章管理
@Filename: ./admin/articles.php
Powered by HiMemory, @tiantian520
*/

/* include 网站配置 */
include '../config/config.php';
/* 检查Cookie */
if (!isset($_COOKIE["logon"]) && !isset($_COOKIE["user"])){
  echo "<script> alert(\"你尚未登录！\"); window.location.href=\"login.php\";</script>";
  die;
}
if($_COOKIE["logon"] != md5($admin_password) || $_COOKIE["user"] != $admin_username){
  echo "<script> alert(\"你尚未登录！\"); window.location.href=\"login.php\";</script>";
  die;
}

//$sql = "select count(*) from articles";
//$article_count = $article_db->querySingle($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>HiMemory - Admin - Articles</title>
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/menu.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE 6]>
			<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->		
	</head>
	<body>
		<div id="header">
		<div class="col w5 bottomlast">
				<a href="" class="logo">
				<img src="../img/arealogo.png" alt="Logo" width="100"/>
				</a>
			</div>
			<div class="col w5 last right bottomlast">
			<p class="last">Logged in as <span class="strong"><?php echo $admin_username; ?>,</span> <a href="logout.php">Logout</a></p>
			</div>
			<div class="clear"></div>
		</div>
		<div id="wrapper">
			<div id="minwidth">
				<div id="holder">
					<div id="menu">
						<div id="left"></div>
						<div id="right"></div>
						<ul>
						<li>
								<a href="index.php"><span>总览</span></a>
							</li>
							<li>
								<a href="users.php"><span>用户</span></a>
							</li>
							<li>
								<a href="articles.php" class="selected"><span>文章与排版</span></a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div id="submenu">
						<div class="title">
							文章 与 排版
						</div>
					</div>
					<div id="desc">
						<div class="body">
							<div class="col w2">
								<div class="content">
									<div class="box header">
										<div class="head"><div></div></div>
										<h2>预览排版</h2>
										<div class="desc">
											<p>查看您的首页，并修改对应区域的文章。</p>
										</div>
										<div class="bottom"><div></div></div>
									</div>
									<?php
										/* 
										<a href="" class="button form_submit"><small class="icon check"></small><span><input type='submit' class="novisible" ></input>现在！</span></a>*/
										$sql = "SELECT * FROM news";
										$result = $news_db->query($sql);
										while($row = $result->fetchArray(SQLITE3_ASSOC)){
											echo '<div class="box header"><div class="head"><div></div></div><h2>新闻 - ID'.$row['id'].'</h2><div class="desc"><p>在下方修改这一部分</p>';
											echo '<form action="change.php" method="post"><input name="id" value="'.$row['id'].'" class="novisible"/><input class="text w_20" type="text" name="img" value="'.$row['img'].'"/><br/><input type="text" class="text w_20" name="title" value="'.$row['title'].'"/><br/><textarea name="content" rows="20" cols="40">'.$row['content'].'</textarea><br/><br/><a href="" class="button form_submit"><small class="icon check"></small><span><input type=\'submit\' class="novisible" ></input>现在！</span></a><br/></form></div><div class="bottom"><div></div></div></div>';
										}

									?>
								</div>
							</div>

							<div class="col w8 last">
								<div class="content">
								<?php for($i = 1;$i <= 41;$i++) echo '&nbsp'; ?><iframe src="../index.php" width="1200px" height="7000px" frameborder="0" scrolling="yes"></iframe>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div id="body_footer">
							<div id="bottom_left"><div id="bottom_right"></div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
		<br/><br/><br/><br/><p class="last">Copyright 2023 - Skyline Studio & tiantian520 - Powered by HiMemory!</p>
		</div>		
	</body>
</html>