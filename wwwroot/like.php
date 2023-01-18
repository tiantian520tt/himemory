<?php
echo '<meta charset="utf-8">';
header("X-Content-Type-Options:nosniff;"); //反X-Content-Type-Options Header Missing漏洞,低危,ZAP扫描
header('X-Frame-Options:ALLOW-FROM https://himemory.191810.xyz/;'); // 修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
header('Content-Security-Policy: frame-ancestors https://himemory.191810.xyz/;'); // 针对chrome内核修复X-Frame-Options Header Not Set漏洞,低
/* 
@Date: 2023/1/6 0:05
@Auther: tiantian520
@Description: 点赞文章
@Filename: like.php
@Usage: like.php?id=
@Tips: 点赞一篇文章，不需要登录，但一小时仅能给一篇文章点一次赞
Powered by HiMemory, @tiantian520
*/
//检查反CSRF令牌
if(!isset($_SESSION['token']) || !isset($_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"index.php\";</script>";
	die;
}
if (!($_SESSION['token'] === $_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"index.php\";</script>";
	die;
}
/* GET拿到访问目标ID */
if(isset($_GET['id'])){
    $article_id = $_GET['id'];
}else{
    /* 没有ID 返回主页 */
    echo "<script> window.location.href=\"index.php\";</script>";
    die;
}
/* include 网站配置 */
include './config/config.php';

/* 查找是否存在这篇文章 */
$sql = 'SELECT * FROM articles WHERE id = '.htmlspecialchars(addslashes($article_id));
$result = $article_db->query($sql);
while($row = $result->fetchArray(SQLITE3_ASSOC)){
   $article_id = $row['id'];
   $auther_id = $row['auther'];  
   $INDEX_LIKE = $row['like'] + 1;
}

/* 将$_SERVER['HTTP_REFERER']取最后的文件名 */
$from = basename($_SERVER['HTTP_REFERER']);

/* 查看是否点赞 */
if (isset($article_id)){
    if(!isset($_COOKIE["$auther_id-$article_id-HiMemory-DONTDELETE"])){
        $sql = "UPDATE articles SET like = $INDEX_LIKE WHERE id = $article_id";
        $result = $article_db->exec($sql);
        setcookie("$auther_id-$article_id-HiMemory-DONTDELETE",'true',time()+3600);
        echo "<script> window.location.href=\"".$from."\";</script>";
        die;
    }else{
        echo "<script> alert('一小时内仅能为同一篇文章点赞一次！'); window.location.href=\"".$from."\";</script>";
        die;
    }
}else{
    echo "<script> window.location.href=\"index.php\";</script>";
    die;
}

