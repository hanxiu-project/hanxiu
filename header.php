<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="csss_file/RWDforheader.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

</head>

<body>

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

?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<?php
	 mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");


            //...
            $sql = "SELECT * FROM posts where old='0' && keep='1' order by `date` ASC ";
            $result = mysqli_query($db_link, $sql);


            while ($row = $result->fetch_assoc()) {
                if($getDate==$row[date] || $row[date]<$getDate){
				    $sqlii="update `posts` set keep='0'  where `p_id`='$row[p_id]'";
				    mysqli_query($db_link, $sqlii);
                    }
                }


            //...
            $sqlp = "SELECT * FROM posts where old='0' && keep='0'  order by `date` ASC ";
            $resultp = mysqli_query($db_link, $sqlp);


            while ($rowp = $resultp->fetch_assoc()) {
			    if($getDate>=$rowp[newday]){
			        $sqlp="update `posts` set old='1'  where `p_id`='$row[p_id]'";
				    mysqli_query($db_link, $sqlp);
				    }
                }
            ?>
<!--最外圍-->


<span style="font-family:微軟正黑體,serif;">


    <!--頁首-->
    <!--包住固定不動的Header-->

    
    <div class="header2">
        <div class="header">
            <input type="checkbox" name="" id="menu_control">
            <div class="logoimg">
                <img src="logonew.png" align="left" >
            </div>
            <label for="menu_control" class="menu_btn">
                <span>選單</span>
            </label>

                <nav>
                    <ul >
                        <?php
                        $sql_search_acc = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
                        $resultsrchacc = mysqli_query($db_link, $sql_search_acc);
                        $rows = mysqli_fetch_assoc($resultsrchacc);
                        $acc = $rows["account"];
                        $pwd = $rows["password"];
                        $name = $rows["name"];
						$authority = $rows["authority"];
                        if ($_SESSION[acc] == null || $_SESSION[pwd] == null) {
                            echo "<li>";
                            echo "<a href='login.php'>登入</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='registered.php'>註冊</a>";
                            echo "</li>";

                        } else if($_SESSION[acc] != $acc  || $_SESSION[pwd] != $pwd){
                            echo "<li>";
                            echo "<a href='login.php'>登入</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='registered.php'>註冊</a>";
                            echo "</li>";
                        }else
                            {
                            echo "<li>";
                            echo "<a href='#'><b>$name</b>，您好</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='logout.php' >登出</a>";
                            echo "</li>";
                        }
                        ?>

                        </ul>
                        <ul >
                        <?php
                        
					 if ($_SESSION[acc] == null  || $_SESSION[pwd] == null) {

                         echo "<li><a href=indexs.php>首頁</a></li>";
                         echo "<li><a href=articletype.php>瑜論講記</a></li>";
                         echo "<li><a href=kepan.php>科判</a></li>";
                         echo "<li><a href=supplementtype.php>補充資料</a></li>";
                         echo "<li><a href=videotypes.php>法音流佈</a></li>";
                         echo " <li><a href=news.php>公告訊息</a></li>";
						 echo " <li><a href=Memberdonates.php>查看捐獻</a></li>";
						 echo " <li><a href=MemberProfile.php>個人資料</a></li>";
						 echo " <li><a href=comments.php>錯誤回報</a></li>";
                         echo " <li><a href=contact.php>聯絡我們</a></li>";
                        }
                    else if ($_SESSION[acc] != $acc  || $_SESSION[pwd] != $pwd){
                         echo "<li><a href=indexs.php>首頁</a></li>";
                         echo "<li><a href=articletype.php>瑜論講記</a></li>";
                         echo "<li><a href=kepan.php>科判</a></li>";
                         echo "<li><a href=supplementtype.php>補充資料</a></li>";
                         echo "<li><a href=videotypes.php>法音流佈</a></li>";
                         echo " <li><a href=news.php>公告訊息</a></li>";
						 echo " <li><a href=Memberdonates.php>查看捐獻</a></li>";
						 echo " <li><a href=MemberProfile.php>個人資料</a></li>";
						 echo " <li><a href=comments.php>錯誤回報</a></li>";
                         echo " <li><a href=contact.php>聯絡我們</a></li>";

                        }
                    else if ($authority=='1' || $authority=='2'){

                        ?>
                         <li><a href="indexs.php">首頁</a></li>
                         <li><a href="articletype.php">瑜論講記</a></li>
                         <li><a href=kepan.php>科判</a></li>
                         <li><a href=supplementtype.php>補充資料</a></li>
                         <li><a href="videotypes.php">法音流佈</a></li>
                         <li><a href="news.php">公告訊息</a></li>
                         <li><a href="Memberdonates.php">查看捐獻</a></li>
                         <li><a href="MemberProfile.php">個人資料</a></li>
                         <li><a href="comments.php">錯誤回報</a></li>
						 <li><a href="contact.php">聯絡我們</a></li>
                         <li><a href="AdminScriptureManage.php">回後台</a></li>
						<?php

                        }
					 else{?>


                         <li><a href="indexs.php">首頁</a></li>
                         <li><a href="articletype.php">瑜論講記</a></li>
                         <li><a href=kepan.php>科判</a></li>
                         <li><a href=supplementtype.php>補充資料</a></li>
                         <li><a href="videotypes.php">法音流佈</a></li>
                         <li><a href="news.php">公告訊息</a></li>
                         <li><a href="Memberdonates.php">查看捐獻</a></li>
                         <li><a href="MemberProfile.php">個人資料</a></li>
                         <li><a href="comments.php">錯誤回報</a></li>
						 <li><a href="contact.php">聯絡我們</a></li>

						<?php
						}
						?>
                        </ul>
                </nav>


        </div>
    </div>

</span>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

   
   
   <script>  document.getElementById('menubtn').addEventListener('click', function (e) {
        $(this).toggleClass('active');
        $('#menuUl').toggleClass('active');

    })

    $('#menuUl li').click(function () {
        $(this).parent().find('li').each(function () {
            if ($(this).hasClass('current-active')) {
                $(this).toggleClass('current-active');
            }
        })
        $(this).toggleClass('current-active');
    })

		</script>
                      





    </body>


</html>