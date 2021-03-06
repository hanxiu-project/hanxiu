<html>

<head>

    <title>首頁</title>


	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="csss_file/topic.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>-->
</head>

<body>




<!--最外圍-->
<div id="sitebody">

<?php include 'header.php';?>

    <!--頁首-->
    <!--包住固定不動的Header-->


	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--照片區-->

    <div id="photo">

        <div id="container">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $sql1 = "SELECT * FROM carousel";
                        $result1 = mysqli_query($db_link,$sql1);
                        $rowcount =  mysqli_num_rows($result1);
                        $i = 0;
                        foreach ($result1 as $row1)
                        {
                            $actives = '';
                            if ($i == 0)
                            {
                                $actives = 'active';
                            }
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>" class="<?php $actives; ?>"></li>
                    <?php $i++; } ?>
                </ol>

                <div class="carousel-inner">
                    <?php

                        for($i=0;$i<$rowcount;$i++)
                        {
                            $row1 = mysqli_fetch_assoc($result1);

                        if($i==0){

                        ?>
                    <div class="carousel-item active ">
                        <img src="<圖6.jpg>" class="d-block w-100" height="500px" alt="...">
                    </div>
                    <?php }else{
                            ?>
                    <div class="carousel-item">
                        <img src="圖6.jpg" class="d-block w-100" alt="..."  height="500px">
                    </div>
                    <?php }?>
                    <?php } ?>


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
                //...
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
   <?php include 'footer.php';?>


</div>

</body>


</html>