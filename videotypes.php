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
                <?php
                if (isset($_GET["tid"]))
                {
                $tid = $_GET["tid"];
                $sqltype = "SELECT * FROM `videotypes` where `t_id` = $tid";
                $resulttype = mysqli_query($db_link, $sqltype);
                $rtypename = mysqli_fetch_row($resulttype);
                $_SESSION['rtypename']=$rtypename[1];
                ?>
                <h2>｜<?php echo "$rtypename[1]" ?>  </h2>
                <center>
                    <table width="80%" border="1px">
                        <br>
                        <?php
                        $sqlatcnum = "SELECT * FROM `videos` where `t_id` = $tid";

                        $result_row = mysqli_query($db_link, $sqlatcnum);
                        $data = mysqli_num_rows($result_row);       //抓總共幾筆


                        $per=10;
                        $rows=ceil($data/$per);

                        $resultnum = mysqli_query($db_link, $sqlatcnum);



                        $sqlvideos = "SELECT * FROM `videos` where `t_id` = $tid";
                        $resultvideos= mysqli_query($db_link,$sqlvideos);
                        echo "<form name='form1' method='POST' action=''>";
                        echo "<table  width=1600 style=font-size:24px; >";
                        echo "<tr align=center>";
                        echo "<td></td>";
                        echo "</tr>";
                        while ($videos = mysqli_fetch_assoc($resultvideos))
                        {
                            echo "<tr align=center>";
                            echo "<td width=70%><iframe width=300 height=200 src=$videos[vnet] frameborder=0 allow=accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe></td>";
                            echo "<td width=30%>$videos[vcontent]</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        }
                        else                                            //還沒選類別時
                        {
                        ?>

                        <h2>｜影音類別 </h2>

                        <br><br>

                        <center>
                            <br>

                            <table width="80%" border="1px">
                                <br>
                                <?php
                                $sqlatypecnum = "SELECT * FROM `videotypes`";

                                $results_row = mysqli_query($db_link, $sqlatypecnum);
                                $datas = mysqli_num_rows($results_row);       //抓總共幾筆


                                $per=10;
                                $rows=ceil($datas/$per);

                                $resultsnum = mysqli_query($db_link, $sqlatypecnum);

                                for($j=1;$j<=$rows;$j++)
                                {
                                    $start=($j-1)*10;
                                    $sqlatcnums10 = "SELECT * FROM videotypes Limit $start , $per";
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

                                <?php
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