<html>
<head>

    <title>漢修學苑-錯誤回報</title>
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
if($_SESSION['acc']==null||$_SESSION['pwd']==null){
    echo "<script>alert('請先登入或註冊！');location.href='login.php'</script>";
}
?>

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
                        $sql = "SELECT * FROM members where account = '$_SESSION[acc]'";
                        $result = mysqli_query($db_link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="newstitle">
                        <br>
                <h2>｜留言區</h2>
                <div class="newstitle2" style="text-align:right;">
                <a href="mycomments.php">查看我的歷史留言</a>
              </div>
                </div> 
                <div class="commenttable">
                <center>
                    <br><br>
                    留言內容<br>
                    <form name="msg" method="post" action="comments.php">
                    <?php
                     if(isMobileCheck()){
                         ?>
                        <textarea  name="message" cols="30" rows="5" placeholder="輸入您的留言..."></textarea>
                        <?php
                     }else{
                         ?>
                        <textarea  name="message" cols="50" rows="5" placeholder="輸入您的留言..."></textarea>
                        <?php
                     }
                    ?>
                   
                   
                    <br>  
                    <?php
					$sqlslo2 = "SELECT * FROM slogan where `sloganid`= '2'";
                $resultslo2= mysqli_query($db_link,$sqlslo2);
				while($rowsl2 = mysqli_fetch_assoc($resultslo2))
                {
					echo "<center><font color=red>$rowsl2[slogantext]</center></font>";
				}
				?>
                    <br>
                        <input type="submit" name="send" value="送出">
                    </form>
   
                    </div>
                      
                    <?php
    $sql_search_member = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
    $resultsrchmember = mysqli_query($db_link, $sql_search_member);
    $rows = mysqli_fetch_assoc($resultsrchmember);
    $m_id = $rows["m_id"];

    if(isset($_POST["send"]))
    {
        $nowdate=date("Y-m-d H:i:s" , mktime(date('H'),date('i'),date('s'), date('m'), date('d'), date('Y')));
        if(strlen($_POST[message])<=0)
        {
            echo "<script>alert('請輸入留言內容！');location.href='comments.php'</script>";
        }
        else
        {
            $sql_msg="INSERT INTO `comments`(`m_id`,`message`,`msg_datetime`) VALUES ('$m_id','$_POST[message]','$nowdate')";
            mysqli_query($db_link, $sql_msg);
            echo "<script>alert('留言成功！');location.href='comments.php'</script>";
        }
    }
    ?>
            </div><!--CONTENTFORTABLE-->
	 <!--註腳-->
    </div><!--CONTENT-->
</div>
<?php include 'footer.php';?>
</body>

</html>