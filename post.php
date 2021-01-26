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
//載入資料庫連線與啟用session
//include("sql.php");


?>


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
                        <li><a href="indexs.php">回首頁</a></li>
                        <li><a href="articletype.php">經文閱讀</a></li>
                        <li><a href="news.php">最新公告</a></li>
                        <li><a href="?">查看捐獻</a></li>
                        <li><a href="?">個人資料</a></li>
                        <li><a href="?">留言區</a></li>
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
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="01.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="04.jpg" class="d-block w-100" height="500px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="07.jpg" class="d-block w-100" height="500px" alt="...">
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


    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM posts WHERE p_id = $id";
        $result = mysqli_query($db_link, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <h2>｜<?php echo $row["title"] ?></h2>
        </div>
            <div class="tablelist">



                <div class="table" align="center">
                    <table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all" cellpadding='5' ;>
                        <tr>
                            <td>
                                發布日期：<?php echo $row["date"] ?></p>
                                內容：<?php echo $row["content"] ?></td>
                        </tr>
                    </table>




            </div>
        </div>


    </div>

    <!--註腳-->
    <footer class="footer">版權所有 © 勤益科大</footer>


</div>

</body>


</html>