<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>HiMemory - 导航</title>
<style>
html,body {
	width: 100%;
	height: 100%;
	font-family: "Microsoft Yahei", "SimSun", Arial;
	font-size:12px;
	overflow:hidden;
}
body,h3,ul,li {
	margin: 0;
	padding: 0;
}
h3,th{
	font-weight:normal;
}
.ul,ul li {
	list-style-type: none;
}
a{
	text-decoration: none;
}

.header {
	width: 100%;
	height: 50px;
	position: absolute;
	top: 0;
	line-height: 50px;
}

.header h3 {
	margin-left: 12px;
	color: #0075C7;
}

.mainBox {
	width: 100%;
	position: absolute;
	top: 50px;
	bottom: 0;
}

.mainBox .leftBox {
	height: 100%;
	width: 240px;
	float: left;
	overflow: auto;
	background: #f8f8ee;
	font-size: 12px;
	font-family: "Microsoft Yahei", "SimSun", Arial;
	border-right: 1px solid #D9D9D9;
	border-top: 1px solid #D9D9D9;
}

.menuItem a,.menuItem a:visited {
	padding-left: 20px;
	width: 220px;
	height: 32px;
	background-color: #f8f8f8;
	border-bottom: solid 1px #EAEAEA;
	border-top: solid 1px #FFFFFF;
	display: block;
	line-height: 32px;
	color: #000000;
}

.menuItem a:hover,.menuItem a:active {
	background: #f2f2f2;
	color: #0075c7;
}

.menuItem img {
	width: 18px;
	height: 18px;
	vertical-align: middle;
	margin-right: 10px;
}

.mainBox .rightBox {
	height: 100%;
	margin-left: 241px;
	padding-right: 1px;
	padding-left: 1px;
	border-left: 1px solid #E6E6E6;
	border-top: 1px solid #D9D9D9;
	overflow: auto;
}

.slideBtn {
	cursor: pointer;
	width: 1em;
	position: absolute;
	top: 40%;
	left: 1;
	display: block;
}

h1{
    font-family: "microsoft sans serif";
}

h2{
    font-family: "microsoft sans serif";
}
h3{
    font-family: "microsoft sans serif";
}
p{
    font-family: "microsoft sans serif";
}
i{
    font-family: "microsoft sans serif";
}

</style>
<script type="text/javascript"
	src="jquery.js"></script>
</head>

