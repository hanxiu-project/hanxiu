<html>
<head>


    <title>查看捐獻</title>

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

                
                $sql="SELECT * FROM `donates` where `m_id` ='$_SESSION[m_id]'  && `type`='金錢' order by `date` DESC";
                $result= mysqli_query($db_link,$sql);

                ?>
                        <div class="newstitle">
                        <br>
                        <h2>｜捐獻內容</h2>
                              </div> 					
                    <center>
                    <table class="news">
                    
                            <tr height="40px" style="font-weight:bold;font-size:20px" bgcolor="#bfbfbf" align="center">
                            <td width="40%" align="center" align="center">捐獻內容</td>
						 <td width="40%" align="center" align="center">捐獻數量</td>
						 <td width="20%">捐獻日期</td>
                            </tr>
                            <?php
				$que3="select sum(amount) as 總和 FROM `donates` where `m_id` ='$_SESSION[m_id]' && `type`='金錢'";

					$check=mysqli_query($db_link,$que3);

						while($show=$check->fetch_assoc()){
							$x=0;
							$x=$x+$show["總和"];
							
						}
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td align='center'>$row[type]</td>";
					echo "<td align='center'>$row[amount]</td>";
					echo "<td>$row[date]</td>";
					echo "</tr>";
					
                }
                echo "</table>";
                ?>
                <div class="total">
                <?php
				echo "<font size=+3><b>金錢捐獻總和:";
				echo "$x</b></font>";
                ?>
                </div>
                <?php
				$sql5="SELECT * FROM `donates` where `m_id` ='$_SESSION[m_id]'  && `type`='物資' order by `date` DESC";
                $result5= mysqli_query($db_link,$sql5);

                ?>

                <table class="news">
                <tr height="40px" style="font-weight:bold;font-size:20px" bgcolor="#bfbfbf" align="center">
                <td width="25%" align="center" align="center">捐獻內容</td>
						 <td width="25%" align="center" align="center">捐獻數量</td>
						 <td width="20%"   align="center">捐獻日期</td>

                            </tr>   
                            <?php
				$que5="select sum(amount) as 總和 FROM `donates` where `m_id` ='$_SESSION[m_id]' && `type`='物資'";

					$check5=mysqli_query($db_link,$que5);

						while($show5=$check5->fetch_assoc()){
							$z=0;
							$z=$z+$show5["總和"];
							
						}
                while($row5=$result5->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td align='center'>$row5[type]</td>";
					echo "<td align='center'>$row5[amount]</td>";
					echo "<td>$row5[date]</td>";
					echo "</tr>";
                }

                echo "</table>";
                ?>
                <div class="total">
                <?php
				echo "<font size=+3><b>物資捐獻總和:";
				echo "$z</b></font>";
				?>
                </div>
                <?php
				
                mysqli_close($db_link);
                ?>
                </div>

            </div><!--CONTENTFORTABLE-->
			
	 <!--註腳-->
  
    </div><!--CONTENT-->

</div>
<?php include 'footer.php';?>
</body>


</html>