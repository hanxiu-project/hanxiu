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

                            if (isset($_GET['srckword'])) {
                                $_SESSION["srckeyword"] = "$_GET[srckword]";

                                $sqlscr = "SELECT * FROM `scripture` ";
                                $resultshow = mysqli_query($db_link, $sqlscr);

                                while ($row = $resultshow->fetch_assoc()) {
                                    $filename = "$row[filename]";
                                    $str = "";

                                    //判斷是否有該檔案
                                    if (file_exists("C:/AppServ/www/漢修專題/ScriptureFile/$filename")) {
                                        $file = fopen("C:/AppServ/www/漢修專題/ScriptureFile/$filename", "r");
                                        if ($file != NULL) {
                                            //當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)

                                            while (!feof($file)) {
                                                $str .= fgets($file);
                                            }

                                            if (strpos($str, $_SESSION["srckeyword"]) == true) {
                                                $srcresult_id[]=$row[s_id];
                                                $srcresult_number[] =$row[number];
                                                ?>
                                                <?php
                                            }


                                           // echo "</table>";
                                            fclose($file);
                                        }
                                    }


                                            else
                                        echo "<script>alert('查無資料！');location.href='articletype.php';</script>";
                                }
                                echo "<table width='60%' border='1px'>";
                                $count_result=count($srcresult_id);
                                $per=10;
                                $rows=ceil($count_result/$per);
                                for($i=1;$i<=$rows;$i++) {
                                    echo "<tr height=50px>";
                                    $start = ($i - 1) * 10;
                                    for($j=$start;$j<$start+10;$j++)
                                    {
                                        echo "<td width='8%'>";
                                        echo "<a href=article.php?sid='$srcresult_id[$j]' title='$srcresult_number[$j]'>$srcresult_number[$j]</a>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";

                                }
                                echo "</table>";


                            }


                            ?>
            </div>

        </div>


    </div>

    <!--註腳-->
   <?php include 'footer.php';?>


</div>

</body>


</html>