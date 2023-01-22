<?php
session_start();
header("X-Content-Type-Options:nosniff;"); //反X-Content-Type-Options Header Missing漏洞,低危,ZAP扫描
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~  线上环境请务必将以下两条的内容设置好!!!  ~*/
/*~  线上环境请务必将以下两条的内容设置好!!!  ~*/
/*~  线上环境请务必将以下两条的内容设置好!!!  ~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/


//header('X-Frame-Options:ALLOW-FROM https://himemory.191810.xyz/;'); // 修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
//header('Content-Security-Policy: frame-ancestors https://himemory.191810.xyz/;'); // 针对chrome内核修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">';
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
error_reporting(0); 
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
/*~  线上环境请务必将error_reporting注释掉!!! ~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/
/*~~~~~~~~~~~~~~~~~~ WARNING ~~~~~~~~~~~~~~~~~~*/

/* 
@Date: 2023/1/4 12:06
@Auther: tiantian520
@Description: 网站配置
@Filename: ./config/config.php
Powered by HiMemory, @tiantian520
*/

/* 此文件会被include包含 */
$admin_username = "test"; //管理员用户名，必须设置
$admin_password = "test"; //管理员密码，必须设置

/* 生成反CSRF令牌 */
if (empty($_SESSION['token'])) {
    if (function_exists('mcrypt_create_iv')) {
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}
$token = $_SESSION['token'];

function NewYear(){
    $month = date("n");
    $day = intval(date("d"));
    $is_show = $month == 1 || ($month == 2 and $day < 10);
    if($is_show) {
        echo '<script src="https://cdn.jsdelivr.net/gh/fz6m/china-lantern@1.1/dist/china-lantern.min.js"></script>';
    }
}



function all_external_link($text = '', $host = '') {
    if (empty($host)) $host = $_SERVER['HTTP_HOST'];
    $reg = '/http(?:s?):\/\/((?:[A-za-z0-9-]+\.)+[A-za-z]{2,4})/';
    preg_match_all($reg, $text, $data);
    $math = $data[1];
    foreach ($math as $value) {
      if($value != $host) return false;
    }
    return true;
}


function getOs() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $OS = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i', $OS)) {
            $OS = 'Windows';
        } elseif (preg_match('/mac/i', $OS)) {
            $OS = 'MAC';
        } elseif (preg_match('/linux/i', $OS)) {
            $OS = 'Linux';
        } elseif (preg_match('/unix/i', $OS)) {
            $OS = 'Unix';
        } elseif (preg_match('/bsd/i', $OS)) {
            $OS = 'BSD';
        } else {
            $OS = 'Other';
        }
        return $OS;
    } else {
        return false;
    }
}


function getBrowser() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $br)) {
            $br = 'MSIE';
        } elseif (preg_match('/Firefox/i', $br)) {
            $br = 'Firefox';
        } elseif (preg_match('/Chrome/i', $br)) {
            $br = 'Chrome';
        } elseif (preg_match('/Safari/i', $br)) {
            $br = 'Safari';
        } elseif (preg_match('/Opera/i', $br)) {
            $br = 'Opera';
        } else {
            $br = 'Other';
        }
        return $br;
    } else {
        return false;
    }
}

function getIP() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
}

try{
    $users_db = new SQLite3('../database/users.db');
    if (!$users_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $users_db->lastErrorCode();
        echo 'Error：' . $users_db->lastErrorMsg();
        $users_db->close();
        die;
    }
    $article_db = new SQLite3('../database/articles.db');
    if (!$article_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $article_db->lastErrorCode();
        echo 'Error：' . $article_db->lastErrorMsg();
        $article_db->close();
        die;
    }
    $news_db = new SQLite3('../database/news.db');
    if (!$news_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $news_db->lastErrorCode();
        echo 'Error：' . $news_db->lastErrorMsg();
        $news_db->close();
        die;
    }
    $visitors_db = new SQLite3('../database/visitors.db');
    if (!$visitors_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $visitors_db->lastErrorCode();
        echo 'Error：' . $visitors_db->lastErrorMsg();
        $visitors_db->close();
        die;
    }
    $data_db = new SQLite3('../database/data.db');
    if (!$data_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $data_db->lastErrorCode();
        echo 'Error：' . $data_db->lastErrorMsg();
        $data_db->close();
        die;
    }
}catch(Exception $e){
    $users_db = new SQLite3('./database/users.db');
    if (!$users_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $users_db->lastErrorCode();
        echo 'Error：' . $users_db->lastErrorMsg();
        $users_db->close();
        die;
    }
    $article_db = new SQLite3('./database/articles.db');
    if (!$article_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $article_db->lastErrorCode();
        echo 'Error：' . $article_db->lastErrorMsg();
        $article_db->close();
        die;
    }
    $news_db = new SQLite3('./database/news.db');
    if (!$news_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $news_db->lastErrorCode();
        echo 'Error：' . $news_db->lastErrorMsg();
        $news_db->close();
        die;
    }
    $visitors_db = new SQLite3('./database/visitors.db');
    if (!$visitors_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $visitors_db->lastErrorCode();
        echo 'Error：' . $visitors_db->lastErrorMsg();
        $visitors_db->close();
        die;
    }
    $data_db = new SQLite3('./database/data.db');
    if (!$data_db) {
        echo '<title> Oops! HiMemory crashed! </title>';
        echo '<h1> Oops! HiMemory crashed! </title>';
        echo 'code：' . $data_db->lastErrorCode();
        echo 'Error：' . $data_db->lastErrorMsg();
        $data_db->close();
        die;
    }
}


/* include后，收集访客信息存入数据库 */
$INDEX_IP = getIP();
$json = json_decode(file_get_contents("http://api.vore.top/api/IPdata?ip=".(string)$INDEX_IP),true);
if($json['ipdata']['info1'] == '保留IP'){
    $city = '本地地址';
    $province = '本地地址';
    $area = '本地地址';
    $isp = '保留地址';
}else{
    $province = (string)$json['ipdata']['info1'];
    $city = (string)$json['ipdata']['info2'];
    $area = (string)$json['ipdata']['info3'];
    $isp = (string)$json['ipdata']['isp'];
}

/* Check Cookie!!!! */
if (isset($_COOKIE["logon"]) and isset($_COOKIE["user"])){
  $sql = 'SELECT * FROM users WHERE name = "'.htmlspecialchars(addslashes($_COOKIE['user'])).'" and password = "'.htmlspecialchars(addslashes($_COOKIE['logon'])).'"';
  $result = $users_db->query($sql);
  while($row = $result->fetchArray(SQLITE3_ASSOC)){
    $VISITOR_USER_ID = "'".$row['id']."'";
  }
}

if(!isset($VISITOR_USER_ID)) $VISITOR_USER_ID = 'NULL';
$sql="INSERT INTO visitors VALUES(NULL,'$province','$city','$area','$isp','$INDEX_IP',$VISITOR_USER_ID)";
$visitors_db->exec($sql);


?>
