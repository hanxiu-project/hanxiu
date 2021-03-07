<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>會員管理-管理員 | 管理後台</title>

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

</head>

<body>
<form name="forms" method="post" action="">
<?php 
			 /*資料庫連結*/
              
				$sqlmember="SELECT * FROM members where m_id= $_SESSION[m_id] ";
                $resultmanager=mysqli_query($db_link,$sqlmember);
				$rowmanager = mysqli_fetch_assoc($resultmanager);	
				
			?>   
<div id="wrapper">
     <?php include 'admin.php';?>
	
    <!--建立新公告-->
   

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
               
                session_start();


                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                $sql = "SELECT * FROM members where authority = 1";
                $result= mysqli_query($db_link,$sql);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table  width=100% style=font-size:22px; >";
				 echo "<tr align=left>";
				 echo "<td>管理員</td>";
				 echo "</tr>";
                echo "<tr align=center>";
				
				 echo "<td>會員編號</td>";
                echo "<td>會員帳號</td>";
                echo "<td>會員姓名</td>";
				echo "<td>會員性別</td>";
				echo "<td>會員信箱</td>";
				echo "<td>會員地址</td>";
				echo "<td>會員行動</td>";
				
                echo "<td></td>";
                echo "</tr>";
				while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
					echo "<td>$row[m_id]</td>";
                    echo "<td>$row[account]</td>";
                    echo "<td>$row[name]</td>";
					echo "<td>$row[gender]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[address]</td>";
					echo "<td>$row[telephone]</td>";
                    ?>
					<?php
					if($rowmanager["authority"]==2){
						?>
					<td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[m_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這位管理員?')"></td>
					<td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[m_id]+3"; ?>" value='移權' onclick="return confirm('是否停權這位管理員?')"></td>
					<?php
					}
					
				   echo "</tr>";
                
                    
					
                }
				
				
				
				
				 echo "</table>";
					
					
					
			
				


                $sql2 = "SELECT * FROM members";
                $result2=mysqli_query($db_link,$sql2);

                while($row2=$result2->fetch_assoc()) {
                    if (isset($_POST["$row2[d_id]+1"])) {
                        $_SESSION["edit_d_id"]=$row2["d_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'AdminPostsEdit.php'";
                        echo "</script>";
                    }

                    if (isset($_POST["$row2[m_id]+2"])) {
                        $_SESSION["delete_m_id"]=$row2["m_id"];
                        $sql_delete="DELETE FROM members WHERE members.m_id = $_SESSION[delete_m_id]";
                        mysqli_query($db_link, $sql_delete);
                        echo "<script>alert('成功刪除!');location.href='MemberManage.php'</script>";
                    }
					if (isset($_POST["$row2[m_id]+3"])) {
                        $_SESSION["assign_m_id"]=$row2["m_id"];
                        $sql_assign="update  members set authority = 0 WHERE members.m_id = $_SESSION[assign_m_id]";
                        mysqli_query($db_link, $sql_assign);
                        echo "<script>alert('成功更改!');location.href='MemberManagefor1.php'</script>";
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