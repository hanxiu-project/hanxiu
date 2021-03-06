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


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">

            <div class="contentlist">
                <h2>｜搜尋結果 </h2>
                <center>
                    <!-- <table width="60%">-->

                    <?php

                    if (isset($_GET['srctitle'])) {

                             $_SESSION["srctitle"] = "$_GET[srctitle]";
                             $sqlscr = "SELECT * FROM `scripture` where `title` LIKE '%$_SESSION[srctitle]%'";
                             $resultshow = mysqli_query($db_link, $sqlscr);

                             $countresult = mysqli_num_rows($resultshow);
                             if ($countresult == 0) {
                                 echo "<script>alert('查無資料！');location.href='articletype.php';</script>";
                             }
                             else{
                                 while ($rowt = $resultshow->fetch_assoc()) {
                                     $srctitleresult_id[] = $rowt[s_id];
                                     $srctitleresult_number[] =$rowt[number];
                                 }
                                 echo "<table width='60%' border='1px'>";
                                 $per=10;
                                 $rows=ceil($countresult/$per);
                                 for($i=1;$i<=$rows;$i++) {
                                     echo "<tr height=50px>";
                                     $start = ($i - 1) * 10;
                                     for($j=$start;$j<$start+10;$j++)
                                     {
                                         echo "<td width='8%'>";
                                         echo "<a href=article.php?sid='$srctitleresult_id[$j]'>$srctitleresult_number[$j]</a>";
                                         echo "</td>";
                                     }
                                     echo "</tr>";
                                }
                                 echo "</table>";


                             }

                    }


                    ?>
            </div>

        </div>


    </div>

    <!--註腳-->
    <?php include 'footer.php';?>


</div>

</body>


</html><?php
