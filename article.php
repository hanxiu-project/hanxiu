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
           
                <?php

                if (isset($_GET["sid"]))                                                            //sid為經文id(同資料庫的s_id意思)
                {
                echo "<form method='POST' name='gggo'>";
                $sqltit = "Select * From `scripture` where `s_id`= $_GET[sid]";

                $tit = "";
                $resultshow[$tit] = mysqli_query($db_link, $sqltit);
                $rtit = mysqli_fetch_row($resultshow[$tit]);

                $sqltype = "SELECT s_id , scripture.typename , number , title , filename , date FROM `scripture` ,`types` WHERE `scripture`.`s_id`=$_GET[sid] AND `types`.`t_id`=$rtit[1]";
				
                $resulttype =mysqli_query($db_link, $sqltype);
                $type = mysqli_fetch_row($resulttype);
				$sql_count="update  scripture set clicktimes =clicktimes+1  WHERE scripture.s_id = $_GET[sid]";
				mysqli_query($db_link, $sql_count);
				
						$sqlcount = "SELECT * FROM scripture  WHERE scripture.s_id = $_GET[sid] ";
                        $resultcount = mysqli_query($db_link, $sqlcount);                                          
                        $rowcount = mysqli_fetch_assoc($resultcount);
                       
                ?>
				<div class="newstitle2" style="text-align:right;">
				<?php echo "瀏覽人次為 $rowcount[clicktimes]" ?>
				</div>

                <h3>｜<?php echo "$type[1] / $type[2]" ?></h3><br>
				
				</div>
				
				 <div class="contentlist" >
				 
                <div class="tableforcontent">

                   


                        <tr>
                            <td>
                                <?php
                                $_SESSION["tid"] = "$rtit[0]";


                                $filename = $rtit[5];
                                $str = "";
                                //判斷是否有該檔案
                                if (file_exists("C:/AppServ/www/漢修專題/ScriptureFile/$filename")) {
                                    $file = fopen("C:/AppServ/www/漢修專題/ScriptureFile/$filename", "r");
                                    if ($file != NULL) {
                                        //當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
                                        while (!feof($file)) {
                                            $str .= fgets($file);
                                        }
                                        fclose($file);
                                    }
                                }


                                }
                                echo "$str";


                                ?>


                            </td>
                        </tr>
                   


                
            </div>
			
			
		 
	</div>

   
   
	
    <!--註腳-->
    <?php include 'footer.php';?>

</div>
</div>

</body>


</html>