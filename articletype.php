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


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            
                <?php
                if (isset($_GET["tid"]))
                {
                $tid = $_GET["tid"];
                $sqltype = "SELECT * FROM `types` where `t_id` = $tid";
                $resulttype = mysqli_query($db_link, $sqltype);
                $rtypename = mysqli_fetch_row($resulttype);
				$_SESSION['rtypename']=$rtypename[1];
                ?>
                <h2>｜<?php echo "$rtypename[1]" ?>  </h2>
				</div> 
				<div class="contentlist">
				<div class="tableforcontent">
                <center>
                    <table width="80%" border="1px">
                        <br>
                        <?php
                        $sqlatcnum = "SELECT * FROM `scripture` where  `save`='0' && `t_id` = $tid ";

                        $result_row = mysqli_query($db_link, $sqlatcnum);
                        $data = mysqli_num_rows($result_row);       //抓總共幾筆


                        $per=10;
                        $rows=ceil($data/$per);

                        $resultnum = mysqli_query($db_link, $sqlatcnum);

                        for($i=1;$i<=$rows;$i++)
                            {
                                $start=($i-1)*10;
                                $sqlatcnum10 = "SELECT * FROM `scripture` where  `save`='0' &&`t_id` = $tid order by `number` ASC Limit  $start  , $per";
                                $resultnum10 = mysqli_query($db_link, $sqlatcnum10);
                                echo "<tr height=50px>";
                                while ($script = mysqli_fetch_assoc($resultnum10)) {
                                    echo "<td width='8%'>";
                                    echo "<a href=article.php?sid='$script[s_id]' title='$script[number]'>$script[number]</a></p>";
									
									
                                    echo "</td>";
                                }

                                echo "</tr>";

                            }



                        echo "</table>";
                        echo "</center>";
                        }
                        else                                            //還沒選類別時
                        {
                        ?>

                        <h2>｜講記類別 </h2>

                        <br><br>

                        <div align="right">
                            <form name="src" method="GET" action="">

                                查詢文章標題：<input type="text" name="srctitle" Placeholder="輸入文章標題">
                                <input type='submit' name='tsrcbtn' value='搜尋'>
                                <br>
                                查詢文章內容：<input type="text" name="srckeyword" Placeholder="輸入關鍵字">
                                <input type='submit' name='srcbtn' value='搜尋'>

                                <br><br>
                            </form>
                        </div>


                        <center>
                            <br>
							
                           <table width="80%" border="1px">
                                <br>
                                <?php
                        $sqlatypecnum = "SELECT * FROM `types`";

                        $results_row = mysqli_query($db_link, $sqlatypecnum);
                        $datas = mysqli_num_rows($results_row);       //抓總共幾筆


                        $per=10;
                        $rows=ceil($datas/$per);

                        $resultsnum = mysqli_query($db_link, $sqlatypecnum);

                        for($j=1;$j<=$rows;$j++)
                            {
                                $start=($j-1)*10;
                                $sqlatcnums10 = "SELECT * FROM types Limit $start , $per";
                                $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                echo "<tr height=50px>";
                                while ($row = mysqli_fetch_assoc($resultnums10)) {
                                    echo "<td width='8%'>";
                                    echo "<a href=?tid='$row[t_id]'>$row[typename]</a></p>";
									
								
                                    echo "</td>";
                                }

                                echo "</tr>";

                            }
                        ?>

                        </table>
                            <center>
                                <?php
                                }
                                if (isset($_GET['srcbtn'])) {

                                    echo "<script>location.href='searchkeyword.php?srckword=$_GET[srckeyword]';</script>";        //

                                }
                                if (isset($_GET['tsrcbtn'])) {

                                    echo "<script>location.href='searchtitle.php?srctitle=$_GET[srctitle]';</script>";        //

                                }
                                ?>
                    
                </center>
            </div>

        </div>
			
	 <!--註腳-->
   <?php include 'footer.php';?>
    </div>
    
   
	


</div>
</body>


</html>