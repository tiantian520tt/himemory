<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 12:25
@Auther: tiantian520
@Description: 后台动作-文章发布
@Filename: ./admin/action.php
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

if(isset($_POST['title']) && isset($_POST['content'])){ //最少需要两个参数
    if(!empty($_POST['title']) && !empty($_POST['content'])) //不可为空
    {
        $title = $_POST['title'];
        $content = processContent($_POST['content']);        
        if(!isset($_POST['img'])) $img = '';
        else $img = $_POST['img'];
        $type = '0';
        $date_ = date("Y年m月d日 H时i分s秒");
        $sql = "INSERT INTO articles VALUES ('$date_','$title','$img','$content',1,0,0)";
        $result = $article_db->exec($sql);
        if($result){
            echo "<script> alert(\"成功！\"); window.location.href=\"index.php\";</script>";
            die;
        }else{
            echo "<script> alert(\"出现错误！\"); window.location.href=\"index.php\";</script>";
            die;
        }
    }else{
        echo "<script> alert(\"内容无效！\"); window.location.href=\"index.php\";</script>";
        die;
    }
}else{
    echo "<script> alert(\"内容无效！\"); window.location.href=\"index.php\";</script>";
    die;
}
?>