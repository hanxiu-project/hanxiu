<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>照片總覽 | 管理後台</title>

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
		
    <div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >照片總覽</strong></font>
        </div>
        <!--Body-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class='wrapper'>
                    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                    <?php
                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                    $sql = "SELECT * FROM carousel";
                    $result= mysqli_query($db_link,$sql);

                    echo "<form name='form1' method='POST' action=''>";
                    echo "<table border rules=rows cellspacing=0  width=100% style=font-size:24px;line-height:50px; >";
                    echo "<tr align=center>";
                    echo "<td>照片圖示</td>";
                    echo "<td>照片名稱</td>";
                    echo "<td>上傳日期</td>";
                    echo "<td></td>";
                    echo "</tr>";
                    while($row=$result->fetch_assoc())
                    {
                        echo "<tr align=center>";
                        echo "<td><img src='images/$row[imgname] '  width='100px' height='100px' alt=''>";
                        echo "$row[imgname]</td>";
                        echo "<td>$row[uploadtime]</td>";
                        ?>
                        <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這張照片?')"></td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";


                    $sql2 = "SELECT * FROM carousel";
                    $result2=mysqli_query($db_link,$sql2);

                    while($row2=$result2->fetch_assoc()) {

                        if (isset($_POST["$row2[id]+2"]))
                        {
                            $_SESSION["delete_id"]=$row2["id"];
                            $sql_delete="DELETE FROM carousel WHERE id = $_SESSION[delete_id]";
                            mysqli_query($db_link, $sql_delete);
                            unlink($row2["path2"]);
                            echo "<script>alert('成功刪除!');location.href='AdminImageManage.php'</script>";
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