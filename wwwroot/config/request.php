<?php 
/* 
@Date: 2023/1/21 12:11
@Auther: tiantian520
@Description: 定时请求API并保存信息 防止老是访问被BAN 可在宝塔面板添加定时任务 新增访问限制
@Filename: ./config/request.php
Powered by HiMemory, @tiantian520
*/

if(!file_exists('total.log')){
    $json = file_get_contents("http://c.m.163.com/nc/article/headline/T1348647853363/0-40.html");
    file_put_contents("news.news","$json");
    $log = file_get_contents("news.log");
    file_put_contents("news.log",$log."\n".date('Y年m月d日 H时i分s秒')." 更新了新闻信息\n");
    $json = file_get_contents("https://api.bilibili.com/x/web-interface/dynamic/region?ps=1&rid=1");
    file_put_contents("videos.videos","$json");
    $json = json_decode($json,true);
    $video = $json['data']['archives'][0];
    $pic = file_get_contents($video['pic']);
    $filename = 'B_pic_'.date('Y-m-d-H-i-s').'.jpg';
    file_put_contents('../img/'.$filename,$pic);
    file_put_contents('videos.pic',$filename);
    $log = file_get_contents("videos.log");
    file_put_contents("videos.log",$log."\n".date('Y年m月d日 H时i分s秒')." 更新了视频信息\n");    
    file_put_contents('total.log',time());
}else{
    if(file_get_contents('total.log')-time() > 60){
        $json = file_get_contents("http://c.m.163.com/nc/article/headline/T1348647853363/0-40.html");
        file_put_contents("news.news","$json");
        $log = file_get_contents("news.log");
        file_put_contents("news.log",$log."\n".date('Y年m月d日 H时i分s秒')." 更新了新闻信息\n");
        $json = file_get_contents("https://api.bilibili.com/x/web-interface/dynamic/region?ps=1&rid=1");
        file_put_contents("videos.videos","$json");
        $json = json_decode($json,true);
        $video = $json['data']['archives'][0];
        $pic = file_get_contents($video['pic']);
        $filename = 'B_pic_'.date('Y-m-d-H-i-s').'.jpg';
        file_put_contents('../img/'.$filename,$pic);
        file_put_contents('videos.pic',$filename);
        $log = file_get_contents("videos.log");
        file_put_contents("videos.log",$log."\n".date('Y年m月d日 H时i分s秒')." 更新了视频信息\n");    
        file_put_contents('total.log',time());
    }else{
        echo "BANNED.";
    }
}


?>