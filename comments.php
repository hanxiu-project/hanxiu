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


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">

            <div class="newstitle2" style="text-align:right;">
                <a href="mycomments.php">查看我的歷史留言</a>
            </div>
            <div class="contentlist">
                <h2>｜留言區</h2>


                <div class="table" align="center" >
                    <br><br>
                    留言內容<br>
                    <form name="msg" method="post" action="comments.php">
                    <textarea  name="message" cols="50" rows="5" placeholder="輸入您的留言..."></textarea>
                    <br>
                    <font color="red">※留言內容請以經文內容錯誤為主※</font>
                    <br>
                    <br>
                        <input type="submit" name="send" value="送出">
                    </form>

                </div>
            </div>
        </div>
    </div>


    <?php
    $sql_search_member = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
    $resultsrchmember = mysqli_query($db_link, $sql_search_member);
    $rows = mysqli_fetch_assoc($resultsrchmember);
    $m_id = $rows["m_id"];






    if(isset($_POST["send"]))
    {
        $nowdate=date("Y-m-d H:i:s" , mktime(date('H')+8,date('i'),date('s'), date('m'), date('d'), date('Y')));
        if(strlen($_POST[message])<=0)
        {
            echo "<script>alert('請輸入留言內容！');location.href='comments.php'</script>";
        }
        else
        {
            $sql_msg="INSERT INTO `comments`(`m_id`,`message`,`msg_datetime`) VALUES ('$m_id','$_POST[message]','$nowdate')";
            mysqli_query($db_link, $sql_msg);
            echo "<script>alert('留言成功！');location.href='comments.php'</script>";
        }
    }




    ?>




    <!--註腳-->
    <footer class="footer">版權所有 轉載請註明出處 | 此網頁所發佈瑜伽師地論講記為最新版 </footer>


</div>

</body>


</html>