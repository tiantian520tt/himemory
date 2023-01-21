<?php
echo '<meta charset="utf-8">';
/* 
@Date: 2023/1/5 2:01
@Auther: tiantian520
@Description: 用户主页
@Filename: user.php
@Usage: user.php?id=
@Tips: 若登录且id=登录id，即可操作主页发布信息；若未登录或id≠主页id，无法修改，只可以浏览。
Powered by HiMemory, @tiantian520
*/

/* GET拿到访问目标ID */
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
}else{
    /* 没有ID 返回主页 */
    echo "<script> window.location.href=\"index.php\";</script>";
    die;
}
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

/* 查找是否存在这个用户 */
$sql = 'SELECT * FROM users WHERE id = '.htmlspecialchars(addslashes($user_id));
$result = $users_db->query($sql);
while($row = $result->fetchArray(SQLITE3_ASSOC)){
   $INDEX_USERNAME = $row['name'];
   $INDEX_USERID = $row['id'];
   $INDEX_QQID = $row['qqid'];
   $INDEX_LIKE = $row['like'];
   $INDEX_PASSWORD = $row['password'];
   $INDEX_TYPE = $row['type'];
   $INDEX_TITLE = $row['title'];
   $INDEX_CONTENT = $row['content'];
   $INDEX_DATE = $row['date'];
   $INDEX_WP_TYPE = $row['wp_type'];
   //$INDEX_IMG = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$INDEX_QQID.'&spec=100';
   $INDEX_IMG = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$row['qqid'].'&spec=640&img_type=jpg';
   if($INDEX_QQID == '1145141919') $INDEX_IMG="https://pic1.zhimg.com/v2-a320f97fb44eb93b0e0d4cd4da6ddab0_180x120.jpg";
}


/* 查看是否点赞 */
if(isset($_GET['like'])){
    if(!isset($_COOKIE["liked_$INDEX_USERID"])){
        $INDEX_LIKE++;
        $sql = "UPDATE users SET like = $INDEX_LIKE WHERE id = $INDEX_USERID";
        $result = $users_db->exec($sql);
        setcookie("liked_$INDEX_USERID",'true',time()+300);
        $liked = true;
    }else{
        $liked = false;
    }
}



/* 对单独用户的访问统计！ */
if(!isset($_COOKIE["visited_$INDEX_USERID"])){
    if(file_exists("./counts/$INDEX_USERID.$INDEX_QQID.count")){
        $count = file_get_contents("./counts/$INDEX_USERID.$INDEX_QQID.count");
        $count++;
        file_put_contents("./counts/$INDEX_USERID.$INDEX_QQID.count","$count");
        setcookie("visited_$INDEX_USERID",'true',time()+300);
    }else{
        file_put_contents("./counts/$INDEX_USERID.$INDEX_QQID.count","1");
        $count=1;
        setcookie("visited_$INDEX_USERID",'true',time()+300);
    }
}else{
    $count = file_get_contents("./counts/$INDEX_USERID.$INDEX_QQID.count");
}

    

