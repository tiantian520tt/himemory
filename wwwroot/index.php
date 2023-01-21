<?php
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">';
// 自适应以及编码
echo '<meta charset="utf-8">';
/* 
@Date: 2023/1/3 11:17
@Auther: tiantian520
@Description: 首页
@Filename: index.php
Powered by HiMemory, @tiantian520
*/
/* include 网站配置 */
include './config/config.php';

function getNews($id){
  $sql = 'SELECT * FROM news WHERE id = '.$id;
  global $news_db;
  $result = $news_db->query($sql);
  while($row = $result->fetchArray(SQLITE3_ASSOC)){
    return $row;
  }
}

/* 访问统计！ */
$count = file_get_contents("count.count");
$count++;
file_put_contents("count.count","$count");

/* Check Cookie!!!! */
if (isset($_COOKIE["logon"]) and isset($_COOKIE["user"])){
	//if($_COOKIE["logon"] == md5($admin_password) and $_COOKIE["user"] == $admin_username){
	//	echo "<script> alert(\"你已经登录！\"); window.location.href=\"index.php\";</script>";
	//	die;
	//}
  $sql = 'SELECT * FROM users WHERE name = "'.htmlspecialchars(addslashes($_COOKIE['user'])).'" and password = "'.htmlspecialchars(addslashes($_COOKIE['logon'])).'"';
  $result = $users_db->query($sql);
  while($row = $result->fetchArray(SQLITE3_ASSOC)){
    $INDEX_USERNAME = $row['name'];
    $INDEX_USERID = $row['id'];
    $INDEX_QQID = $row['qqid'];
  }
}
//var_dump(getNews(1));
?>
<!-- index.php @Date 2023-01-04 15:57 A.M. @Auther tiantian520 -->
<html class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers" lang="zh"><head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>HiMemory - 寒假期 - 电子报纸</title>
  <meta name="description" content="Hi, Memory! Get news from us.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/himemoryicon.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="./img/himemoryicon.png">


  <!--Fonts section-->
  <link href="https://fonts.googleapis.cn/css?family=Alegreya+Sans:400,500,700,800|Tinos:400,700&amp;subset=greek" rel="stylesheet">
  <link href="https://fonts.googleapis.cn/css?family=Magra:400,700" rel="stylesheet">
  <link href="https://fonts.googlefonts.cn/css?family=Montserrat" rel="stylesheet">
  <!--ENDOF Fonts section-->

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">你正在使用一款 <strong>过时</strong> 的浏览器！请 <a href="https://chrome.google.cn/">更新你的浏览器r</a> 来让你获得更加安全、迅捷的浏览体验</p>
  <![endif]-->


  <!--Top page message-->
  <section class="bg-hard-light d-none d-md-block">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-center p-2 text-muted small">
          @2023 Skyline Studio Powered by <a href="#" class="text-dark">@tiantian520</a>
        </div>
      </div>
    </div>
  </section>


  <!--Logo section-->
  <header class="header py-1">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-12 col-lg-3 small">
          <div class="row no-gutters">
            <div class="col-6 col-lg-12">
              <div class="font-weight-bold">
                <i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo date("Y年m月d日");?> <?php echo date("l") ?>
                <i><br/>您是第 <?php echo $count; ?> 名访问者。</i></div>
            </div>
            <div class="col-6 col-lg-12">
            <b>发行</b> 正式版
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 text-center">
          <a href="index.php">
            <img src="img/arealogo.png" id="logo">
          </a>
        </div>
        <div class="col-12 col-lg-3 text-center text-lg-right">电子报纸 在线撰写 <br/>
          <?php 
          if(isset($INDEX_USERNAME)){
             echo '欢迎您，'.$INDEX_USERNAME.'！<a href="logout.php"> <br/>退出</a><a href="user.php?id='.$INDEX_USERID.'"> 我</a>';
          }else{
            echo '<a href="login.php"> 登录</a>';
          }
          ?></div>
        
      </div>
    </div>
  </header>


  


  <!-- Hero section -->
  <section class="section mb-0 pb-5">
    <div class="container">
      <div class="row" name="index">

        <!--Top Posts-->
        <div class="col-12 order-3 order-lg-0 mb-3 mb-lg-4 mb-xl-5">
          <div class="row no-gutters home-top-headlines py-3 px-2 mb-3 mb-sm-0">
            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <img class="float-left mr-2" src="<?php $row = getNews(1);echo $row['img']; ?>" width="50">
                </div>
                <div class="col">
                  <div class="font-weight-bold"><?php echo $row['title']; ?></div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['date']; ?></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <img class="float-left mr-2" src="<?php $row = getNews(2);echo $row['img']; ?>" width="50">
                </div>
                <div class="col">
                  <div class="font-weight-bold"><?php echo $row['title']; ?></div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['date']; ?></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-md-0">
              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <img class="float-left mr-2" src="<?php $row = getNews(3);echo $row['img']; ?>" width="50">
                </div>
                <div class="col">
                  <div class="font-weight-bold"><?php echo $row['title']; ?></div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"><?php echo $row['date']; ?></i></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-0">
              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <img class="float-left mr-2" src="<?php $row = getNews(4);echo $row['img']; ?>" width="50">
                </div>
                <div class="col">
                  <div class="font-weight-bold"><?php echo $row['title']; ?></div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['date']; ?></div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!--Column Left-->
        <div class="col-12 order-1 order-lg-1 col-sm-5 col-lg-3 col-xl-<?php 
        /* Added at 10:23 a.m. 1/21/2023 */
        /* Auther: tiantian520 (SkyLine Studio) */
        /* 
        ???? What does it do?
        ~---~ Control the column's size by custom articles. 
        ???? How does it work?
        ~---~ Get data from SQLite3 database, we can find many custom articles from admin.
              First, we need to get the max length of articles.
              Such as, uhhh, the article you read, yeah, me.
              The article's max length is 76.
              The max length line is "Get data..."
              Okay, then we need to get a number by max length.
              Usually, The col-xl is 4 if the max length is 52.
              I try many times and got a list.
              Finally, I only need to "echo" a number.
              How easy!
        ???? 它是干什么的？
        ~--~ 通过自定义的文章控制这个列的尺寸
        ???? 它怎么工作？
        ~--~ 先从SQLite3数据库中拿到数据，我们可以看到许多自定义的文章来自管理员。
             首先，我们需要去拿到这么多文章的最大的长度
             比如，呃，你正在的读的这篇文章， 是的， 就是我。
             这篇文章的最大长度是69个字符。
             最大长度的那行是“先从SQLite3...”
             Okay， 然后我们需要依据这个最大长度来拿到一个数字。
             通常，当最大长度为52时，col-xl是4。
             我试了很多次，并且拿到一个对应列表。
             最后，我只需要用“echo”显示一个数字。
             多么简单！
        */
        // It started working! -- 它开始工作了！
        $row = getNews(5); // Function Get News Information -- 函数 获得新闻信息
        $lines = explode("<br />",str_replace("<br/>","<br />",str_replace("<br>","<br />",str_replace("<br />","<br />",$row['content'])))); // Cut text by line -- 按行切割文本
        $max = 0; // Set $max value -- 设置最大值
        for($i = 0;$i < count($lines);$i++){ // Go to find the maximum value -- 去找到最大值
          if (strlen($lines[$i]) > $max){
            $max = strlen($lines[$i]);
          }
        }
        $title_5 = strlen($row['title']);
        // Again! -- 再来！
        $row = getNews(6); // Function Get News Information -- 函数 获得新闻信息
        $lines = explode("<br />",str_replace("<br/>","<br />",str_replace("<br>","<br />",str_replace("<br />","<br />",$row['content']))));
        for($i = 0;$i < count($lines);$i++){ // Go to find the maximum value -- 去找到最大值
          if (strlen($lines[$i]) > $max){
            $max = strlen($lines[$i]);
          }
        }
        $title_6 = strlen($row['title']);
        $max = max(array($max,$title5,$title6));
        $TOTAL = 0;
        if($max > 80){
          echo "6";
          $TOTAL += 6;
        }
        else if($max > 52 && $max <= 80){
          echo "5";
          $TOTAL += 5;
        } 
        else if($max <= 52 && $max >= 48){
          echo "4";
          $TOTAL += 4;
        } 
        else if($max > 29 && $max < 48) {
          echo "3";
          $TOTAL += 3;
        }
        else if($max <= 29 && $max > 13) {
          echo "2";
          $TOTAL += 2;
        }
        else if($max <= 13) {
          echo "1";
          $TOTAL ++;
        }
        // Reduce the space occupation as much as possible, make the allocation more reasonable, and the maximum length($TOTAL) is 12
        // 尽可能减少空间占用，使分配更合理，最大长度($TOTAL)为12
        ?> border-right mb-3 mb-lg-0">

          <div class="post mb-3 pb-3 border-bottom">
            <div class="post-header">
              <div class="post-supertitle">新闻</div>
              <div class="post-title h4 font-weight-bold"><b><?php $row = getNews(5); echo $row['title']; ?></b></div>
            </div>
            <div class="post-body">
              <div class="post-content"><?php echo $row['content'] ; ?></div>
              <div class="post-date">
                <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['date'] ; ?></div>
            </div>
          </div>

          <div class="post mb-3 pb-3 border-bottom">
            <div class="post-header">
              <div class="post-supertitle">新闻</div>
              <div class="post-title h4 font-weight-bold"><?php $row = getNews(6);echo $row['title']; ?></div>
            </div>
            <div class="post-body">
              <div class="post-content"><img src="<?php echo $row['img'] ; ?>" height="100" weight="100"><br><?php echo $row['content'] ; ?></div>
              <div class="post-date">
                <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['date'] ; ?></div>
            </div>
          </div>

        </div>

        <!--Column Center -->
        <div class="col-12 order-0 order-lg-2 col-sm-7 col-lg-4 col-xl-<?php 
        /* Added at 10:49 a.m. 1/21/2023 */
        /* Auther: tiantian520 (SkyLine Studio) */
        /* 
        ???? What does it do?
        ~---~ Control the column's size by custom articles. 
        ???? How does it work?
        ~---~ Get data from SQLite3 database, we can find many custom articles from admin.
              First, we need to get the max length of articles.
              Such as, uhhh, the article you read, yeah, me.
              The article's max length is 76.
              The max length line is "Get data..."
              Okay, then we need to get a number by max length.
              Usually, The col-xl is 4 if the max length is 52.
              I try many times and got a list.
              Finally, I only need to "echo" a number.
              How easy!
        ???? 它是干什么的？
        ~--~ 通过自定义的文章控制这个列的尺寸
        ???? 它怎么工作？
        ~--~ 先从SQLite3数据库中拿到数据，我们可以看到许多自定义的文章来自管理员。
             首先，我们需要去拿到这么多文章的最大的长度
             比如，呃，你正在的读的这篇文章， 是的， 就是我。
             这篇文章的最大长度是69个字符。
             最大长度的那行是“先从SQLite3...”
             Okay， 然后我们需要依据这个最大长度来拿到一个数字。
             通常，当最大长度为52时，col-xl是4。
             我试了很多次，并且拿到一个对应列表。
             最后，我只需要用“echo”显示一个数字。
             多么简单！
        */
        // It started working! -- 它开始工作了！
        $row = getNews(7); // Function Get News Information -- 函数 获得新闻信息
        $lines = explode("<br />",str_replace("<br/>","<br />",str_replace("<br>","<br />",str_replace("<br />","<br />",$row['content'])))); // Cut text by line -- 按行切割文本
        $max = 0; // Set $max value -- 设置最大值
        for($i = 0;$i < count($lines);$i++){ // Go to find the maximum value -- 去找到最大值
          if (strlen($lines[$i]) > $max){
            $max = strlen($lines[$i]);
          }
        }
        $title_7 = strlen($row['title']);
        $max = max(array($max,$title7));
        if($max > 80){
          echo "6";
          $TOTAL += 6;
        }
        else if($max > 52 && $max <= 80){
          echo "5";
          $TOTAL += 5;
        } 
        else if($max <= 52 && $max >= 48){
          echo "4";
          $TOTAL += 4;
        } 
        else if($max > 29 && $max < 48) {
          echo "3";
          $TOTAL += 3;
        }
        else if($max <= 29 && $max > 13) {
          echo "2";
          $TOTAL += 2;
        }
        else if($max <= 13) { //中间无论如何也有两个格子，不然挤在一块十分难看
          echo "2";
          $TOTAL += 2;
        }
        // Reduce the space occupation as much as possible, make the allocation more reasonable, and the maximum length($TOTAL) is 12
        // 尽可能减少空间占用，使分配更合理，最大长度($TOTAL)为12
        ?> border-right mb-3 mb-lg-0">

          <div class="post mb-3 pb-3 border-bottom">
            <div class="post-header">
              <div class="post-supertitle">摄影、艺术与动漫</div> <!-- 允许自定义 自行修改index.php -->
              <div class="post-title h3 font-weight-bold"><?php $row = getNews(7);echo $row['title']; ?></div>
            </div>
            <div class="post-media">
              <img class="img-fluid" src="<?php $row = getNews(7);echo $row['img']; ?>">
            </div>
            <div class="post-body">
              <div class="post-content"><?php $row = getNews(7);echo $row['content']; ?></div>
              <div class="post-date">
                <i class="fa fa-clock-o" aria-hidden="true"></i><?php $row = getNews(7);echo $row['date']; ?></div>
            </div>
          </div>

          <div class="post mb-3 pb-3 border-bottom">
          <?php //自动爬取bilibili热门视频，与request.php同进行 
              //https://api.bilibili.com/x/web-interface/dynamic/region?ps=1&rid=1
              $json = json_decode(file_get_contents('./config/videos.videos'),true);
              $video = $json['data']['archives'][0];
              ?>
            <a href="<?php echo $video['short_link']; ?>"><div class="post-header">
              <div class="post-supertitle"><?php echo $video['tname']; ?></div> 
              <div class="post-title h3 font-weight-bold"><?php echo $video['title']; ?></div>
            </div>
            <div class="post-media">
              <img class="img-fluid" src="./img/<?php echo file_get_contents('./config/videos.pic');?>">
            </div>
            <div class="post-body">
              <div class="post-content"><?php echo $video['desc']; ?></div>
              <div class="post-date">
                <?php echo "哔哩哔哩 - ".$video['owner']['name']; ?></div>
            </div></a>
          </div>
        </div>

        <!--Column Right -->
        <div class="col-12 order-2 order-lg-3 col-sm-12 col-lg-5 col-xl-<?php echo 12-$TOTAL; //留下最大空间?> mb-3 mb-lg-0 ">

          <div class="post mb-3">
            <div class="post-media float-left mr-3">
              <img src="<?php $row = getNews(8);echo $row['img']; ?>" width="75">
            </div>
            <div class="post-header">
              <div class="post-title h5 font-weight-bold"><?php $row = getNews(8);echo $row['title']; ?></div>
            </div>
            <div class="post-body">
              <div class="post-content"><?php $row = getNews(8);echo $row['content']; ?></div>
            </div>
          </div>

          <div class="mb-5 text-center bg-hard-light">
            <div class="small" style="background-color: rgba(0,0,0,0.05)"><span class="text-muted font-alegreya"><?php echo date("Y年m月d日"); ?></span></div>
            <div class="py-2">
              <!-- <a href="https://www.mediatek.cn/"><img src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA15U4eQ.img?w=627&amp;h=624&amp;m=6" class="img-fluid" height="100" width="100"></a>-->
              <?php 
              if(isset($INDEX_USERNAME) && isset($INDEX_USERID) && isset($INDEX_QQID)){
                $sql = "SELECT * FROM lucky WHERE id = $INDEX_USERID;";
                $result = $data_db->query($sql);
                $cnt = 0;
                while($row = $result->fetchArray(SQLITE3_ASSOC)){
                  $last_sign = $row['date'];
                  if((time()-$last_sign) > 86400){
                    // 一天过去了，可以签到了
                    $lucky_value = rand(0,100);
                    $lucky_date = time();
                    $sql = "UPDATE lucky SET value = $lucky_value, date = $lucky_date WHERE id = $INDEX_USERID;";
                    $result = $data_db->exec($sql);
                    $cnt ++;
                    echo "今日运势：<br/>";
                    // 以下是日常判断逻辑，但跨年期间（1-2月）我更希望都是吉和大吉
                    if(date('m') == '1') echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if(date('m') == '2' && date('d') <= 10) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value >= 80) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if($lucky_value < 80 && $lucky_value >= 60) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value < 60 && $lucky_value >= 40) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:grey\">平</h1>";
                    else if($lucky_value < 40 && $lucky_value >= 20) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">凶</h1>";
                    else if($lucky_value < 20 && $lucky_value >= 0) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">大凶</h1>";
                  }else{
                    // 签到过了，直接给数据
                    echo "今日运势：<br/>";
                    $lucky_value = $row['value'];
                    if(date('m') == '1') echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if(date('m') == '2' && date('d') <= 10) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value >= 80) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if($lucky_value < 80 && $lucky_value >= 60) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value < 60 && $lucky_value >= 40) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:grey\">平</h1>";
                    else if($lucky_value < 40 && $lucky_value >= 20) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">凶</h1>";
                    else if($lucky_value < 20 && $lucky_value >= 0) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">大凶</h1>";
                    $cnt ++;
                  }
                }
                if(!$cnt){
                  // 没数据，说明第一次注册和签到，插入新数据
                  $lucky_value = rand(0,100);
                  $lucky_date = time();
                  $sql = "INSERT INTO lucky VALUES($INDEX_USERID,$lucky_date,$lucky_value);";
                  $result=$data_db->exec($sql);
                  echo "首次签到运势：<br/>";
                  if(date('m') == '1') echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if(date('m') == '2' && date('d') <= 10) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value >= 80) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red;\">大吉</h1>";
                    else if($lucky_value < 80 && $lucky_value >= 60) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:red\">吉</h1>";
                    else if($lucky_value < 60 && $lucky_value >= 40) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:grey\">平</h1>";
                    else if($lucky_value < 40 && $lucky_value >= 20) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">凶</h1>";
                    else if($lucky_value < 20 && $lucky_value >= 0) echo "<h1 style=\"font-family: 宋黑, 'Times New Roman', Times, serif;font-size: 3rem;color:black\">大凶</h1>";
                }
              }else{
                echo "你居然还没有登录呀！戳<a href='login.php'>我</a>去登录吧~";
              }
              ?>
            </div>
          </div>

          <div class="post mb-3 pb-3 border-bottom">
            <div class="post-media float-left mr-3">
              <img src="<?php $row = getNews(9);echo $row['img']; ?>" width="75">
            </div>
            <div class="post-header">
              <div class="post-title h5 font-weight-bold"><?php $row = getNews(9);echo $row['title']; ?></div>
            </div>
            <div class="post-body">
              <div class="post-content"><?php $row = getNews(9);echo $row['content']; ?></div>
            </div>
          </div>

          <div class="post">
            <div class="post-media float-left mr-3">
              <img src="<?php $row = getNews(10);echo $row['img']; ?>" width="375">
            </div>
            <div class="post-header">
              <div class="post-title h5 font-weight-bold"><?php $row = getNews(10);echo "<br/><br/><br/><br/>".$row['title']; ?></div>
            </div>
            <div class="post-body">
              <div class="post-content"><?php $row = getNews(10);echo $row['content']; ?></div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </section>


  <!--Banner-->
  <section class="section bg-light my-3 my-md-4">
    <div class="container">
      <div class="row py-4">
        <div class="col text-center">
          <!-- <script src="qzonestyle.gtimg.cn/qzone/hybrid/app/404/search_children.js"></script> -->
                   
        </div>
      </div>
    </div>
  </section>

  <?php 
    /* 导入新闻信息 */
  if(file_exists('./config/news.news')){
    $json = json_decode(file_get_contents('./config/news.news'),true);
  }else{
    file_get_contents('./config/request.php');
    sleep(5);
    $json = json_decode(file_get_contents('./config/news.news'),true);
  }
  ?>
  <!-- Section -->
  <section class="section" name="news">
    <div class="container">

      <div class="row">
        <div class="col-xl-12">
          <div class="section-header row">
            <div class="col-12">
              <h2 class="section-title h4 font-alegreya">新闻</h2>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4"></div>
      </div>

      <div class="row">
        <div class="col-xl-9 col-lg-8">
          <div class="row">
            <div class="col-12 col-md-6 mb-3 mb-md-0">

              <div class="post mb-3 pb-3 border-bottom">
                <div class="post-media">
                  <img class="img-fluid" src="<?php echo $json['T1348647853363'][0]['topic_background']; ?>">
                </div>
                <div class="post-header">
                  <div class="post-supertitle">时讯</div>
                  <div class="post-title h4 font-weight-bold"><?php 
                  echo $json['T1348647853363'][0]['title'];
                  ?></div>
                </div>
                <div class="post-body">
                  <div class="post-content"><?php echo $json['T1348647853363'][0]['digest']; ?></div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $json['T1348647853363'][0]['lmodify'];?></div>
                </div>
              </div>

              <div class="post mb-3 pb-3 border-bottom">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-media ">
                      <img src="<?php 
                  echo $json['T1348647853363'][1]['imgsrc'];
                  ?>" width="100">
                    </div>

                  </div>
                  <div class="col">
                    <div class="post-header">
                      <div class="post-title h5 font-weight-bold"><?php 
                  echo $json['T1348647853363'][1]['title'];
                  ?></div>
                    </div>
                    <div class="post-body">
                      <div class="post-content"><?php 
                  echo $json['T1348647853363'][1]['digest'];
                  ?></div>
                      <div class="post-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><?php 
                  echo $json['T1348647853363'][1]['ptime'];
                  ?></div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="post mb-3 mb-sm-0">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-media">
                      <img src="<?php 
                  echo $json['T1348647853363'][2]['imgsrc'];
                  ?>" width="100">
                    </div>

                  </div>
                  <div class="col">
                    <div class="post-header">
                      <div class="post-title h5 font-weight-bold"><?php 
                  echo $json['T1348647853363'][2]['title'];
                  ?></div>
                    </div>
                    <div class="post-body">
                      <div class="post-content"><?php 
                  echo $json['T1348647853363'][2]['digest'];
                  ?></div>
                      <div class="post-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><?php 
                  echo $json['T1348647853363'][2]['ptime'];
                  ?></div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="post mb-3 mb-sm-0">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-media">
                      <img src="<?php 
                  echo $json['T1348647853363'][3]['imgsrc'];
                  ?>" width="100">
                    </div>

                  </div>
                  <div class="col">
                    <div class="post-header">
                      <div class="post-title h5 font-weight-bold"><?php 
                  echo $json['T1348647853363'][3]['title'];
                  ?></div>
                    </div>
                    <div class="post-body">
                      <div class="post-content"><?php 
                  echo $json['T1348647853363'][3]['digest'];
                  ?></div>
                      <div class="post-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><?php 
                  echo $json['T1348647853363'][3]['ptime'];
                  ?></div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="post mb-3 mb-sm-0">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-media">
                      <img src="<?php 
                  echo $json['T1348647853363'][4]['imgsrc'];
                  ?>" width="100">
                    </div>

                  </div>
                  <div class="col">
                    <div class="post-header">
                      <div class="post-title h5 font-weight-bold"><?php 
                  echo $json['T1348647853363'][4]['title'];
                  ?></div>
                    </div>
                    <div class="post-body">
                      <div class="post-content"><?php 
                  echo $json['T1348647853363'][4]['digest'];
                  ?></div>
                      <div class="post-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><?php 
                  echo $json['T1348647853363'][4]['ptime'];
                  ?></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <?php
                      
                          $sql = 'select * from articles where type = 0 order by like desc, id desc';
                          $result = $article_db->query($sql);
                          $cnt = 0;
                          while($row = $result->fetchArray(SQLITE3_ASSOC)){
                            if($cnt == 12){
                              break;
                            }
                            $auther = $row['auther'];
                            $article_id = $row['id'];
                            $article_like = $row['like'];
                            $auther = htmlspecialchars($auther,ENT_QUOTES);
                            $auther_id = $auther;
                            $title = $row['title'];
                            if ($auther != '1'){
                                $title = htmlspecialchars($title,ENT_QUOTES);
                            }
                            $content = $row['content'];
                            /* 如果内容过短，除非点赞量超过一定数量，否则就不展示 */
                            if(strlen($content) <= 30){
                              if($article_like < 30) continue;
                            }
                            $date_ = $row['date'];
                            /* 如果年份过于久远就根据概率随机展示 */
                            $last_time = time()-strtotime(str_replace(array('年','月','日','时','分','秒'),array('-','-','',':',':',''),$date_));
                            //echo str_replace(array('年','月','日','时','分','秒'),array('-','-','',':',':',''),$date_).'<br/>';
                            if($last_time > 864000 && rand(0,1)){
                              continue;
                            }
                            $img = $row['img'];
                            $sql = 'select * from users where id = '.$auther;
                            $result_ = $users_db->query($sql);
                            while($row = $result_->fetchArray(SQLITE3_ASSOC)){
                              $auther = $row['name'];
                              $qq_id = $row['qqid'];
                            }
                            if(empty($img)){
                              //$img = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$qq_id.'&spec=100';
                              $img = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$qq_id.'&spec=640&img_type=jpg';
                            }
                            if(empty($qq_id) || empty($auther)){
                              $img = './img/user.png';
                            }
                            // http://q2.qlogo.cn/headimg_dl?dst_uin=3120690593&spec=100
                            if($auther == 'tiantian520'){
                              echo '<div class="post mb-3 pb-3 border-bottom"><div class="row"><div class="col-auto"><div class="post-media "><a href="user.php?id=1"><img src="'.$img.'" alt="'.$auther.'" width="100"></a></div></div><div class="col"><div class="post-header"><div class="post-title h5 font-weight-bold">'.$title.'</div></div><div class="post-body"><div class="post-content">'.$content.'</div><div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$date_.'<i><br/><i>共 '.$article_like.' 人觉得很赞</i><br/><a href="like.php?id='.$article_id.'">点赞</a></i></div></div></div></div></div>';
                            }else{
                              echo '<div class="post mb-3 pb-3 border-bottom"><div class="row"><div class="col-auto"><div class="post-media "><a href="user.php?id='.$auther_id.'"><img src="'.$img.'" alt="'.$auther.'" width="100"></a></div></div><div class="col"><div class="post-header"><div class="post-title h5 font-weight-bold">'.$auther.'：<br/>'.$title.'</div></div><div class="post-body"><div class="post-content">'.$content.'</div><div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$date_.'<br/><i>共 '.$article_like.' 人觉得很赞</i><br/><a href="like.php?id='.$article_id.'">点赞</a></i></div></div></div></div></div>';
                            }
                            
                            $cnt = $cnt + 1;
                          }
                      ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center py-3">
              <?php if(!isset($INDEX_USERID)) echo '<a href="login.php" class="btn-main btn-more">登录并发表！</a>'; ?>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4">
          <div class="sticky-sidebar">
            <div class="sticky-inside">
          <div class="banner banner-sidebar mb-3 bg-light text-center">
            <img src="img/banners/banner-300x250A.jpg" class="img-fluid">
          </div>
          <div class="widget-posts gradient-back text-white bg-light px-3 pb-3 pt-1 shadow ">
            <div class="widget-header">
              <div class="widget-title">杂记</div>
            </div>

            <div class="post mb-3 pb-1 border-bottom clearfix">
              <div class="post-media float-left mr-3">
                  <?php $json = json_decode(file_get_contents('https://saying.api.azwcl.com/saying/get'),true);echo $json['data']['auther']; ?>
              </div>
              <div class="post-header">
                <div class="post-title h6 font-weight"><?php echo $json['data']['content']; ?></div>
              </div>
            </div>

            <div class="post mb-3 pb-1 border-bottom clearfix">
              <div class="post-media float-left mr-3">
                  <?php $json = json_decode(file_get_contents('https://v1.jinrishici.com/all.json'),true);echo $json['auther']; ?>
              </div>
              <div class="post-header">
                <div class="post-title h6 font-weight"><?php echo $json['content']; ?></div>
              </div>
            </div>
            <div class="post mb-3 pb-1 border-bottom clearfix">
              <div class="post-media float-left mr-3">
                  <?php $json = json_decode(file_get_contents('https://v1.jinrishici.com/all.json'),true);echo $json['auther']; ?>
              </div>
              <div class="post-header">
                <div class="post-title h6 font-weight"><?php echo $json['content']; ?></div>
              </div>
            </div>
            <div class="post mb-3 pb-1 border-bottom clearfix">
              <div class="post-media float-left mr-3">
              </div>
              <div class="post-header">
                <div class="post-title h6 font-weight"><?php $content = file_get_contents('https://v.api.aa1.cn/api/api-wenan-mingrenmingyan/index.php?aa1=text');echo explode("——",$content)[1]; ?><?php if(!empty(explode("——",$content)[1])) echo "<br/>";?><?php echo explode("——",$content)[0]; ?></div>
              </div>
            </div>

          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Banner-->
  <section class="section bg-light my-3 my-md-4">
    <div class="container">
      <div class="row py-4">
        <div class="col text-center">
          <a href="https://www.loongson.cn/news/show?id=1"><img src="https://www.loongson.cn/uploads/images/2022101215201310016.7c8793f4c615943a0c9e69d5dee35521.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
  </section>

  <!--Section-->
  <section class="section">
    <div class="container">

      <div class="row">
        <div class="col-xl-12">
          <div class="section-header row">
            <div class="col-12">
              <h2 class="section-title h4 font-weight-bold font-alegreya">自定义</h2>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4"></div>
      </div>

      <div class="row">
        <div class="col-xl-9 col-lg-8">
          <div class="row">
            <div class="col-12 col-md-5 mb-3 mb-md-0">

              <div class="post mb-3 pb-3 border-bottom">
                <div class="post-media">
                  <img class="img-fluid" src="https://ts1.cn.mm.bing.net/th/id/R-C.e6ddeb3ee40e229f4804155a952549bb?rik=I0voO9Pv6tlBbw&amp;riu=http%3a%2f%2fimg02.taobaocdn.com%2fimgextra%2fi2%2f11778168%2fT2.nOZXjVaXXXXXXXX_!!11778168.jpg&amp;ehk=qd9ytqX6vqkwKwxIDfgQFr8IW99Z6IQ4zu0HC9kv8aQ%3d&amp;risl=&amp;pid=ImgRaw&amp;r=0">
                </div>
                <div class="post-header">
                  <div class="post-supertitle">自定义·专栏</div>
                  <div class="post-title h4 font-weight-bold">你好，HiMemory!</div>
                </div>
                <div class="post-body">
                  <div class="post-content">你好，这里是HiMemory！<br/>
                本项目同时兼容Linux/Windows环境，运行在PHP5.X/HTML5/CSS3且支持Nginx/Apache，只需要稍加配置便可以部署成型。<br/>
              另外，本站点的代码简洁明了，几乎每段PHP代码都有注释，方便理解和二次开发。<br/>
            目前，站点已经实现了首页部分文章的增删修改、用户CMS系统。<br/>
            在这里感谢：
              <a href="https://github.com/cookforweb/html-newspaper">Cookforweb 用爱制作此报纸HTML模板</a><br/>
              <a href="#">未知作者 制作了后台HTML模板</a><br/>
              本人负责：<br/>
              全部PHP代码构造<br/>
              本站点的管理员页面：http(s)://IP:PORT/admin/index.php<br/>
              您需要先配置./config/config.php里的两个管理员用户名、密码，并且注册ID为1的第一个账号作为管理员。<br/>
              感谢您的阅读！<br/>
              Powered by SkyLine Studio including tiantian520, Thanks for Cookforweb and Unknown auther.
              (呃，这里的页面暂时不支持动态修改，需要自行修改html。因为这里应该是自定义二次开发的区域。)
            </div>
                  <div class="post-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>2023年1月18日 Generated by EXCITING from tiantian520</div>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-12 text-center py-3">
              <!-- <a class="btn-main" href="write.php">投稿</a> -->
            </div>
          </div>
        </div>
        </div>
        <div class="col-xl-3 col-lg-4">
          <div class="sticky-sidebar">
            <div class="sticky-inside">
          <div class="banner banner-sidebar mb-3 bg-light text-center">
            <a href="https://www.wwfchina.org/"><img src="img/banners/banner-300x250B.jpg" class="img-fluid"></a>
          </div>
          
        </div>
          </div>
        </div>


      </div>
    </div>
  </section>


  <!--Users-->
  <section class="bg-hard-light">
    <div class="container py-5">
      <div class="opinion-block">
        <div class="row">
          <div class="col-12">
            <div class="opinion-title">
              <h1 class="text-center font-weight-bold m-0 mb-3">热门用户</h1>
            </div>
          </div>
        </div>
        <div class="row py-3">
        <?php 
        // 从数据库get到数据（由点赞和id数据递减排序，优先点赞）
          $sql = 'select * from users order by like desc, id desc';
          $result = $users_db->query($sql);
          $cnt = 0;
          while($row = $result->fetchArray(SQLITE3_ASSOC)){
            if($cnt == 6) break;
            $img = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$row['qqid'].'&spec=640&img_type=jpg'; // 腾讯QQ官方API，获取QQ头像
            if($row['type'] == 0) $type_name = "作者";
            else if($row['type'] == 1) $type_name = "管理员";
            echo '<div class="col-12 col-md-6 col-lg-4"> <a href="user.php?id='.$row['id'].'"> <div class="post-overlay"> <div class="post-media"> <img src="'.$img.'" class=""> </div> <div class="post-body"> <div class="post-author">@'.$row['name'].'('.$type_name.')</div> <div class="post-title">'.$row['title'].'</div> </div> </div> </a> </div>'; //拼接输出
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!--Section-->
  <section class="section">
    <div class="container">

      <div class="row">
        <div class="col-xl-12">
          <div class="section-header row">
            <div class="col-12">
              <h2 class="section-title h4 font-weight-bold font-alegreya">动态</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-9 col-lg-8">
          <div class="row">
            
            <?php
            //error_reporting(0); //关闭错误提醒，以免乱七八糟编码问题（已经在config.php里关过了）
            $db = new SQLite3('./database/data.db');
            if (!$db) {
              echo '<title> Oops! HiMemory crashed! </title>';
              echo '<h1> Oops! HiMemory crashed! </title>';
              echo 'code：' . $db->lastErrorCode();
              echo 'Error：' . $db->lastErrorMsg();
              $db->close();
              die;
          }
            $sql = 'select * from messages order by id desc';
            $result = $db->query($sql);
            $cnt = 0;
            while($row = $result->fetchArray(SQLITE3_ASSOC)){
              if($cnt == 30){
                break;
              }
              // 拿到数据库data then 用 htmlspecialchars 防止XSS攻击
              $auther = $row['auther'];
              $auther = htmlspecialchars($auther,ENT_QUOTES);
              $title = $row['title'];
              $title = htmlspecialchars(base64_decode($title),ENT_QUOTES);
              $content = $row['content'];
              $content = htmlspecialchars(base64_decode($content),ENT_QUOTES);
              $img = $row['img'];
              $date_ = $row['date'];
              // 处理拼接 输出html
              echo "<div class=\"col-12 col-md-7\"><div class=\"post mb-3 pb-3 border-bottom\"><div class=\"row\"><div class=\"col-auto\"><div class=\"post-media \"><div class=\"post-title h5 font-weight-bold\">";
              echo "<img src=\"$img\" class=\"\">";
              echo "</div></div></div><div class=\"col\"><div class=\"post-header\"><div class=\"post-title h5 font-weight-bold\">";
              echo $auther."：<br/>".$title;
              echo "</div></div><div class=\"post-body\"><div class=\"post-content\">";
              echo $content;
              echo "<div class=\"post-date\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i>$date_</div></div></div></div></div></div></div>";
              $cnt = $cnt + 1;
            }
            ?>
          </div>
          <?php 
          // 检查登录状态 输出相应的引导登录文字或引导发表文字
          if(isset($INDEX_USERNAME)){
            echo '<div class="row"><div class="col-12 text-center py-3"><form action="sumbit.php"><input type="hidden" name="token" value="'.$_SESSION['token'].'"/><h2 class="post-title h5 font-weight-bold">标题：</h2><input class="input-custom" type="text" name="title"><br><h2 class="post-title h5 font-weight-bold">内容：</h2><input class="input-custom" type="text" name="content"><br><br><input type="submit" class="input-custom"></input></form></div></div>';
          }else{
            echo '<div class="row"><div class="col-12 text-center py-3"><h2 class="post-title h5 font-weight-bold"><a href="login.php">登录</a> 以发表</h2></div></div>';
          }
          ?>
          
        </div>
        <div class="col-xl-3 col-lg-4">
          <div class="sticky-sidebar">
            <div class="sticky-inside">
          
          <div class="widget-posts gradient-back text-white bg-light px-3 pb-3 pt-1 shadow ">

            <div class="widget-header">
              <div class="widget-title">官方公告</div>
            </div>

            <div class="post mb-3 pb-1 border-bottom clearfix">
              <div class="post-media float-left mr-3">
                <img src="img/himemoryicon.png" width="75">
              </div>
              <div class="post-header">
                <div class="post-title h6 font-weight-bold">HiMemory目前采用安全的PHP程序，无需担心安全漏洞等风险。</div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>


      </div>
    </div>
  </section>


  <!--Footer-->
  <footer class="section section-footer bg-dark mb-0">
    <div class="inside">
      <div class="pt-5">
        <div class="container">
          <div class="footer-logo">
            <div class="row no-gutters justify-content-center mb-2">
              <div class="col-5 col-md-5 col-lg-3 col-xl-2">
                <img class="img-fluid" src="img/arealogo.png">
              </div>
            </div>
            <div class="row no-gutters justify-content-center">
              
            </div>
          </div>
          

          <div class="footer-credits">
            <div class="row ">
              <div class="text-center col-md-9 text-md-left">
                © 2023 | CookForWeb &amp; and SkyLine Studio including @tiantian520 (also thanks unknown auther)
              </div>
              <div class="col-md-3 text-center text-md-left">Always get dreams</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>


  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="js/vendor/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async="" defer=""></script>



</body><div class="abineContentPanel" style="background-color:transparent !important;margin:0 !important;padding:0 !important;display:none !important;opacity:1 !important;filter:alpha(opacity:100) !important;z-index:2147483647 !important;position:absolute !important;top:20px !important;right:20px !important;overflow:hidden !important;border-width:0px !important;visibility:visible !important;background:transparent"><iframe class="abineContentFrame" width="310px" allowtransparency="true" frameborder="0" height="0px" scrolling="no" src="chrome-extension://emgfgdclgfeldebanedpihppahgngnle/html/inlineForm.html?abine1435586doNotRemove" id="abine1435586doNotRemove" position="undefined" style="display:block !important;position:relative !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:310px"></iframe></div></html>