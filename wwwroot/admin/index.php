<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 12:25
@Auther: tiantian520
@Description: 后台主页
@Filename: ./admin/index.php
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>HiMemory! - Admin</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>
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
								<a href="index.php" class="selected"><span>总览</span></a>
							</li>
							<li>
								<a href="users.php"><span>用户</span></a>
							</li>
							<li>
								<a href="articles.php"><span>文章与排版</span></a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		/* 显示登录成功消息 */
		if (isset($_GET['status']))
			if ($_GET['status'] == $admin_username){
				echo '<div id="message" class="help"><div class="col w10 last"><div class="content"><div class="success"><div class="tl"></div><div class="tr"></div><div class="desc"><p>登录成功。欢迎您，'.$admin_username.'！</p></div><div class="bl"></div><div class="br"></div></div></div></div><div class="clear"></div></div>';
			}
		?>
		<!-- 统计 -->
		<div class="box header">
		<div class="head"><div></div></div>
		<h2>统计</h2>
		<div class="desc">
		<p>累计共有 <b><?php echo file_get_contents("../count.count"); ?></b> 人访问HiMemory!</p>
		<div id="pie" ,align ="left"></div>
				<style>
        #pie { //设置饼图大小
            width: 600px;
            height: 600px;
        }
    </style>
	<script src="./js/echarts.js"></script>
    <script>
        // 饼状图
        // 基于准备好的dom，初始化echarts实例
        var pie = echarts.init(document.getElementById('pie'));
        // 指定图表的配置项和数据
        pieOption = {
            // 标题
            title: {
                 text: '各地访客统计',
				 left:'0%'
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
                    name: '地区',
                    type: 'pie',
                    // 数组的第一项是内半径，第二项是外半径；可以设置不同的内外半径显示成圆环图
                    radius: '50%',
                    // 饼图的中心（圆心）坐标，数组的第一项是横坐标，第二项是纵坐标；设置成百分比时第一项是相对于容器宽度，第二项是相对于容器高度
                    center: ['10%', '30%'],
                    data: [
						<?php 
						$sql = "SELECT province, COUNT(id) AS nums FROM visitors GROUP BY province";
						$result = $visitors_db->query($sql);
						while($row = $result->fetchArray(SQLITE3_ASSOC)){
							if($row['province'] == null) continue;
							echo "{ value: ".$row['nums'].", name: '".$row['province']."' },";
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
        pie.setOption(pieOption);
    </script>
	<br/>
	
		</div>
		</div>
		<!-- 发布 -->
		<div class="box header">
		<div class="head"><div></div></div>
		<h2>随手发布</h2>
		<div class="desc">
			<div class="col w5 last">
				<div class="content">
					<form action="action.php" method="post">
						<input type="text" name="title" value="标题" class="text w_20"><br/>
						<input type="text" name="img" value="图片" class="text w_20"><br/>
						<textarea rows="20" cols="150" name="content">在这里写一些吧……</textarea>
						<a href="#" class="button form_submit"><small class="icon check"></small><span>提交</span><input type="submit" value="Submit" class="novisible" /></a>
						<br>
					</form>
				</div>
			</div>
		</div>
		</div>
		<div class="bottom"><div></div></div>
		</div>
		<div id="footer">
			<br/><br/><br/><br/><p class="last">Copyright 2023 - Skyline Studio & tiantian520 - Powered by HiMemory!</p>
		</div>
	</body>
</html>