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

<?php

session_start();
?>
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
            
                <?php

                
                $sql="SELECT * FROM `donates` where `m_id` ='$_SESSION[m_id]'  && `type`='金錢' order by `date` DESC";
                $result= mysqli_query($db_link,$sql);

                ?>

				 <div class="contentlist" align="left">
                     <h2>｜捐獻內容</h2>
                <div class="tableforcontent">
				<div class="table" align="center">
                <table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all" cellpadding='5'; >
                    <tr align="center">
                       
						
                        <td width="25%" align="center" align="center">捐獻內容</td>
						 <td width="25%" align="center" align="center">捐獻數量</td>
						 <td width="20%" size="30px" height="26"  align="center">捐獻日期</td>

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
					echo "<td height='65' align='center' style='height:60px'>$row[date]</td>";
 
					
					echo "</tr>";
					
                }
				
					
						
                echo "</table>";
				echo "<font size=+3><b>金錢捐獻總和:";
				echo "$x</b></font>";
				$sql5="SELECT * FROM `donates` where `m_id` ='$_SESSION[m_id]'  && `type`='物資' order by `date` DESC";
                $result5= mysqli_query($db_link,$sql5);

                ?>

				
 
          
				<table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all" cellpadding='5'; >
                    <tr align="center">
                       
						
                        <td width="25%" align="center" align="center">捐獻內容</td>
						 <td width="25%" align="center" align="center">捐獻數量</td>
						 <td width="20%" size="30px" height="26"  align="center">捐獻日期</td>

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
					echo "<td height='65' align='center' style='height:60px'>$row5[date]</td>";
 
					
					echo "</tr>";
					
                }
				
					
						
                echo "</table>";
				echo "<font size=+3><b>物資捐獻總和:";
				echo "$z</b></font>";
					
				
                mysqli_close($db_link);
                ?>

                </div>
            </div>

        </div>


    </div>
   
    <!--註腳-->
   <?php include 'footer.php';?>


</div>

</body>


</html>