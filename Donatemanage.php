<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>新增捐獻 | 管理後台</title>

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
<form name="formsearchdoante" method="post" action="">
<div id="wrapper">
    <?php include 'admin.php';?>
	<?php include 'database.php';?>

    <!--建立新經文-->
    <div class="row" style="margin-bottom: 20px; text-align: left">
        <div class="col-lg-12">
		<input type="text" name="sdonatemember" Placeholder="輸入姓名或編號">
           <input type="submit" name="gosearchm" class="btn btn-success  " value="搜尋" style="left">
		   
		  
        </div>
    </div>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/
                $db_ip="127.0.0.1";
                $db_user="root";
                $db_pwd="123456789";
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
                session_start();
				

                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                $sql_mid = "SELECT * FROM `members` ";
                $result= mysqli_query($db_link,$sql_mid);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table border=1 width=100% style=font-size:20px;>";
                echo "<tr align=center>";
                 echo "<td>會員編號</td>";
                echo "<td>會員姓名</td>";
                echo "<td>會員信箱</td>";
                echo "<td>會員電話</td>";
                echo "<td></td>";
                echo "</tr>";
				if (isset($_POST["gosearchm"])) {
					$sqlnamesearch = "SELECT * FROM members WHERE name like '%$_POST[sdonatemember]%' || m_id like '%$_POST[sdonatemember]%'  ";
					$resultnamesearch= mysqli_query($db_link,$sqlnamesearch);
					
						 while($row=$resultnamesearch->fetch_assoc())
                {
                     echo "<tr align=center>";
					echo "<td>$row[m_id]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[email]</td>";
                    echo "<td>$row[telephone]</td>";
					 echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[m_id]+1' value='新增贊助'></td>";
                    ?>
					
					
                    
					<?php
				   echo "</tr>";
                }
					
					
				}else{
					
                while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
					echo "<td>$row[m_id]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[email]</td>";
                    echo "<td>$row[telephone]</td>";
					 echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[m_id]+1' value='新增贊助'></td>";
                    ?>
					
                    
					<?php
				   echo "</tr>";
                }
				}
                echo "</table>";
               


                //$sql2="SELECT s_id,typename,number,title,date FROM scripture,types WHERE scripture.t_id = types.t_id";
                $sql2 = "SELECT * FROM `members`";
                $result2=mysqli_query($db_link,$sql2);

                while($row2=$result2->fetch_assoc()) {
                    if (isset($_POST["$row2[m_id]+1"])) {
                        $_SESSION["edit_m_id"]=$row2["m_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'DonatemanageEdit.php'";
                        echo "</script>";
                    }

                    /*if (isset($_POST["$row2[s_id]+2"])) {

                        $_SESSION["delete_s_id"]=$row2["s_id"];
                        $sql_delete="DELETE FROM scripture WHERE scripture.s_id = $_SESSION[delete_s_id]";
                        mysqli_query($db_link, $sql_delete);
                        $filename = $row2["filename"];//刪除檔案
                        unlink($filename);
                        echo "<script>alert('成功刪除!');location.href='AdminScriptureManage.php'</script>";

                    }*/
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
