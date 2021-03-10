<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>暫存講記總覽 | 管理後台</title>

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
<div id="wrapper">
    <?php include 'admin.php';?>
	<?php
	/*資料庫連結*/
               
				$sqltype="SELECT * FROM types ";
                $resulttype=mysqli_query($db_link,$sqltype);
              
				 session_start();
	?>
    <!--建立新講記-->
    <div class="row" style="margin-bottom: 20px; text-align: left">
        <div class="col-lg-12">
           <a href="AdminScripturePost.php" class="btn btn-success  " style="left">建立新講記</a>
		   <a href="ScriptureManageNewType.php" class="btn btn-success  " style="left">建立新講記類別</a>
		  
		   <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:white">
		   <option>請選擇類別</option>
		   <option value="all">全選</option>
			<?php 
			
			while ($rowtype = $resulttype->fetch_assoc()) {
			echo "<option name=typeid value=$rowtype[typename]>$rowtype[typename]</option>";
												
			}?>               `
             </select> 
			 
             <input type="submit" class="btn btn-sm btn-warning" name="gotype" value="查看講記類別" >
            
			 
        </div>
		
    </div>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                
               


                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                $sql_tid = "SELECT * FROM scripture  where save='1' order by t_id";
                $result= mysqli_query($db_link,$sql_tid);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table  width=100% style=font-size:20px;>";
                echo "<tr align=center>";
                echo "<td>類別名稱</td>";
                echo "<td>卷號</td>";

                echo "<td>經文標題</td>";
                echo "<td>發佈日期</td>";

                echo "<td></td>";
                echo "</tr>";
				if (isset($_POST["gotype"])) {
					$sql_typesearch = "SELECT * FROM scripture WHERE  typename ='$_POST[type]' and save='1' order by t_id ";
					$resulttypesearch= mysqli_query($db_link,$sql_typesearch);
					if ($_POST[type]=="all"){
						 while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
                    echo "<td>$row[typename]</td>";
                    echo "<td>$row[number]</td>";
                    echo "<td>$row[title]</td>";
                    echo "<td>$row[date]</td>";
					echo "<td>$row[newupdate]</td>";
                    echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[s_id]+1' value='編輯'></td>";
                    
					 ?>
					<td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[s_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這篇講記?')"></td>
                    
					<?php
                    echo "</tr>";
                }
					}
					else{
						while($rowt=$resulttypesearch->fetch_assoc())
                {
                    echo "<tr align=center>";
                    echo "<td>$rowt[typename]</td>";
                    echo "<td>$rowt[number]</td>";
                    echo "<td>$rowt[title]</td>";
                    echo "<td>$rowt[date]</td>";
					echo "<td>$row[newupdate]</td>";
                    echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$rowt[s_id]+1' value='編輯'></td>";
                   
					 ?>
					<td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$rowt[s_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這篇講記?')"></td>
                    
					<?php
                    echo "</tr>";
                }}
					
					
                    }
					else{
                while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
                    echo "<td>$row[typename]</td>";
                    echo "<td>$row[number]</td>";
                    echo "<td>$row[title]</td>";
                    echo "<td>$row[date]</td>";
					echo "<td>$row[newupdate]</td>";
					 
                    echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[s_id]+1' value='編輯'></td>";
                    
					 ?>
					<td><input type='submit' class="btn btn-sm btn-danger " style='width:100px;height:30px;' name="<?php echo "$row[s_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這篇講記?')"></td>
                    
					<?php
                    echo "</tr>";
                }
				}

                echo "</table>";
					
                //$sql2="SELECT s_id,typename,number,title,date FROM scripture,types WHERE scripture.t_id = types.t_id";
                $sql2 = "SELECT * FROM scripture ";
                $result2=mysqli_query($db_link,$sql2);

                while($row2=$result2->fetch_assoc()) {
                    if (isset($_POST["$row2[s_id]+1"])) {
                        $_SESSION["edit_s_id"]=$row2["s_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'AdminScriptureEdit.php'";
                        echo "</script>";
                    }

                    if (isset($_POST["$row2[s_id]+2"])) {

                        $_SESSION["delete_s_id"]=$row2["s_id"];
                        $sql_delete="DELETE FROM scripture WHERE scripture.s_id = $_SESSION[delete_s_id]";
                        mysqli_query($db_link, $sql_delete);
                        $filename = $row2["filename"];//刪除檔案
                        $typename = $row2["typename"];//刪除檔案
                          unlink("../漢修專題/ScriptureFile/".$typename."/".$filename);
                        echo "<script>alert('成功刪除!');location.href='AdminScriptureSave.php'</script>";

                    }
					 if (isset($_POST["$row2[s_id]+1"])) {
                        $_SESSION["edit_s_id"]=$row2["s_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'AdminScriptureEdit.php'";
                        echo "</script>";
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
</form>
</body>

</html>
