<html>
<head>

    <title>科判</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="csss_file/RWDforarticle.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
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
<div class="sitebody">


    <!--頁首-->
    <!--包住固定不動的Header-->
    <?php include 'header.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <!--照片區-->


    

                        <?php
                    //是否為行動裝置
                    function isMobileCheck(){
                        //Detect special conditions devices
                        $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
                        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
                        $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
                        if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
                            $Android = true;
                        }else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
                            $Android = false;
                            $AndroidTablet = true;
                        }else{
                            $Android = false;
                            $AndroidTablet = false;
                        }
                        $webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
                        $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
                        $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
                        //do something with this information
                        if( $iPod || $iPhone || $iPad || $Android || $AndroidTablet || $webOS || $BlackBerry || $RimTablet){
                            return true;
                        }else{
                            return false;
                        }
                    } 

                        ?>


    
 
    <script type="text/javascript">

      <?php
      $screenwidth.="<script language=/'javascript/'>";     
      $screenwidth.="document.write(window.screen.width);";      
      $screenwidth.="</script>";  

      ?>  
      </script>
    <!--主內文區-->
         <div class="content">
            <div class="tableforcontent">
                     
                                <div class="newstitle">
                                                <?php
                            if (isset($_GET["kptid"]))
                            {
                            $kptid = $_GET["kptid"];
                            $sqltype = "SELECT * FROM `kp_types` where `kpt_id` = $kptid";
                            $resulttype = mysqli_query($db_link, $sqltype);
                            $rtypename = mysqli_fetch_row($resulttype);
                            $_SESSION['rtypename'] = $rtypename[1];
                            ?>
                            <br>
                            <h2>｜<?php echo "$rtypename[1]" ?>  </h2>
                              </div> 					
                    <center>
                    <table class="kepan">
                        <?php

                        $sqlatcnum = "SELECT * FROM `kepans` where `kpt_id` = $kptid ";
                        $result_row = mysqli_query($db_link, $sqlatcnum);
                        $data = mysqli_num_rows($result_row);       //抓總共幾筆
                        $per = 5;
                        $pages = ceil($data / $per);     //pages
                        $k = $pages;
                        if (!isset($_GET["page"])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET["page"]);
                        }
                        $start = ($page - 1) * $per;
                        $resultnum = mysqli_query($db_link, $sqlatcnum);
                        $sqlatcnum10 = "SELECT * FROM `kepans` where `kpt_id` = $kptid  Limit $start  , $per";
                        $resultnum10[$start] = mysqli_query($db_link, $sqlatcnum10);
                        $resultnum10[$page] = mysqli_query($db_link, $sqlatcnum10);
                        while ($kepan = mysqli_fetch_assoc($resultnum10[$start])) {
                            echo "<tr>";
                            echo "<td >";
                            echo "<a href='download.php?filename=./kepan/$kepan[kptypename]/$kepan[filename]' title='$kepan[filename]'>$kepan[filename]</a></p>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                     </table> 
                     <div class="page">
                        <?php
                        echo '共 ' . $data . ' 筆-在 ' . $page . ' 頁-共 ' . $pages . ' 頁';
                        echo "<br/><a href=?kptid=$kptid&page=1>首頁</a> ";
                        echo "第 ";
                        for ($i = 1; $i <= $pages; $i++) {
                            if ($page - $k < $i && $i < $page + $k) {
                                echo "<a href=?kptid=$kptid&page=$i>" . $i . "</a> ";
                            }
                        }
                        echo " 頁 <a href=?kptid=$kptid&page=$pages>末頁</a>";
                        echo "</center>";   
                        ?>
                       </div>

                        <?php                    
                    }
                        else                                            //還沒選類別時
                        {                     
                        ?>     
                        <br>
                        <h2>｜科判類別 </h2>                                  
                            <table>
                            <br><br>
                                <?php
                                 if(isMobileCheck()){
                                     
                                $sqlkptypecnum = "SELECT * FROM `kp_types` order by listorder";
                                $results_row = mysqli_query($db_link, $sqlkptypecnum);
                                $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                $per = 3;
                                $rows = ceil($datas / $per);
                                $resultsnum = mysqli_query($db_link, $sqlkptypecnum);
                                for ($j = 1; $j <= $rows; $j++) {
                                    $start = ($j - 1) * 3;
                                    $sqlatcnums10 = "SELECT * FROM kp_types order by listorder Limit $start , $per";
                                    $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                    echo "<tr >";
                                    while ($row = mysqli_fetch_assoc($resultnums10)) {
                                        echo "<td >";
                                        echo "<a href=?kptid='$row[kpt_id]' title='$row[kptypename]'>$row[kptypename]</a></p>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                                 }else{                                  
                                $sqlkptypecnum = "SELECT * FROM `kp_types` order by listorder";
                                $results_row = mysqli_query($db_link, $sqlkptypecnum);
                                $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                $per = 5;
                                $rows = ceil($datas / $per);
                                $resultsnum = mysqli_query($db_link, $sqlkptypecnum);
                                for ($j = 1; $j <= $rows; $j++) {
                                    $start = ($j - 1) * 5;
                                    $sqlatcnums10 = "SELECT * FROM kp_types order by listorder Limit $start , $per";
                                    $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                    echo "<tr >";
                                    while ($row = mysqli_fetch_assoc($resultnums10)) {
                                        echo "<td >";
                                        echo "<a href=?kptid='$row[kpt_id]' title='$row[kptypename]'>$row[kptypename]</a></p>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                                 }

                            }
                                ?>  
                        </table>
                            <center>
                              
                    
                    </center>
                           

                       
            </div><!--CONTENTFORTABLE-->
			
	 <!--註腳-->
  
    </div><!--CONTENT-->

</div>
<?php include 'footer.php';?>
</body>


</html>