/* Check Cookie!!!! */
if (isset($_COOKIE["logon"]) and isset($_COOKIE["user"])){
	//if($_COOKIE["logon"] == md5($admin_password) and $_COOKIE["user"] == $admin_username){
	//	echo "<script> alert(\"你已经登录！\"); window.location.href=\"index.php\";</script>";
	//	die;
	//}
  $sql = 'SELECT * FROM users WHERE name = "'.htmlspecialchars(addslashes($_COOKIE['user'])).'" and password = "'.htmlspecialchars(addslashes($_COOKIE['logon'])).'"';
  $result = $users_db->query($sql);
  while($row = $result->fetchArray(SQLITE3_ASSOC)){
    $LOGIN_USERNAME = $row['name'];
    $LOGIN_USERID = $row['id'];
    $LOGIN_QQID = $row['qqid'];
  }
}
// echo '<script>alert(1)</script>';
if(!isset($INDEX_USERNAME) || !isset($INDEX_QQID)){ //不存在这个用户
    if(isset($LOGIN_USERID)){
        echo "<script> window.location.href=\"user.php?id=$LOGIN_USERID\";</script>";
        die;
    }else{
        echo "<script> window.location.href=\"index.php\";</script>";
        die;
    }
}
function processContent($text){
    $pattern = array(
        '/ /',//半角下空格
        '/　/',//全角下空格
        '/\r\n/',//window 下换行符
        '/\n/',//Linux && Unix 下换行符
    );
    $replace = array('&nbsp;','&nbsp;','<br />','<br />');
    return preg_replace($pattern,$replace,$text);
}
//echo '<script>alert(1)</script>';
/* 查看是否提交修改简介 */
if(isset($LOGIN_USERNAME)){
    if($LOGIN_USERID == $INDEX_USERID){
        if(isset($_POST['index_title']) && isset($_POST['index_content'])){
            if(empty($_POST['index_title']) || empty($_POST['index_content'])) echo "<script>alert('内容为空。')</script>";
            else{
                //echo '<script>alert(1)</script>';
                $title = htmlspecialchars(addslashes($_POST['index_title']));
                $content = htmlspecialchars(addslashes($_POST['index_content']));
                $content = processContent($content);
                $sql = "UPDATE users SET title = \"$title\", content = \"$content\" WHERE id = $INDEX_USERID";
                $result = $users_db->exec($sql);
                $INDEX_TITLE = $title;
                $INDEX_CONTENT = $content;
            }
        }        
    }
}

/* 查看是否提交新文章 */
if(isset($LOGIN_USERNAME)){
    if($LOGIN_USERID == $INDEX_USERID){
        if(isset($_POST['title']) && isset($_POST['content'])){
            if(empty($_POST['title']) || empty($_POST['content'])) echo "<script>alert('内容为空。')</script>";
            else{
                //echo '<script>alert(1)</script>';
                $title = htmlspecialchars(addslashes($_POST['title']));
                $content = htmlspecialchars(addslashes($_POST['content']));
                $content = processContent($content);
                $date_ = date('Y年m月d日 H时i分s秒');
                $sql = "INSERT INTO articles values('$date_','$title','','$content',$INDEX_USERID,0,0)";
                $result = $article_db->exec($sql);
            }
        }        
    }
}

/* 查看是否请求修改壁纸类型 */
if(isset($LOGIN_USERNAME)){
  if($LOGIN_USERID == $INDEX_USERID){
    if(isset($_GET['c_wp_type'])){
      if($INDEX_WP_TYPE == 1) $INDEX_WP_TYPE = 0;
      else if($INDEX_WP_TYPE == 0) $INDEX_WP_TYPE = 1;
      $sql = "UPDATE users SET wp_type = $INDEX_WP_TYPE";
      $result = $users_db->exec($sql);
    }
  }
}

