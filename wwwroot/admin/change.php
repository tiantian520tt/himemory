<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/* 
@Date: 2023/1/4 21:15
@Auther: tiantian520
@Description: 后台动作-新闻发布
@Filename: ./admin/change.php
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

if(isset($_POST['title'])){ //最少需要一个参数
    if(!empty($_POST['title'])) //不可为空
    {
        $title = $_POST['title'];
        if(empty($_POST['content'])) $content = '';
        else $content = processContent($_POST['content']);        
        if(!isset($_POST['img'])) $img = '';
        else $img = $_POST['img'];
        $date_ = date("Y年m月d日 H时i分s秒");
        $id = $_POST['id'];
        $sql = "UPDATE news SET img = '$img',title = '$title',content = '$content',date = '$date_' WHERE id = $id";
        $result = $news_db->exec($sql);
        if($result){
            echo "<script> alert(\"成功！\"); window.location.href=\"articles.php\";</script>";
            die;
        }else{
            echo "<script> alert(\"出现错误！\"); window.location.href=\"articles.php\";</script>";
            die;
        }
    }else{
        echo "<script> alert(\"内容无效！\"); window.location.href=\"articles.php\";</script>";
        die;
    }
}else{
    echo "<script> alert(\"内容无效！\"); window.location.href=\"articles.php\";</script>";
    die;
}
?>