<html>
<head>
    <title>漢修學苑-瑜論講記</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="csss_file/RWDforarticle.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
    <?php include 'header.php';

    # 設定時區
    date_default_timezone_set('Asia/Taipei');
    $getDate= date("Y-m-d");
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>


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
                            
                                if (isset($_GET["tid"]))
                                {
                                $tid = $_GET["tid"];
                                $sqltype = "SELECT * FROM `types` where `t_id` = $tid";
                                $resulttype = mysqli_query($db_link, $sqltype);
                                $rtypename = mysqli_fetch_row($resulttype);
                                $_SESSION['rtypename']=$rtypename[1];
                                ?>
                                <br>
                                <h2>｜<?php echo "$rtypename[2]" ?></h2>
				                </div> 

                <center>
                    <table>
                        
                        <?php

                      
                       
                        if(isMobileCheck()){
                            $sqlatcnum = "SELECT * FROM `scripture` where  `save`='0' && `t_id` = $tid ";

                            $result_row = mysqli_query($db_link, $sqlatcnum);
                            $data = mysqli_num_rows($result_row);       //抓總共幾筆
                            //是行動裝置
                            $per=3;
                            $rows=ceil($data/$per);
    
                            $resultnum = mysqli_query($db_link, $sqlatcnum);
    
                            for($i=1;$i<=$rows;$i++)
                                {
                                    $start=($i-1)*3;
                                    $sqlatcnum10 = "SELECT * FROM `scripture` where  `save`='0' &&`t_id` = $tid order by CAST(`number` AS UNSIGNED) ASC Limit  $start  , $per";
                                    $resultnum10 = mysqli_query($db_link, $sqlatcnum10);
                                    echo "<tr >";
                                    while ($script = mysqli_fetch_assoc($resultnum10)) {
                                        echo "<td>";
                                       
                                        echo "<a href=article.php?sid='$script[s_id]' title='$script[number]'>$script[number]</a></p>";
                                      
                                        
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                        }else {
                            $sqlatcnum = "SELECT * FROM `scripture` where  `save`='0' && `t_id` = $tid ";

                            $result_row = mysqli_query($db_link, $sqlatcnum);
                            $data = mysqli_num_rows($result_row);       //抓總共幾筆
                            $per=10;
                            $rows=ceil($data/$per);
    
                            $resultnum = mysqli_query($db_link, $sqlatcnum);
    
                            for($i=1;$i<=$rows;$i++)
                                { 
                                    $start=($i-1)*10;
                                    $sqlatcnum10 = "SELECT * FROM `scripture` where  `save`='0' &&`t_id` = $tid order by CAST(`number` AS UNSIGNED) ASC Limit  $start  , $per";
                                    $resultnum10 = mysqli_query($db_link, $sqlatcnum10);
                                    echo "<tr >";
                                    while ($script = mysqli_fetch_assoc($resultnum10)) {
                                        echo "<td>";
                                        echo "<a href=article.php?sid='$script[s_id]' title='$script[number]'>$script[number]</a></p>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                        }
                        echo "</table>";
                        echo "</center>";
                        }
                        else                                            //還沒選類別時
                        {
                           
                        ?>
                        
                         
                           <br>  
                         <h2>｜講記類別</h2>
                                <div class="search">
                                    <form name="src" method="GET" action="">
                                        查詢講記標題：<input type="text" name="srctitle" id="srctitle" Placeholder="輸入講記標題">
                                        <input type='submit' name='tsrcbtn' value='搜尋'>
                                        <br>
                                        查詢講記內容：<input type="text" name="srckeyword" id="srckeyword" Placeholder="輸入關鍵字">
                                        <input type='submit' name='srcbtn' value='搜尋'>
                                        <br>
                                        <font color="black">請點擊搜尋鍵進行搜尋，勿按Enter</font>　　　　
                                        <br><br>
                                    </form>
                                </div>
                        <center>

                           <table>
                                <br>
                                <?php
                                if(isMobileCheck()){
                                    $sqlatypecnum = "SELECT * FROM `types` order by listorder";
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                    $per=3;
                                    $rows=ceil($datas/$per);
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                    
                                    $sqlscr="SELECT * FROM `scr_show` ";
                                    $result=mysqli_query($db_link,$sqlscr);
                                    $rowscr=mysqli_fetch_assoc($result);
                                    if($rowscr['shownumber'] == '0')
                                    {  
                                    echo "<center> <font color=#612E04><h1>※網頁尚在構置中※<h1></font></center>";
                                     }                            
                                    else{
                                    for($j=1;$j<=$rows;$j++)
                                        {
                                            $start=($j-1)*3;
                                            $sqlatcnums10 = "SELECT * FROM types order by listorder Limit $start , $per";
                                            $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                            echo "<tr >";
                                            while ($row = mysqli_fetch_assoc($resultnums10)) {
                                                echo "<td >";
                                                echo "<a href=?tid='$row[t_id]' title='$row[typename]'>$row[typename]</a></p>";
                                                echo "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    }
                                }else {
                                    $sqlatypecnum = "SELECT * FROM `types` order by listorder";
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
                                    $per=10;
                                    $rows=ceil($datas/$per);
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                    $sqlscr="SELECT * FROM `scr_show` ";
                                    $result=mysqli_query($db_link,$sqlscr);
                                    $rowscr=mysqli_fetch_assoc($result);
                                    if($_SESSION['authority']=='1' || $_SESSION['authority']=='2') //還未編輯之處理
                                    {
                                        for($j=1;$j<=$rows;$j++)
                                        {
                                            $start=($j-1)*10;
                                            $sqlatcnums10 = "SELECT * FROM types order by listorder Limit $start , $per";
                                            $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                            echo "<tr>";
                                            while ($row = mysqli_fetch_assoc($resultnums10)) {
                                                echo "<td>";
                                                echo "<a href=?tid='$row[t_id]' title='$row[typename]'`>$row[typename]</a></p>";
                                                echo "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    }else
                                    {
                                        if($rowscr['shownumber'] == '0')
                                        {  
                                        echo "<center> <font color=#612E04><h1>※網頁尚在構置中※<h1></font></center>";
                                         }                            
                                        else
                                         {
                                          for($j=1;$j<=$rows;$j++)
                                            {
                                            $start=($j-1)*10;
                                            $sqlatcnums10 = "SELECT * FROM types order by listorder Limit $start , $per";
                                            $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                            echo "<tr>";
                                            while ($row = mysqli_fetch_assoc($resultnums10)) {
                                                echo "<td>";
                                                echo "<a href=?tid='$row[t_id]' title='$row[typename]'`>$row[typename]</a></p>";
                                                echo "</td>";
                                             }
                                             echo "</tr>";
                                            }
                                        }
                                    }
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
        </div><!--CONTENTFORTABLE-->
			
	 <!--註腳-->
  
    </div><!--CONTENT-->
</div>
<?php include 'footer.php';?>
</body>
</html>