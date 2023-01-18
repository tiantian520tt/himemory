<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 17:38
@Auther: tiantian520
@Description: 后台用户管理
@Filename: ./admin/users.php
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

$sql = "select count(*) from users";
$user_count = $users_db->querySingle($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>HiMemory - Admin - Users</title>
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
								<a href="users.php" class="selected"><span>用户</span></a>
							</li>
							<li>
								<a href="articles.php"><span>文章与排版</span></a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div id="submenu">
						<div class="modules_left">
							<div class="module buttons">
								<a href="" class="dropdown_button"><small class="icon bar_graph"></small><span>Statistics</span></a>
								<div class="dropdown">
									<div class="arrow"></div>
									<div class="content">
										<ul>
											<li><span class="strong">All Users:</span> <?php echo $user_count; ?></li>
										</ul>
										<a class="button red right close"><small class="icon cross"></small><span>Close</span></a>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="title">
							Users
						</div>
						<div class="modules_right">
							<div class="module search">
								<form action="users.php">
									<p><input type="text" value="Search..." name="user_search" /></p>
								</form>
							</div>
						</div>
					</div>
					<div id="desc">
						<div class="body">
							<div class="col w10 last">
								<div class="content">
									<?php 
									/* <div class="shelf">
										<div class="left"></div>
										<div class="right"></div>
										<div class="inside">
											<div class="books">
												<div class="col w2">
													<a href="">
														<span>Username</span>
														<img src="images/shelf_sample_image.png" alt="" />
													</a>
												</div>
												
											</div>
										</div>
										<div class="clear"></div>
									</div>*/
									if (isset($_GET['user_search'])){
										$user_search = $_GET['user_search'];
										$sql = "SELECT * FROM users WHERE name LIKE '%$user_search%'";
										$result = $users_db->query($sql);
										$cnt = 0;
										echo '<div class="shelf"><div class="left"></div><div class="right"></div><div class="inside"><div class="books">';
										while($row = $result->fetchArray(SQLITE3_ASSOC)){
											if($cnt>=5){
												echo '</div></div><div class="clear"></div></div>';
												echo '<div class="shelf"><div class="left"></div><div class="right"></div><div class="inside"><div class="books">';
												$cnt = 0;
											}
											echo '<div class="col w2"><a href=""><span>';
											echo $row['name'];
											echo '</span><img src="http://q2.qlogo.cn/headimg_dl?dst_uin='.$row['qqid'].'&spec=100" alt=""/></a></div>';
											$cnt++;
										}
									}
									else{
										$sql = "SELECT * FROM users";
										$result = $users_db->query($sql);
										$cnt = 0;
										echo '<div class="shelf"><div class="left"></div><div class="right"></div><div class="inside"><div class="books">';
										while($row = $result->fetchArray(SQLITE3_ASSOC)){
											if($cnt>=5){
												echo '</div></div><div class="clear"></div></div>';
												echo '<div class="shelf"><div class="left"></div><div class="right"></div><div class="inside"><div class="books">';
												$cnt = 0;
											}
											echo '<div class="col w2"><a href=""><span>';
											echo $row['name'];
											echo '</span><img src="http://q2.qlogo.cn/headimg_dl?dst_uin='.$row['qqid'].'&spec=100" alt=""/></a></div>';
											$cnt++;
										}
									}
									
									?>
								</div>
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
				<br/><br/><br/><br/>
				<div id="pie2" ,align ="left"></div>
				<style>
        #pie2 { //设置饼图大小
            width: 600px;
            height: 600px;
        }
    </style>
	<script src="./js/echarts.js"></script>
    <script>
        // 饼状图
        // 基于准备好的dom，初始化echarts实例
        var pie2 = echarts.init(document.getElementById('pie2'));
        // 指定图表的配置项和数据
        pie2Option = {
            // 标题
            title: {
                 text: '用户访问统计',
				 left:'0%',
				 top:'0%'
				 //align="center"
				 //text-align:center
            },
            // 图例
            tooltip: {
                show: true,
                trigger: "item",
                backgroundColor: "#1677FF",
                // {a}（系列名称），{b}（数据项名称），{c}（数值）, {d}（百分比）
                formatter: "{a}：{b}<br/>{c}个({d}%)"
            },
            // 不同区域的颜色
            color: ['#3e87ff', '#c0c0c0', '#b9cfec','#191970','#4B0082','#44ff99', '#8B0000',
			 '#0000ff','#ff1100', '#ff6600', '#ffbb00', '#020302','#ff0000','#ff00ff','#DC143C',
			 '#808000','#5F91A0','#FF1493','#000000','#008080','#800000','#FFFFFF','#006400'],
            series: [
                {
                    name: '用户',
                    type: 'pie',
                    // 数组的第一项是内半径，第二项是外半径；可以设置不同的内外半径显示成圆环图
                    radius: '50%',
                    // 饼图的中心（圆心）坐标，数组的第一项是横坐标，第二项是纵坐标；设置成百分比时第一项是相对于容器宽度，第二项是相对于容器高度
                    center: ['10%', '30%'],
                    data: [
						<?php 
						//{ value: 9795, name: '创业' }
						$sql = "SELECT user, COUNT(id) AS nums FROM visitors GROUP BY user";
						$result = $visitors_db->query($sql);
						while($row = $result->fetchArray(SQLITE3_ASSOC)){
							if($row['user'] == null) $user = '游客';
							else{
								$sql = 'SELECT * FROM users WHERE id = '.$row['user'];
								$re = $users_db->query($sql);
								while($row_ = $re->fetchArray(SQLITE3_ASSOC)){
									$user = $row_['name'];
								}
							}
							echo "{ value: ".$row['nums'].", name: '".$user."' },";
						}
						?>
                    ],
                    itemStyle: {
                        // 显示图例
                        normal: {
                            label: {
                                show: true
                            },
                            labelLine: {
                                show: true
                            }
                        },
                        emphasis: {
                            // 图形阴影的模糊大小
                            shadowBlur: 10,
                            // 阴影水平方向上的偏移距离
                            shadowOffsetX: 0,
                            // 阴影颜色
                            shadowColor: 'rgba(0, 0, 0, 1.5)'
                        }
                    }
                }
            ]
        };
        pie2.setOption(pie2Option);
    </script>
			</div>
		</div>
		<div id="footer">
		<br/><br/><br/><br/><p class="last">Copyright 2023 - Skyline Studio & tiantian520 - Powered by HiMemory!</p>
		</div>		
	</body>
</html>