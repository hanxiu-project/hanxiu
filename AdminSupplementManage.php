<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>補充資料總覽 | 管理後台</title>

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
<form name="forms" method="post" action="">
    <div id="wrapper">
        <?php include 'nav.php';?>
        <?php include 'database.php';?>

        <?php
        /*資料庫連結*/

        $sqltype="SELECT * FROM supplement ";
        $resulttype=mysqli_query($db_link,$sqltype);

        session_start();
        ?>
        <!--建立新經文-->
        <div class="row" style="margin-bottom: 20px; text-align: left">
            <div class="col-lg-12">
                <a href="AdminNewSupplementFile.php" class="btn btn-success  " style="left">建立新補充資料檔案</a>

            </div>

        </div>
<div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >補充資料總覽</strong></font>
		
        </div>
        <!--Body-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class='wrapper'>
                    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                    <?php

                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                    $sql_tid = "SELECT * FROM supplement order by sp_id";
                    $result= mysqli_query($db_link,$sql_tid);

                    echo "<form name='form1' method='POST' action=''>";
                    echo "<table border=1 width=100% style=font-size:20px;line-height:50px;>";
                    echo "<tr align=center>";
                    echo "<td>檔案名稱</td>";
                    echo "<td>發佈日期</td>";
                    echo "<td></td>";
                    echo "</tr>";


                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr align=center>";
                            echo "<td>$row[filename]</td>";
                            echo "<td>$row[date]</td>";
                            ?>
                            <td><input type='submit' class="btn btn-sm btn-danger " style='width:100px;height:30px;' name="<?php echo "$row[sp_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

                            <?php
                            echo "</tr>";
                        }


                    echo "</table>";

                    //$sql2="SELECT s_id,typename,number,title,date FROM scripture,types WHERE scripture.t_id = types.t_id";
                    $sql2 = "SELECT * FROM supplement ";
                    $result2=mysqli_query($db_link,$sql2);

                    while($row2=$result2->fetch_assoc()) {

                        if (isset($_POST["$row2[sp_id]+2"])) {

                            $_SESSION["delete_sp_id"]=$row2["sp_id"];
                            $sql_delete="DELETE FROM supplement WHERE sp_id = $_SESSION[delete_sp_id]";
                            mysqli_query($db_link, $sql_delete);
                            $filename = $row2["filename"];//刪除檔案
                            unlink("../漢修專題/supplement/".$filename);
                            echo "<script>alert('成功刪除!');location.href='AdminSupplementManage.php'</script>";

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
