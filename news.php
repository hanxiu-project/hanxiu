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


session_start();

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


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
           
                <?php
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
                mysqli_query($db_link, 'SET CHARACTER SET utf8');

                $sql="SELECT * FROM posts where old='0' && keep='0' order by date DESC";
                $result= mysqli_query($db_link,$sql);

                //$sqlold = "SELECT * FROM posts where old = '1' order by date DESC";
                //$resultold= mysqli_query($db_link,$sqlold);
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");
                ?>
		<h2>｜最新公告</h2>
		</div>
				 
                <div class="contentlist" align="center">
				    <div class="tableforcontent" align="center">

                        <table width="60%" style="border:3px #000000  solid;">
                            <tr height="40px" style="font-weight:bold;font-size:20px" bgcolor="#bfbfbf" align="center">
                                <th width="30%">發佈日期</th>
                                <th width="70%">公告標題</th>
                            </tr>

                            <?php

                            $sqlnew = "SELECT * FROM posts where old='0' && keep='0' order by date DESC";
                            $resultnew= mysqli_query($db_link,$sqlnew);

                            $date_nums1 = mysqli_num_rows($resultnew);                          //講記數量
                            $per1 = 5;                                                      //10筆換頁
                            $pages1 = ceil($date_nums1 / $per1);                             //共幾頁
                            if (!isset($_GET["page"])) {
                                $page1 = 1;
                            } else {
                                $page1 = intval($_GET["page"]);                              //確認頁數只能是數值資料
                            }

                            $start1 = ($page1 - 1) * $per1;

                            $sqlresultnew = "SELECT * FROM posts where old='0' && keep='0' order by date DESC Limit $start1 , $per1";
                            $newresult[$start1] = mysqli_query($db_link, $sqlresultnew);
                            $newresult[$page1] = mysqli_query($db_link, $sqlresultnew);

                            while ($row = mysqli_fetch_assoc($newresult[$start1])) {
									$date1 = strtotime($getDate);
									$date2 = strtotime($row[date]);
									$days = ceil(abs($date1 - $date2)/86400);
									
								if($days>$row[newday]){
									$sqlii="update `posts` set old='1'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlii);
								}

                                echo "<tr>";
                                echo "<td height='65' align='center' style='height:60px; vertical-align:middle;'>$row[date]</td>";
                                echo "<td align='center' style='height:60px; vertical-align:middle;'><a href = 'post.php?id=$row[p_id]'>$row[title]</a></td>";
                                echo "</tr>";
                            }
                        echo "</table>";

                            echo "<center>";
                            echo '共 ' . $date_nums1 . ' 筆-在 ' . $page1 . ' 頁-共 ' . $pages1 . ' 頁';
                            echo "<br/><a href=?page=1>首頁</a> ";
                            echo "第 ";
                            for ($i = 1; $i <= $pages1; $i++) {
                                if ($page1 - 10 < $i && $i < $page1 + 10) {
                                    echo "<a href=?page=$i>" . $i . "</a> ";
                                }
                            }
                            echo " 頁 <a href=?page=$pages1>末頁</a>";
                            echo "</center>";
                            ?>
                    </div>
                </div>

        <div class="newstitle">
            <h2>｜歷史公告</h2>
        </div>

        <div class="contentlist" align="center">
            <div class="tableforcontent" align="center">

                <table width="60%" style="border:3px #000000  solid;">
                    <tr height="40px" style="font-weight:bold;font-size:20px" bgcolor="#bfbfbf" align="center">
                        <th width="30%">發佈日期</th>
                        <th width="70%">公告標題</th>
                    </tr>

                    <?php

                    $sqlold = "SELECT * FROM posts where old='1' && keep='0' order by date DESC";
                    $resultold= mysqli_query($db_link,$sqlold);

                    $date_nums2 = mysqli_num_rows($resultold);                          //講記數量
                    $per2 = 5;                                                      //10筆換頁
                    $pages2 = ceil($date_nums2 / $per2);                             //共幾頁
                    if (!isset($_GET["page"])) {
                        $page2 = 1;
                    } else {
                        $page2 = intval($_GET["page"]);                              //確認頁數只能是數值資料
                    }

                    $start2 = ($page2 - 1) * $per2;

                    $sqlresultold = "SELECT * FROM posts where old='1' && keep='0' order by date DESC Limit $start2 , $per2";
                    $oldresult[$start2] = mysqli_query($db_link, $sqlresultold);
                    $oldresult[$page2] = mysqli_query($db_link, $sqlresultold);

                    while ($rowold =mysqli_fetch_assoc($oldresult[$start2])) {
                        echo "<tr>";
                        echo "<td height='65' align='center' style='height:60px; vertical-align:middle;'>$rowold[date]</td>";
                        echo "<td align='center' style='height:60px; vertical-align:middle;'><a href = 'post.php?id=$rowold[p_id]'>$rowold[title]</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<center>";
                    echo '共 ' . $date_nums2 . ' 筆-在 ' . $page2 . ' 頁-共 ' . $pages2 . ' 頁';
                    echo "<br/><a href=?page=1>首頁</a> ";
                    echo "第 ";
                    for ($i = 1; $i <= $pages2; $i++) {
                        if ($page2 - 10 < $i && $i < $page2 + 10) {
                            echo "<a href=?page=$i>" . $i . "</a> ";
                        }
                    }
                    echo " 頁 <a href=?page=$pages2>末頁</a>";
                    echo "</center>";
                    ?>
            </div>
        </div>

    </div>
    
    <!--註腳-->
 <?php include 'footer.php';?>

</div>
</body>
</html>