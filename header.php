<html>
<head>

    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  rel="stylesheet" type="text/css" href="./csss_file/topic.css?ts=<?=filemtime('topic.css?')?>">
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

?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">


<!--最外圍-->



    <!--頁首-->
    <!--包住固定不動的Header-->
    <div id="header2">

        <div id="header">
            <img src="logo.png" align="left" width="auto" height="100">
            <div id="wrapnav1">
                <nav>
                    <ul class="flex-nav ">
                        <?php
                      
                        $sql_search_acc = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
                        $resultsrchacc = mysqli_query($db_link, $sql_search_acc);
                        $rows = mysqli_fetch_assoc($resultsrchacc);
                        $acc = $rows["account"];
                        $pwd = $rows["password"];
                        $name = $rows["name"];

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
                </nav>

            </div>
             <div id="wrapnav2">
                <nav>
                    <ul class="flex-nav ">
                       <?php
					 if ($_SESSION[acc] == null  || $_SESSION[pwd] == null) {
                         echo "<li><a href=indexs.php>首頁</a></li>";
                         echo "<li><a href=articletype.php>講記內容</a></li>";
                         echo "<li><a href=kepan.php>科判</a></li>";
                         echo "<li><a href=?>補充資料</a></li>";

                          echo "<li><a href=videotypes.php>法音流佈</a></li></a></li>";
                         echo " <li><a href=news.php>最新公告</a></li>";
						 echo " <li><a href=contact.php>聯絡我們</a></li>";

                        

                            
                        }else if ($_SESSION[acc] != $acc  || $_SESSION[pwd] != $pwd){
                         echo "<li><a href=indexs.php>首頁</a></li>";
                         echo "<li><a href=articletype.php>講記內容</a></li>";
                         echo "<li><a href=kepan.php>科判</a></li>";
                         echo "<li><a href=?>補充資料</a></li>";

                         echo "<li><a href=videotypes.php>法音流佈</a></li></a></li>";
                         echo " <li><a href=news.php>最新公告</a></li>";
                         echo " <li><a href=contact.php>聯絡我們</a></li>";

                     }else{?>
						
							<li><a href="indexs.php">首頁</a></li>
                         <li><a href="articletype.php">講記內容</a></li>
                         <li><a href=kepan.php>科判</a></li>
                         <li><a href=?>補充資料</a></li>
                         <li><a href="videotypes.php">法音流佈</a></li>
                        <li><a href="news.php">最新公告</a></li>
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
    </div>
   


   




</body>


</html>