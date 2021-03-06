<html>
<head>

    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="csss_file/cssfornophoto3.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

</head>

<body>

<?php


?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">


<!--最外圍-->
<div id="sitebody">


    <!--頁首-->
    <!--包住固定不動的Header-->
  <?php include 'header.php';?>

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

    <!--抓歷史留言-->
    <?php
    $sql_search_member = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
    $resultsrchmember = mysqli_query($db_link, $sql_search_member);
    $rows = mysqli_fetch_assoc($resultsrchmember);
    $m_id = $rows["m_id"];


    $sql_allmsg="SELECT * FROM `comments` where `comments`.`m_id` = '$m_id' order by `msg_datetime` DESC";
    $result_allmsg=mysqli_query($db_link,$sql_allmsg);
    $result_allmsg1=mysqli_query($db_link,$sql_allmsg);
    ?>





    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <div class="contentlist">
                <h2>｜我的歷史留言</h2>
            <?php

            if(!isset($_GET[ccid]))
            {
            ?>

                    <center>
                        <div class="table" align="center" style="width: 60%">
                            <br><br>
                            <div>
                                <font size="6">我的留言</font>
                            </div>
                            <br>

                            <?php

                            while($allmsg=mysqli_fetch_assoc($result_allmsg))
                            {
                                $c_id=$allmsg['c_id'];
                                $m_id2=$allmsg['m_id'];
                                $msg=$allmsg['message'];
                                $time=$allmsg['msg_datetime'];

                                ?>

                                    <div style='border:1px solid;'>
                                        <div align="left"><?php echo $msg; ?></div>
                                        <div align='right'><?php echo $time; ?></div>
                                <?php
                                        echo "<div align='right'><a href=?ccid=$c_id>查看回覆</a> </div>";
                                ?>
                                    </div>
                                    <br>

                                <?php
                            }
                            ?>
                    </center>
                </div>


            <?php
            }
            elseif (isset($_GET[ccid]))          //按查看回覆
            {
            ?>

                    <center>
                        <div class="table" align="center" style="width: 60%">
                            <br><br>
                            <div>
                                <font size="6">留言回覆</font>
                            </div>
                            <br>

                            <?php

                            $sql_search_mbrcid = "SELECT * FROM `comments` WHERE `c_id` = '$_GET[ccid]'";
                            $resultsrchcommentdata = mysqli_query($db_link, $sql_search_mbrcid);
                            $rowq = mysqli_fetch_assoc($resultsrchcommentdata);
                            $msg2 = $rowq["message"];
                            $time2 = $rowq["msg_datetime"];
                            $reply = $rowq["reply"];
                            $rpy_time2 = $rowq["rpy_datetime"];


                            ?>

                        <div style='border:1px solid;'>
                        <div align="left"><b>我：</b><?php echo $msg2; ?></div>
                        <div align='right'><?php echo $time2; ?></div>
                        </div>
                            <br>

                            <div style='border:1px solid;'>
                                <div align="left"><b>管理員：</b><?php echo $reply; ?></div>
                                <div align='right'><?php echo $rpy_time2; ?></div>
                            </div>


                    </center>
                </div>

            <?php

            }

            ?>







        </div>
    </div>


    <!--註腳-->
    <footer class="footer">版權所有 轉載請註明出處 | 此網頁所發佈瑜伽師地論講記為最新版 </footer>


</div>

</body>


</html>