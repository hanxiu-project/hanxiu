<html>
<head>

    <title>漢修學苑-補充資料</title>
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
      </script>
    <!--主內文區-->
         <div class="content">
            <div class="tableforcontent">
                     
                                <div class="newstitle">
                                <?php
                        if (isset($_GET["sptid"]))
                        {
                        $sptid = $_GET["sptid"];
                        $sqltype = "SELECT * FROM `spm_types` where `spt_id` = $sptid";
                        $resulttype = mysqli_query($db_link, $sqltype);
                        $rtypename = mysqli_fetch_row($resulttype);
                        $_SESSION['rtypename']=$rtypename[1];
                        ?>
                        <br>
                        <h2>｜<?php echo "$rtypename[1]" ?>  </h2>
                              </div> 					
                 
                   
                    <?php
                     if(isMobileCheck()){
                         
                        $sqlatcnum = "SELECT * FROM `supplements` where  `save`='0' && `spt_id` = $sptid ";
                        $result_row = mysqli_query($db_link, $sqlatcnum);
                        $data = mysqli_num_rows($result_row);       //抓總共幾筆
                        $per=10;
                        $pages=ceil($data/$per);
						$k = $pages;
						if (!isset($_GET["page"])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET["page"]);
                        }

                        $resultnum = mysqli_query($db_link, $sqlatcnum);
						$start=($page-1)*$per;
						$sqlatcnum10 = "SELECT * FROM `supplements` where  `save`='0' &&`spt_id` = $sptid order by `sp_id` DESC Limit  $start  , $per";
						$resultnum10[$start] = mysqli_query($db_link, $sqlatcnum10);
						$resultnum10[$page] = mysqli_query($db_link, $sqlatcnum10);
                        ?>
                           <center>
                    <table class="sup" >
					<tr  bgcolor="#bfbfbf" style="font-weight:bold;font-size:20px"   >
						
						<th>標題名稱</th>
                        <th>發佈日期</th>
						
					</tr>
                        <?php
                            
                        while ($supplement = mysqli_fetch_assoc($resultnum10[$start])) {
                            echo "<tr >";
                         
                            echo "<td>";
                            echo "<a href=supplement.php?spid='$supplement[sp_id]' title='$supplement[title]'>$supplement[title]</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "$supplement[date]";
                            echo "</td>";
                            echo "</tr >";
                        }

                        


                    }else{
                        $sqlatcnum = "SELECT * FROM `supplements` where  `save`='0' && `spt_id` = $sptid ";
                        $result_row = mysqli_query($db_link, $sqlatcnum);
                        $data = mysqli_num_rows($result_row);       //抓總共幾筆
                        $per=10;
                        $pages=ceil($data/$per);
						$k = $pages;
						if (!isset($_GET["page"])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET["page"]);
                        }

                        $resultnum = mysqli_query($db_link, $sqlatcnum);
						$start=($page-1)*$per;
						$sqlatcnum10 = "SELECT * FROM `supplements` where  `save`='0' &&`spt_id` = $sptid order by `sp_id` DESC Limit  $start  , $per";
						$resultnum10[$start] = mysqli_query($db_link, $sqlatcnum10);
						$resultnum10[$page] = mysqli_query($db_link, $sqlatcnum10);
                        ?>
                        <center>
                 <table class="sup" >
                 <tr  bgcolor="#bfbfbf" style="font-weight:bold;font-size:20px"   >
                     <th>補充資料類別名稱</th>
                     <th>標題名稱</th>
                     <th>發佈日期</th>
                     
                 </tr>
                     <?php
                            
                        while ($supplement = mysqli_fetch_assoc($resultnum10[$start])) {
                            echo "<tr >";
                            echo "<td>";
                            echo "$supplement[spmtypename]";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href=supplement.php?spid='$supplement[sp_id]' title='$supplement[title]'>$supplement[title]</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "$supplement[date]";
                            echo "</td>";
                            echo "</tr >";
                        }
                    }
					?>
                       

                       </table>
						<div class="page">
                        <?php
                        echo '共 ' . $data . ' 筆-在第' . $page . ' 頁-共 ' . $pages . ' 頁';
                        echo "<br/><a href=?sptid=$sptid&page=1>首頁</a> ";
                        echo "第 ";
                        for ($i = 1; $i <= $pages; $i++) {
                            if ($page - $k < $i && $i < $page + $k) {
                                echo "<a href=?sptid=$sptid&page=$i>" . $i . "</a> ";
                            }
                        }
                        echo " 頁 <a href=?sptid=$sptid&page=$pages>末頁</a>";
                        echo "</center>";   
                        ?>
                       </div>
                        <?php
							}
                        else                                            //還沒選類別時
                        {
                        ?>
                        
                        <br>
                        <h2>｜補充資料類別 </h2>
                        </div>
                        <center>
                            <table>
                            
                                <?php
                                if(isMobileCheck()){
                                    $sqlatypecnum = "SELECT * FROM `spm_types` order by listorder";
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                    $per=1;
                                    $rows=ceil($datas/$per);
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                    for($j=1;$j<=$rows;$j++)
                                    {
                                        $start=($j-1)*1;
                                        $sqlatcnums10 = "SELECT * FROM spm_types  order by listorder Limit $start , $per";
                                        $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                        echo "<tr>";
                                        while ($row = mysqli_fetch_assoc($resultnums10)) {
                                            echo "<td>";
                                            echo "<a href=?sptid='$row[spt_id]' title='$row[spmtypename]'>$row[spmtypename]</a></p>";
    
    
                                            echo "</td>";
                                        }
    
                                        echo "</tr>";
    
                                    }
                                }else{
                                    $sqlatypecnum = "SELECT * FROM `spm_types` order by listorder";
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                    $per=10;
                                    $rows=ceil($datas/$per);
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                    for($j=1;$j<=$rows;$j++)
                                    {
                                        $start=($j-1)*10;
                                        $sqlatcnums10 = "SELECT * FROM spm_types order by listorder  Limit $start , $per";
                                        $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                        echo "<tr>";
                                        while ($row = mysqli_fetch_assoc($resultnums10)) {
                                            echo "<td>";
                                            echo "<a href=?sptid='$row[spt_id]' title='$row[spmtypename]'>$row[spmtypename]</a></p>";
    
    
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