<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>編輯講記是否顯示 | 管理後台</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
<?php
session_start();
include 'verification.php';
?>
<form name="forms" method="post" action="">

<div id="wrapper">
    <?php include 'nav.php';?>
    <?php include 'database.php';?>

	<?php 
			 /*資料庫連結*/
              
				$sqlmember="SELECT * FROM members where m_id= $_SESSION[m_id] ";
                $resultmanager=mysqli_query($db_link,$sqlmember);
				$rowmanager = mysqli_fetch_assoc($resultmanager);	
				
			?>   
    <!--建立新公告-->
   <div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >講記顯示管理</strong></font>
		
        </div>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php

                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                $sql = "SELECT * FROM members where authority = 1";
                $result= mysqli_query($db_link,$sql);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table border=1   width=100% style=font-size:22px;line-height:50px; >";
				 echo "<tr align=left>";
				 
				 echo "</tr>";
                echo "<tr align=center>";
				
				 echo "<td>編輯是否在前台講記頁面顯示講記</td>";
                 echo "</tr>";
                 echo "<td>";
                ?>
				 <div class="form-group">
                     <center>
					<input type="submit" class="btn btn-success" name="show" value="顯示在前台" >
                    <input type="submit" class="btn btn-success" name="noshow" value="不顯示在前台" >
                    </center>
                 </div>
				<?php			
                echo "</tr>";
                echo "</form>";
                echo "</table>";

                
                $sql="SELECT * FROM `scr_show` ";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

              

                if(isset($_POST["show"]))
                {
                    if($row['show_id'] == null)
                    {
                       $sql="INSERT INTO `scr_show` (shownumber) values ('1') ";
                       mysqli_query($db_link, $sql);
                       echo "<script>alert('講記已經在前台顯示!');location.href='AdminScriptureManage.php'</script>";
                    }
                    else
                    {
                    $sqliit="UPDATE `scr_show` set `shownumber`='1'";
                    mysqli_query($db_link, $sqliit);
                    echo "<script>alert('講記已經在前台顯示!');location.href='AdminScriptureManage.php'</script>";
                    }  
                }
                 if(isset($_POST["noshow"]))
                 {
                     if($row['show_id'] == null)
                     {
                        $sql="INSERT INTO `scr_show` (shownumber) values ('0') ";
                        mysqli_query($db_link, $sql);
                        echo "<script>alert('講記已經在前台隱藏!');location.href='AdminScriptureManage.php'</script>";
                     }
                     else
                     {
                     $sqliit="UPDATE `scr_show` set `shownumber`='0' ";
                     mysqli_query($db_link, $sqliit);
                     echo "<script>alert('講記已經在前台隱藏!');location.href='AdminScriptureManage.php'</script>";
                    }
                }
                

                mysqli_close($db_link);
                ?>

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
</body>

</html>