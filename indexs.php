<html>

<head>

    <title>首頁</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./csss_file/topic1.css?ts=<?=filemtime('topic1.css?')?>" rel="stylesheet" type="text/css">
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

session_start();
?>


<!--最外圍-->
<div id="sitebody">

    <!--頁首-->
    <!--包住固定不動的Header-->
    <div id="header2">

        <div id="header">
            <img src="logo.png" align="left" width="auto" height="100">
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
						$mid = $rows["m_id"];
						$_SESSION['mid']=$mid;
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
                            echo "<a href='logout.php'>登出</a>";
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
                         echo "<li><a href=indexs.php>首頁</a></li>";
                         echo "<li><a href=articletype.php>講記內容</a></li>";
                         echo "<li><a href=?>科判</a></li>";
                         echo "<li><a href=?>補充資料</a></li>";

                          echo "<li><a href=videotypes.php>法音流佈</a></li></a></li>";
                         echo " <li><a href=news.php>最新公告</a></li>";
						 echo " <li><a href=contact.php>聯絡我們</a></li>";

                        

                            
                        }else{?>
						
							<li><a href="indexs.php">首頁</a></li>
                         <li><a href="articletype.php">講記內容</a></li>
                         <li><a href=?>科判</a></li>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <!--照片區-->
    <div id="photo">

        <div id="container">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="圖1.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="圖2.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="圖3.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
					<div class="carousel-item">
                        <img src="圖4.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
					<div class="carousel-item">
                        <img src="圖5.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
					<div class="carousel-item">
                        <img src="圖6.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>


    <!--左邊欄位
    <div id="sidebar_left">sidebar_left</div>




    右邊欄位
    <div id="sidebar_right">sidebar_right</div>-->


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <h2>｜最新公告 </h2>
				 </div>
            <div class="tablelist">

                <?php
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($db_link, $sql);
                ?>
                <center>
				 <div class="contentlist" align="center">
                     <div class="table" align="center">
                    <table width="60%"  style="border:3px #000000  solid;" >
                        <tr height="40px" style="font-weight:bold" bgcolor="#bfbfbf" align="center" >
                            <th width="20%">發佈日期</th>
                            <th width="80%">標題內文</th>
                        </tr>

                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td height='65' align='center' style='height:60px'>$row[date]</td>";
                            echo "<td align='center'><a href = 'post.php?id=$row[p_id]'>$row[title]</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        mysqli_close($db_link);
                        ?>

                    </table>
                     </div>
                </center>

            </div>
		</div>
       


    </div>

    <!--註腳-->
    <footer class="footer">版權所有 轉載請註明出處</footer>


</div>

</body>


</html>