<?php

if(isset($_GET['fgpwd']))
{
    $fgpwd = $_GET['fgpwd'];

    //$mysqli = NEW MySQLi('127.0.0.1','root','123456789','專題');


    header("Content-type:text/html;charset=utf8");
    $db_ip="127.0.0.1";
    $db_user="root";
    $db_pwd="123456789";

    $db_link = @mysqli_connect($db_ip,$db_user,$db_pwd,"專題");
    session_start();
    mysqli_query($db_link, 'SET CHARACTER SET utf8');
    $sql = "SELECT `verified`,`vkey` FROM `members` WHERE `verified` = 0 AND `vkey` = '$veky' LIMIT 1";
    $resultSet =mysqli_query($db_link,$sql);
    $resultnum=mysqli_num_rows($resultSet);


    if ($resultnum == 1)
    {
        $upsql="UPDATE `members` SET `verified` = '1' WHERE `vkey` = '$veky' LIMIT 1";
        mysqli_query($db_link,$upsql);

        //$update = $mysqli->query("UPDATE `member` SET `verified` = '1' WHERE `vkey` = '$veky' LIMIT 1");

        echo "你的帳號已驗證，現在可以登入囉";

    }
    else
    {
        echo "此帳號已註冊驗證";
    }
}
else
{
    die("Something went wrong");

}





?>