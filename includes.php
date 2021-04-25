<?php
function logger($log){
    if(!file_exists('log/log.txt'))
    {
        file_put_contents('log/log.txt','');
    }

    $ip = $_SERVER['REMOTE_ADDR'];      //Client IP
    date_default_timezone_get('Asia/Taipei');
    $time = date('m/d/y h:iA',time());

    $contents = file_get_contents('log/log.txt');
    $contents .="$ip\t$time\t$log\r";

    file_put_contents('log/log.txt',$contents);

}