<body>
	<div class="header">
		<img src="./img/himemoryicon.png" width=70/> &nbsp&nbsp<img src="./img/arealogo.png"/>
	</div>
	<div class="mainBox">
        <br/>
		<div class="leftBox">
			<div class="menuItem description">
				<a href="readme.php?id=0">简介</a>
			</div>
			<div class="menuItem install">
				<a href="readme.php?id=1">安装并部署</a>
			</div>
			<div class="menuItem codeDescription">
				<a href="readme.php?id=2">代码详解</a>
			</div>
			<div class="menuItem programming">
				<a href="readme.php?id=3">二次开发须知</a>
			</div>
			<div class="menuItem updateLog">
				<a href="readme.php?id=4">更新日志</a>
			</div>
		</div>
        <div class="rightBox">
            <?php
            error_reporting(0);
            $content = array(
                "<h1>Hi, Memory!</h1><p>欢迎使用HiMemory程序。<br/>这个项目采用PHP5.x/HTML5/CSS3/JAVASCRIPT构建，运行在Nginx/Apache上，且兼容Linux/Windows操作系统。<br/>HiMemory是一种电子报纸。他同正常的报纸不同，他具有迅捷的更新速度和更低的阅读门槛；他同以往的电子报纸也不同，他是响应式的/高度自定义的/内容维护方便的/信息随刻更新的。（在往常，电子报纸通常以PDF/DOCX文件形式下放，这对移动手机十分不友好）<br/>本项目由tiantian520构建，这是他的<a href='https://github.com/tiantian520tt'>Github</a><br/>（他的真实名称由于需要上传至Github暂时隐藏，若您需要知道，那您肯定已经知道了）</p><h2>运行环境</h2><p>推荐环境：<br/>PHP 5.X<br/>Nginx<br/>Linux CentOS 7.9.*<br/>2 核心 2.6GHZ 以上 CPU<br/>2 GB 运行内存<br/>30 GB 硬盘空间<br/> 5M 宽带<br/>宝塔面板7.9.X（这不是必须的，但是十分推荐的）<br/></p>",
                "<h1>安装并部署</h1>在此之前，请先阅读“简介”并检查自己的服务器配置。<h2>0.1.1 安装环境</h2><p>这您应该在上一章节中已经做好了！</p><h2>0.2.1 上传源代码文件</h2><p>首先，您需要获取源代码文件。您可以通过Github、网页共享等方式拿到源代码。在正常情况下，当你正在阅读此文件的话，这一步您已经做好了。</p><h2>0.3.1 修改网页配置</h2><p>您需要打开网站目录下的./config/config.php<br/>这里有很多代码，但您千万不要去尝试随意修改它！（除非您正在开发）<br>您只需要修改这里：<br/><pre>\$admin_password = \"test\"; //管理员密码，必须设置<br/>\$admin_username = \"test\"; //管理员用户名，必须设置</pre><br/>这是十分要紧的事！如果不立即修改，可能会造成对网站的严重威胁！<br/></p><h2>0.4.1 查看您的首页</h2><p>尝试看看你的首页吧！输入您的 IP:PORT 并访问，可以看到，HiMemory在正常的工作了！（如果出现空白页面，那么请在config.php中注释掉error_reporting(0);这段代码，看看报错信息并找出原因所在，通常会出现opendir_src设置问题和权限问题）<br/></p><h2> 0.5.1 注册管理员账号</h2><p>您可能想问：<br/><i> 不是设置过账号密码了？怎么还要注册账号？</i><i> 刚刚config.php里设置的不算数吗？</i><br/>并不是不算数。为什么要注册呢，那是因为HiMemory的前端与后台的用户系统是互补的，同时也是分开的。后台密码为了安全，是需要单独去设置的。而前台的管理员账号注册，是为了让数据库中存在管理员这个用户。<br/>在您的首页顶部，应该会有登录字样。点开它！并且点击下方的“还没有账号？立即注册”。您只需要按规定填写您的信息并注册账户，这一切便完成了。（请放心，您的密码采用md5加密存放在SQLite数据库中）<br/>按理来说，您的安装应该结束了！但并不然，我们需要设置一些东西让系统变得井井有条。<br/></p><h2>0.6.1 设置定时更新新闻</h2><p>您的首页新闻信息，有一部分是需要您自己设置的，有一部分是自动更新的。可以自己设置的部分在后台页面可以查看到。(./admin/articles.php)，其余的部分要不然是还没做好更新，要不然就是自动更新的。<br/>例如，在新闻专栏的左侧（PC端是如此），一些实时新闻是自动更新的，但是需要您自行配置。<br/></p><h3>0.6.2 宝塔面板配置方法</h3><p>（若您不是宝塔面板，请参考0.6.3）<br/>打开宝塔面板，并点击计划任务栏。添加一个定时任务，任务类型为访问URL，URL地址为 您的服务器网址/config/request.php，且设置执行周期为30分钟一次。至于任务名称就随你的心意了！<br/>添加任务后，点击“执行”试试看。如果不出意外，回到首页时，你将看到新的新闻内容在新闻专栏中更新了！<br/></p><h3> 0.6.3 非宝塔面板方法</h3>若您不是宝塔面板，也是有别的方法的。若您是在自己的服务器上搭建，且拥有执行程序的权限，那您可以尝试用python脚本来实现这一操作。它可以这样写：<br/><pre>import time<br/>import requests<br/>while True:<br/>&nbsp&nbsp&nbsp&nbsprequests.get('您的服务器网址/config/request.php')<br/>&nbsp&nbsp&nbsp&nbsptime.sleep(1800)<br/></pre>运行这个脚本的话，您应该就可以实现如同宝塔面板一样的效果了。<br/><i>请务必注意！Linux用户请安装screen并使用screen将python程序保持运行，否则在您断开ssh后，可能会失效。</i><br/>如果您是虚拟主机用户，也不要气馁！您可以先咨询您的云服务商寻求帮助。（若使用php脚本后台常驻的话，我想大部分主机商是不允许的，因为这将会大大耗费服务器资源，且十分危险，通常这是黑客的行为）<br/></p><br/><h2>0.7.1 设置禁止访问的目录</h2><p>绝大大大大大大大大大大大大大大大大部分的厂商都会允许您设置目录访问权限。（如果没有的话，呃，您应该考虑和他们好好谈谈）<br/>您需要设置的内容如下：<br/><b>禁止database目录的访问（十分重要！！！)</b><br/><b>禁止config目录的访问权限</b><br/><b>（如果可以的话）限制admin目录的访问ip，将其设置为您常用的IP段</b><br/><br/><br/><br/><h2>总结</h2><p>至此，您的安装就结束了！</p><br/><br/><h2>Q & A</h2><br/><i>Q: 遇到问题！访问主页没有内容！</i><br/><i>A: 第一步，检查您目录下database目录以及config目录的访问权限，将其设置为777（若您是linux的话）；第二步，将nginx/apache/php配置文件中的opendir_src配置（防跨站）注释掉，检查是否解决；若还没有解决，请前往config.php注释掉error_reporting(0);，看看错误信息是什么并且和百度深度交流。通常在这两步结束后，您的问题会得到解决的。<br/><i>Q: 注册时总是提示我验证码错误！（或注册报错）</i><br/><i>A: 检查您的服务起是否开启了PHP SESSION和COOKIE，并检查您是否键入正确的验证码。</i><br/><i>Q: 注册/登录时提示我CSRF令牌错误！</i><br/><i>A: 这十分常见。为了安全，HiMemory启用了反CSRF令牌机制。您可以重试登录或切换浏览器，若问题还是没有解决，您也需要检查一下PHP SESSION/COOKIE的状态。如果还是没有办法解决的话，您可以尝试修改check.php和register_check.php，注释掉csrf令牌验证的内容。注意！这可能会让您的网站变得危险。<br/></i><br/><br/><br/><br/><br/><br/><br/> (At the end，呃，error目录下有自定义的404页面，如果需要可以试试？)",
                "<h1>所有的代码都有注释，您可以自行翻阅。感谢您的支持！</h1>",
                "<p>请先阅读原有代码，并且观察数据库来弄懂数据库体系，先自行编写单一功能实现代码，等实现后迁移到HiMemory上。我们十分欢迎您提交Pull Request!",
                "<h1> 2023/1/18 V0.0.1 </h1><h2>包含大量安全性更新。</h2><p>&nbsp&nbsp1. 修复大量CSRF问题，设置了CSRF令牌。</p><p>&nbsp&nbsp2. 设置iframe限制，修复部分iframe漏洞</p><p>&nbsp&nbsp 更多信息暂不公布。</p>"
            );
            try{
                echo $content[(int)$_GET['id']];
            }catch(Exception $e){
                echo $content[0];
            }
            ?>
        </div>
	</div>
    
	
</body>
</html>

