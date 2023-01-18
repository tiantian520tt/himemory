<?php
/* 
@Date: 2023/1/4 12:39
@Auther: tiantian520
@Description: 退出登录
@Filename: ./admin/logout.php
Powered by HiMemory, @tiantian520
*/

setcookie("user","",time()-3600);
setcookie("logon","",time()-3600);
echo "<script> window.location.href=\"login.php\";</script>";

?>