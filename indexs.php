<html>

<head>

    <title>首頁</title>

	<link href="csss_file/topic.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>-->
</head>

<body>

<!--最外圍-->
<div id="sitebody">

    <?php include 'header.php'; ?>

    <!--頁首-->
    <!--包住固定不動的Header-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <!--照片區-->

    <div id="photo">

        <div id="container">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="10000">
                <ol class="carousel-indicators">
                    <?php
                        $sql1 = "SELECT path1 FROM carousel ORDER BY listorder ";
                        $result1 = mysqli_query($db_link,$sql1);
                        $rowcount =  mysqli_num_rows($result1);
                        $i = 0;
                        foreach ($result1 as $row1)
                        {
							 if ($i == 0)
                            {
                    ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>" class="<?php $actives; ?>"></li>
                            <?php
                            }
                            else
                            {
                            ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>"></li>
                            <?php
                            }
                            $i++;
					    } ?>
                </ol>

                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($result1 as $row1)
                    {
                        if ($i == 0)
                        {
                            ?>
                            <div class="carousel-item active ">
                                <img src="<?php echo $row1[path1]; ?>" class="d-block w-100" height="500px" alt="...">
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="carousel-item ">
                                <img src="<?php echo $row1[path1]; ?>" class="d-block w-100" height="500px" alt="...">
                            </div>
                            <?php
                        }
                        $i++;
                    }
                    ?>

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
	<?php
	 mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");
	?>
    <div id="content">
	 <?php
          echo "</br>";
            ?>
       <?php $sqlslo = "SELECT * FROM slogan where `sloganid`= '1'";
                $resultslo= mysqli_query($db_link,$sqlslo);
      
				while($rowsl = mysqli_fetch_assoc($resultslo))
				{
					echo "<center> <font color=#612E04><h2>$rowsl[slogantext]<h2></font></center><p>";
				}
					?>
		 <div class="newstitle">
            <h2>｜最新公告 </h2>
        </div>
        <div class="tablelist">

            <?php
            //...
            $sql = "SELECT * FROM posts where  old='0' && keep='0'|| top='1'  order by `top` DESC, `date` ASC ";
            $result = mysqli_query($db_link, $sql);
			
            ?>
            <center>
                <div class="contentlist" align="center">
				<div class="tableforcontent" align="center">
                    
                        <table width="60%" style="border:3px #000000  solid;" >
                            <tr height="40px" style="font-weight:bold;font-size:20px" bgcolor="#bfbfbf" align="center">
                                <th width="30%">發佈日期</th>
                                <th width="70%">標題內文</th>
                            </tr>
							
                            <?php
                            while ($row = $result->fetch_assoc()) {
									$date1 = strtotime($getDate);
									$date2 = strtotime($row[date]);
									$days = (($date1 - $date2)/86400);
									
								if($getDate>=$row[newday]){
									$sqlii="update `posts` set old='1'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlii);
									
									
								}
                                echo "<tr>";
							if($row['top']=='1'){
								echo "<td height='65' align='center' style='height:60px; vertical-align:middle;'><i class='fas fa-thumbtack'></i>&nbsp&nbsp$row[date]</td>";
							}else{
								 echo "<td height='65' align='center' style='height:60px; vertical-align:middle;'>&emsp; $row[date]</td>";
							}
                               
                                echo "<td align='center' style='vertical-align:middle;'><a href = 'post.php?id=$row[p_id]'>$row[title]</a></td>";
								
                                echo "</tr>";
                            }
                            echo "</table>";

                            mysqli_close($db_link);
                            ?>

                   
            </center>

        </div>
    </div>
</div>



<!--註腳-->


</div>
<?php include 'footer.php'; ?>
</div>
</body>


</html>