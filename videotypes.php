<html>
<head>

    <title>漢修學苑-法音流佈</title>
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
                         if (isset($_GET["tid"]))
                         {
                         $tid = $_GET["tid"];
                         $sqltype = "SELECT * FROM `videotypes` where `t_id` = $tid ";
                         $resulttype = mysqli_query($db_link, $sqltype);
                         $rtypename = mysqli_fetch_row($resulttype);
                         $_SESSION['rtypename'] = $rtypename[1];
                         ?>
                        <br>
                        <h2>｜<?php echo "$rtypename[1]" ?>  </h2>
                              </div> 					
                    <center>
                  
                   
                    <?php
                       $sqlatcnum = "SELECT * FROM `videos` where `t_id` = $tid  ";
                       $result_row = mysqli_query($db_link, $sqlatcnum);
                       $data = mysqli_num_rows($result_row);       //抓總共幾筆
                       $per = 10;
                       $rows = ceil($data / $per);
                       $resultnum = mysqli_query($db_link, $sqlatcnum);
                       $sqlvideos = "SELECT * FROM `videos` where `t_id` = $tid order by listorder";
                       $resultvideos = mysqli_query($db_link, $sqlvideos);
                       echo "<form name='form1' method='POST' action=''>";
                       echo "<table class='videotable'>";
                       if(isMobileCheck()){
                        while ($videos = mysqli_fetch_assoc($resultvideos)) {
                           
                           
                            echo "<tr >";
                            echo "<td class='picture' ><iframe width=324 height=200 src=$videos[vnet] frameborder=0 allow=accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe></td>";
                            echo "</tr>";
                           
                            echo "<tr >";
                            echo "<td ><h6>影片描述:</h6>$videos[vcontent]</td>";
                            echo "</tr>";
                           
                           
                        }
                       }else{
                        while ($videos = mysqli_fetch_assoc($resultvideos)) {
                            
                            echo "<tr >";
                            echo "<td class='picture'><iframe width=324 height=200 src=$videos[vnet] frameborder=0 allow=accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe></td>";
                            echo "<td ><h6>影片描述:</h6>$videos[vcontent]</td>";
                            echo "</tr>";
                           
                            
                        }
                       
                       }

                        }else                                            //還沒選類別時
                        {
                        ?>
                        
                        <br>
                        <h2>｜影音類別 </h2>
                        </div>
                        


                        <center>

                     
                            <table class="videotypetable" >
                            
                                <?php
                                if(isMobileCheck()){
                                    
                                    $sqlatypecnum = "SELECT * FROM `videotypes` order by listorder";
        
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
        
        
                                    $per = 10;
                                    $rows = ceil($datas / $per);
        
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                        echo "<th>內容</th>";
                                        echo "<th>地點</th>";
                                        echo "<th>集數</th>";
                                        
                                    for ($j = 1; $j <= $rows; $j++) {
                                        $start = ($j - 1) * 10;
                                        $sqlatcnums10 = "SELECT * FROM videotypes order by listorder Limit $start , $per";
                                        $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                       
                                        while ($row = mysqli_fetch_assoc($resultnums10)) {
                                            echo "<tr>";
                                            echo "<td >";
                                            echo "<a href=?tid='$row[t_id]' title='$row[typename]'>$row[typename]</a>";
                                            echo "</td>";
                                            echo "<td >";
                                            echo "$row[local]";
                                            echo "</td>";
                                            $sqlcount="SELECT COUNT(*) as count FROM videos where typename = '$row[typename]' ";
                                            $countresult=mysqli_query($db_link,  $sqlcount);
                                            $countcheck=mysqli_fetch_assoc($countresult);
                                            $count_videos=$countcheck['count'];
                                            echo "<td >";
                                            echo "$count_videos";
                                            echo "</td>";
                                           
                                           
                                          
                                            echo "</tr>";
                                    
                                        }
        
                                      
                                    }
                                    ?>
                                   
                                    <?php
        
                                    
                                }else{
                                    $sqlatypecnum = "SELECT * FROM `videotypes` order by listorder";
        
                                    $results_row = mysqli_query($db_link, $sqlatypecnum);
                                    $datas = mysqli_num_rows($results_row);       //抓總共幾筆
        
        
                                    $per = 10;
                                    $rows = ceil($datas / $per);
        
                                    $resultsnum = mysqli_query($db_link, $sqlatypecnum);
                                        echo "<th>內容</th>";
                                        echo "<th>地點</th>";
                                        echo "<th>集數</th>";
                                        
                                    for ($j = 1; $j <= $rows; $j++) {
                                        $start = ($j - 1) * 10;
                                        $sqlatcnums10 = "SELECT * FROM videotypes order by listorder Limit $start , $per";
                                        $resultnums10 = mysqli_query($db_link, $sqlatcnums10);
                                       
                                        while ($row = mysqli_fetch_assoc($resultnums10)) {
                                            echo "<tr>";
                                            echo "<td >";
                                            echo "<a href=?tid='$row[t_id]' title='$row[typename]'>$row[typename]</a>";
                                            echo "</td>";
                                            echo "<td >";
                                            echo "$row[local]";
                                            echo "</td>";
                                            $sqlcount="SELECT COUNT(*) as count FROM videos where typename = '$row[typename]' ";
                                            $countresult=mysqli_query($db_link,  $sqlcount);
                                            $countcheck=mysqli_fetch_assoc($countresult);
                                            $count_videos=$countcheck['count'];
                                            echo "<td >";
                                            echo "$count_videos";
                                            echo "</td>";
                                           
                                           
                                          
                                            echo "</tr>";
                                    
                                        }
        
                                      
                                    }
                                    ?>
                                   
                                    <?php
                                    
                            }
                            }
                            
                                ?>  
                         </table>
                           

                       
            </div><!--CONTENTFORTABLE-->
			
	 <!--註腳-->
  
    </div><!--CONTENT-->
    
	
    
   

</div>
<?php include 'footer.php';?>
</body>


</html>