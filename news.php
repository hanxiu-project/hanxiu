<html>
<head>

    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  rel="stylesheet" type="text/css" href="./csss_file/cssfornophoto3.css?ts=<?=filemtime('cssfornophoto3.css?')?>">
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
<div id="sitebody">


    <!--頁首-->
    <!--包住固定不動的Header-->
    <div id="header2">

        <div id="header">
            <img src="logo3.jpg" align="left" width="auto" height="100">
            <div id="wrapnav1">
                <nav>
                    <ul class="flex-nav ">
                        <?php
                        $sql = "SELECT * FROM posts";
                        $result = mysqli_query($db_link, $sql);
                        $sql_search_acc = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
                        $resultsrchacc = mysqli_query($db_link, $sql_search_acc);
                        $rows = mysqli_fetch_assoc($resultsrchacc);
                        $acc = $rows["account"];
                        $name = $rows["name"];

                        if ($_SESSION[acc] == null) {
                            echo "<li>";
                            echo "<a href='login.php'>登入</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='registered.php'>註冊</a>";
                            echo "</li>";
                        } else if ($acc == $_SESSION['acc']) {

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
					 if ($_SESSION[acc] == null) {
                            echo "<li><a href=indexs.php>回首頁</a></li>";
                          echo "<li><a href=videos.php>影音專區</a></li></a></li>";
                            echo "<li><a href=articletype.php>經文閱讀</a></li>";
							echo " <li><a href=news.php>最新公告</a></li>";
                            
                        }else{?>
						
							<li><a href="indexs.php">回首頁</a></li>
						 <li><a href="videos.php">影音專區</a></li>
                        <li><a href="articletype.php">經文閱讀</a></li>
                        <li><a href="news.php">最新公告</a></li>
                        <li><a href="Memberdonates.php">查看捐獻</a></li>

                        <li><a href="MemberProfile.php">個人資料</a></li>
                        <li><a href="?">留言區</a></li>
						<?php
						}
						?>

                        <li><a href="?">個人資料</a></li>
                        <li><a href="comments.php">留言區</a></li>

                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <!--照片區-->


    <!--左邊欄位
    <div id="sidebar_left">sidebar_left</div>




    右邊欄位
    <div id="sidebar_right">sidebar_right</div>-->


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <div class="contentlist">
                <?php

                $db_ip="127.0.0.1";
                $db_user="root";
                $db_pwd="123456789";
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
                mysqli_query($db_link, 'SET CHARACTER SET utf8');

                $sql="SELECT * FROM posts";
                $result= mysqli_query($db_link,$sql);

                ?>
				<h2>｜最新公告</h2>
				<div class="table" align="center">
                <table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all" cellpadding='5'; >
                    <tr align="center">
                        <td width="20%" size="30px" height="26"  align="center">發佈日期</th>
                        <td width="80%" align="center">標題內文</th>
                    </tr>
                <?php
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td height='65' align='center' style='height:60px'>$row[date]</td>";
                    echo "<td align='center'><a href = 'post.php?id=$row[p_id]'>$row[title]</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
				
                mysqli_close($db_link);
                ?>
			
			</div>
            </div>

        </div>


    </div>
    
    <!--註腳-->
    <footer class="footer">版權所有 © 勤益科大</footer>


</div>

</body>


</html>