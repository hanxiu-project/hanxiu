<?php
    $db_ip = "127.0.0.1";
    $db_user = "root";
    $db_pwd = "123456789";
    $db_link = @mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
    mysqli_query($db_link, 'SET CHARACTER SET utf8');
    //載入資料庫連線與啟用session
    //include("sql.php");
    session_start();
    # 設定時區

    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
    # 設定時區
    date_default_timezone_set('Asia/Taipei');
    $getDate= date("Y-m-d");

    $sql = "SELECT * FROM posts where old='0' && keep='1' order by `date` ASC ";
    $result = mysqli_query($db_link, $sql);

    while ($row = $result->fetch_assoc())
    {
        if($getDate==$row[date] || $row[date]<$getDate)
        {
            $sqlii="update `posts` set keep='0'  where `p_id`='$row[p_id]'";
            mysqli_query($db_link, $sqlii);
        }
    }

    $sqlp = "SELECT * FROM posts where old='0' && keep='0'  order by `date` ASC ";
    $resultp = mysqli_query($db_link, $sqlp);


    while ($rowp = $resultp->fetch_assoc())
    {
        if($getDate>=$rowp[newday])
        {
            $sqlp="update `posts` set old='1'  where `p_id`='$row[p_id]'";
            mysqli_query($db_link, $sqlp);
        }
    }
?>