?>
<html class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers" lang="zh"><head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>HiMemory - <?php echo $INDEX_USERNAME;?> - 个人主页</title>
  <meta name="description" content="Hi, Memory! Get news from us.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/himemoryicon.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="./img/himemoryicon.png">


  <!--Fonts section-->
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800|Tinos:400,700&amp;subset=greek" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Magra:400,700" rel="stylesheet">
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
            <b><?php echo $INDEX_USERNAME; ?> 的 </b> 个人主页
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
          if(isset($LOGIN_USERNAME)){
             echo '欢迎您，'.$LOGIN_USERNAME.'！<a href="logout.php"> <br/>退出</a> <a href="index.php"> 首页</a>';
          }else{
            echo '<a href="login.php?from=user.php?id='.$INDEX_USERID.'"> 登录</a><a href="index.php"> 首页</a>';
          }
          ?></div>
        
      </div>
    </div>
  </header>
  <!--Banner-->
  <section class="section bg-light my-3 my-md-4">
    <div class="container">
      <div class="row py-4">
      <?php 
        if($LOGIN_USERID == $INDEX_USERID){
          echo "<a href='?id=$LOGIN_USERID&c_wp_type=1'>切换壁纸风格</a>";
        }
        ?>
        <div class="col text-center">
          <?php 
          $sql = "SELECT * FROM users WHERE id = $INDEX_USERID";
          $result = $users_db->query($sql);
          while($row = $result->fetchArray(SQLITE3_ASSOC)){
            // 暂不实现自定义壁纸 使用图片api 可以自定义图片类型
            $type = $row['wp_type']; //wp_type: 0 风景;1 二次元;2 自定义（未实现）
            if($type == 1){
              echo '<a href="#"><img src="https://api.ixiaowai.cn/api/api.php" class="img-fluid" width="550"/></a>'; //给客户端处理，节省服务器资源
            }else if($type == 0){
              echo '<a href="#"><img src="https://api.ixiaowai.cn/gqapi/gqapi2.php" class="img-fluid" width="550"/></a>'; //给客户端处理，节省服务器资源
            }else if($type == 2){
              echo '<a href="#"><img src="'.$row['wp_src'].'" class="img-fluid" width="550"/></a>'; //未实现，先写一点
            }
          }
          ?>
        </div>
        
      </div>
    </div>
  </section>
  


  <!-- Hero section -->
  <section class="section mb-0 pb-5">
    <div class="container">
      <div class="row" name="index">


        <!--Column Left-->
        <div class="col-12 order-1 order-lg-1 col-sm-5 col-lg-3 col-xl-2 border-right mb-3 mb-lg-0">

          <div class="post mb-3 pb-3 border-bottom">
            <div class="post-header">
              <div class="post-supertitle">个人简介</div>
              <div class="post-title h4 font-weight-bold"><b><?php echo $INDEX_TITLE; ?></b></div>
            </div>
            <div class="post-body">
              <div class="post-content"><?php echo $INDEX_CONTENT; ?></div>
              <div class="post-date">
                <i>Powered by HiMemory Processor!</i></div>
            </div>
          </div>
          <?php
          /*<div class="post">
            <div class="post-header">
              <div class="post-supertitle">自定义</div>
            </div>
            <div class="post-body">
              <div class="post-content">键入PHP代码</div>
              <div class="post-date">
                <i>Powered by HiMemory Processor!</i></div>
            </div>
          </div>*/
          if(isset($LOGIN_USERID)){
            if($INDEX_USERID == $LOGIN_USERID){
                echo '<div class="post"> <div class="post-header"> <div class="post-supertitle">自定义</div> </div> <div class="post-body"> <div class="post-content"><form action=\'user.php?id='.$INDEX_USERID.'\' method=\'post\'><input type="hidden" name="token" value="'.$SESSION['token'].'"/><input type=\'text\' class=\'input-custom\' name=\'index_title\' value=\''.$INDEX_TITLE.'\'></input><br/><textarea rows="10" cols="50" name="index_content" class=\'input-custom\'>'.str_replace('<br />','&#10;',$INDEX_CONTENT).'</textarea><input type=\'submit\' class=\'input-custom\' value=\'修改\'/></form></div> <div class="post-date"> <i>Powered by HiMemory Processor!</i></div> </div> </div>';
            }
          }
          ?>
        </div>

        <!--Column Center -->
        <div class="col-12 order-0 order-lg-2 col-sm-7 col-lg-4 col-xl-6 border-right mb-3 mb-lg-0">

          <div class="post">
            <div class="post-header">
              <div class="post-supertitle">关于TA</div>
              <div class="post-title h3 font-weight-bold"><?php echo $INDEX_USERNAME; ?></div>
            </div>
            <div class="post-media">
              <img class="img-fluid" src="<?php echo $INDEX_IMG;?>" width="50"/>
            </div>
            <div class="post-body">
              <div class="post-content">这是TA的QQ号:<?php echo $INDEX_QQID ?><br/>类型：<?php if($INDEX_TYPE == 1) echo '管理员'; else echo '用户'; ?><br/></div>
              <div class="post-date">
                  <?php
                  if(isset($liked)) if($liked==true) echo "<i><b>感谢你的点赞！</b></i><br/>"; else echo "<i><b>呃，5分钟内只能点赞一次哦。</b></i><br/>";
                  ?>
                <i>TA共获得了<?php echo $INDEX_LIKE; ?>个赞</i><br/>
                <<?php if(isset($liked)) echo "b";else echo "a"; ?> href="user.php?id=<?php echo $INDEX_USERID; ?>&like=1" >为TA点赞</<?php if(isset($liked)) echo "b";else echo "a"; ?>></div>
            </div>
          </div>
        </div>

        <!--Column Right -->
        <div class="col-12 order-2 order-lg-3 col-sm-12 col-lg-5 col-xl-4 mb-3 mb-lg-0 ">
            <?php 
            if(isset($LOGIN_USERID)){
                if($INDEX_USERID == $LOGIN_USERID){
                    echo "<form action='user.php?id=$INDEX_USERID' method='post' value=\"$token\"><input type='text' class='input-custom' name='title' value='有感而生！'></input><br/><textarea rows=\"10\" cols=\"50\" name=\"content\" class='input-custom'>写一些什么吧……</textarea><input type='submit' class='input-custom' value='发布'/></form>";
                }
            }
            ?>
            <?php
            $sql = 'select * from articles where type = 0 and auther = '.$INDEX_USERID;
            $result = $article_db->query($sql);
            $cnt = 0;
            while($row = $result->fetchArray(SQLITE3_ASSOC)){
              if($cnt == 12){
                break;
              }
              $auther = $row['auther'];
              $auther = htmlspecialchars($auther,ENT_QUOTES);
              if ($auther == '1'){
                $title = $row['title'];
              }
              else{
                $title = $row['title'];
                $title = htmlspecialchars($title,ENT_QUOTES);
              }
              $content = $row['content'];
              $date_ = $row['date'];
              $img = $row['img'];
              $article_id = $row['id'];
              $article_like = $row['like'];
              $sql = 'select * from users where id = '.$auther;
              $result_ = $users_db->query($sql);
              while($row = $result_->fetchArray(SQLITE3_ASSOC)){
                $auther = $row['name'];
                $qq_id = $row['qqid'];
              }
              if(empty($img)){
                $img = 'http://q2.qlogo.cn/headimg_dl?dst_uin='.$qq_id.'&spec=100';
              }
              // http://q2.qlogo.cn/headimg_dl?dst_uin=3120690593&spec=100
              //if($auther == 'tiantian520'){
              //  echo '<div class="post mb-3 pb-3 border-bottom"><div class="row"><div class="col-auto"><div class="post-media "><img src="'.$img.'" alt="'.$auther.'" width="100"></div></div><div class="col"><div class="post-header"><div class="post-title h5 font-weight-bold">'.$title.'</div></div><div class="post-body"><div class="post-content">'.$content.'</div><div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$date_.'</div></div></div></div></div>';
              //}else{
                echo '<div class="post mb-3 pb-3 border-bottom"><div class="row"><div class="col-auto"><div class="post-media "><img src="'.$img.'" alt="'.$auther.'" width="100"></div></div><div class="col"><div class="post-header"><div class="post-title h5 font-weight-bold">'.$auther.'：<br/>'.$title.'</div></div><div class="post-body"><div class="post-content">'.$content.'</div><div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$date_.'<i><br/>共 '.$article_like.' 人觉得很赞</i><br/><a href="like.php?id='.$article_id.'">点赞</a></div></div></div></div></div>';
              //}
              
              $cnt = $cnt + 1;
            }
            ?>
        </div>

      </div>
    </div>
  </section>


  


  
  

  <!--Opinions-->
  <section class="bg-hard-light">
    <div class="container py-5">
      <div class="opinion-block">
        <div class="row">
          <div class="col-12">
            <div class="opinion-title">
              <h1 class="text-center font-weight-bold m-0 mb-3">TA的个人名片</h1>
            </div>
          </div>
        </div>
        <div class="row py-3">

          <div class="col-12 col-md-6 col-lg-4">
            <a href="#3">
              <div class="post-overlay">
                <div class="post-media">
                  <img src="<?php echo $INDEX_IMG; ?>" class="">
                </div>
                <div class="post-body">
                  <div class="post-author">@<?php echo $INDEX_USERNAME; ?></div>
                  <div class="post-title"><?php echo $INDEX_TITLE; ?></div>
                </div>
              </div>
            </a>
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
                © 2023 | CookForWeb &amp; SkyLine Studio including @tiantian520 
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