<?php
header("X-Content-Type-Options:nosniff;"); //反X-Content-Type-Options Header Missing漏洞,低危,ZAP扫描
header('X-Frame-Options:ALLOW-FROM https://himemory.191810.xyz/;'); // 修复X-Frame-Options Header Not Set漏洞,低危,ZAP扫描
header('Content-Security-Policy: frame-ancestors https://himemory.191810.xyz/;'); // 针对chrome内核修复X-Frame-Options Header Not Set漏洞,低
/* 
@Date: 2023/1/4 12:39
@Auther: tiantian520
@Description: 退出登录
@Filename: logout.php
Powered by HiMemory, @tiantian520
*/

setcookie("user","",time()-3600);
setcookie("logon","",time()-3600);
echo "<script> window.location.href=\"index.php\";</script>";

?>