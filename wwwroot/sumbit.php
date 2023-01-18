<title>Sumbit - Hi Memory!</title>
<meta charset="utf-8">
<?php
/* 
@Date: 2023/1/3 18:17
@Auther: tiantian520
@Description: 提交布告
@Filename: sumbit.php
Powered by HiMemory, @tiantian520
*/
include './config/config.php';
//检查反CSRF令牌
if(!isset($_SESSION['token']) || !isset($_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"inndex.php\";</script>";
	die;
}
if (!($_SESSION['token'] === $_POST['token'])){
    echo "<script> alert(\"CSRF令牌校验错误！\"); window.location.href=\"index.php\";</script>";
	die;
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
    $INDEX_USERNAME = $row['name'];
    $INDEX_USERID = $row['id'];
    $INDEX_QQID = $row['qqid'];
  }
}else{
    echo "<script> alert(\"您未登录！\"); window.location.href=\"login.php\";</script>";
    die;
}

try{
    $auther = $INDEX_USERNAME;
    $img = "http://q2.qlogo.cn/headimg_dl?dst_uin=$INDEX_QQID&spec=100";
    $content = mysql_real_escape_string($_GET['content']);
    $title = mysql_real_escape_string($_GET['title']);
    if(empty($content)) {
        echo "<script>alert(\"你输入的内容为空！\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>";
        die;
    }
    if(empty($title)) {
        echo "<script>alert(\"你输入的标题为空！\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>";
        die;
    }
    /* 在Sumbit.php中使用Base64和转义来防范注入 */
    $content = base64_encode($content);
    $title = base64_encode($title);
    $date_ = date('Y年m月d日 H时i分s秒');
    $maindir = './database/data.db';
    $main = new \SQLite3($maindir);
    if (!$main) {
        echo 'code：' . $main->lastErrorCode();
        echo 'Error：' . $main->lastErrorMsg();
        $main->close();
        die;
    }
    $sql = "INSERT INTO messages VALUES ('$auther','$title','$content','$img',null,'$date_')";
    $result = $main->exec($sql);
    if($result){
        echo "<script>window.location.href=\"index.php\";</script>";
    }else{
        echo "<script>alert(\"Error!\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>";
    }
}catch(Exception $e){
    echo "Oops! We got some problems!";
}

?>