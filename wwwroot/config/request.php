<?php 
/* 
@Date: 2023/1/5 20:17
@Auther: tiantian520
@Description: 定时请求API并保存信息 防止老是访问被BAN 可在宝塔面板添加定时任务
@Filename: ./config/request.php
Powered by HiMemory, @tiantian520
*/
$json = file_get_contents("http://c.m.163.com/nc/article/headline/T1348647853363/0-40.html");
file_put_contents("news.news","$json");
$log = file_get_contents("news.log");
file_put_contents("news.log",$log."\n".date('Y年m月d日 H时i分s秒')." 更新了新闻信息\n");
?>