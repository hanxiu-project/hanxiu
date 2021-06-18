<html>
<head>

    <title>錯誤回報</title>
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
            <?php
    $sql_search_member = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
    $resultsrchmember = mysqli_query($db_link, $sql_search_member);
    $rows = mysqli_fetch_assoc($resultsrchmember);
    $m_id = $rows["m_id"];


    $sql_allmsg="SELECT * FROM `comments` where `comments`.`m_id` = '$m_id' order by `msg_datetime` DESC";
    $result_allmsg=mysqli_query($db_link,$sql_allmsg);
    $result_allmsg1=mysqli_query($db_link,$sql_allmsg);
    ?>
           
                        <div class="newstitle">
                        <br>
                        <h2>｜我的歷史留言</h2>
                          </div> 
                <?php
                if(!isset($_GET[ccid]))
            {
            ?>

                    <center>
                        <div class="mycommenttable" >
                            
                        
                            

                            <?php

                            while($allmsg=mysqli_fetch_assoc($result_allmsg))
                            {
                                $c_id=$allmsg['c_id'];
                                $m_id2=$allmsg['m_id'];
                                $msg=$allmsg['message'];
                                $time=$allmsg['msg_datetime'];

                                ?>

                                    <div style='border:1px solid;'>
                                        <div align="left"><?php echo $msg; ?></div>
                                        <div align='right'><?php echo $time; ?></div>
                                <?php
                                        echo "<div align='right'><a href=?ccid=$c_id>查看回覆</a> </div>";
                                ?>
                                    </div>
                                    <br>

                                <?php
                            }
                            ?>
                    </center>
                </div>


            <?php
            }
            elseif (isset($_GET[ccid]))          //按查看回覆
            {
            ?>

                    <center>
                    <div class="mycommenttable" >
                        <font size="6">留言回覆</font>
                        <br>

                        <?php

                        $sql_search_mbrcid = "SELECT * FROM `comments` WHERE `c_id` = '$_GET[ccid]'";
                        $resultsrchcommentdata = mysqli_query($db_link, $sql_search_mbrcid);
                        $rowq = mysqli_fetch_assoc($resultsrchcommentdata);
                        $msg2 = $rowq["message"];
                        $time2 = $rowq["msg_datetime"];
                        $reply = $rowq["reply"];
                        $rpy_time2 = $rowq["rpy_datetime"];


                        ?>

                        <div style='border:1px solid;'>
                        <div align="left"><b>我：</b><?php echo $msg2; ?></div>
                        <div align='right'><?php echo $time2; ?></div>
                        </div>
                            <br>

                            <div style='border:1px solid;'>
                                <div align="left"><b>管理員：</b><?php echo $reply; ?></div>
                                <div align='right'><?php echo $rpy_time2; ?></div>
                            </div>
                    </center>
                </div>

            <?php
            }
            ?>
            </div><!--CONTENTFORTABLE-->
			
	 <!--註腳-->
  
    </div><!--CONTENT-->

</div>
<?php include 'footer.php';?>
</body>


</html>