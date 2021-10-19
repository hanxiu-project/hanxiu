<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>新增補充資料類別 | 管理後台</title>

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

        ?>
        <!--建立新經文-->
        <div class="row" style="margin-bottom: 20px; text-align: left">
            <div class="col-lg-12">
                <label for="content"><font color="#ffffff">新增補充資料類別:</font></label>
                <input id="type" name="type" type="text" style="width:525px; height:30px; color:#000000; ">
                <input type="submit" class="btn btn-sm btn-warning" name="go" value="新增">
            </div>
        </div>

        <div class="col-lg-12">
            <font size="6"><strong style= "background:white" >新增補充資料類別</strong></font>
        </div>
        <!--Body-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class='wrapper'>
                    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                    <?php
                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                    $sql = "SELECT * FROM spm_types ";
                    $result = mysqli_query($db_link, $sql);

                    echo "<form name='form1' method='POST' action=''>";
                    echo "<table border rules=rows cellspacing=0 width=100% style=font-size:20px;line-height:50px;>";
                    echo "<tr align=center>";
                    echo "<td><b>補充資料類別</b></td>";
                    echo "<td></td>";
                    echo "</tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr align=center>";
                        echo "<td>$row[spmtypename]</td>";
                        echo "<td>";
                        ?>
                        <input type='submit' class="btn btn-sm btn-danger " style='width:100px;height:30px;'
                               name="<?php echo "$row[spt_id]+2"; ?>" value='刪除'
                               onclick="return confirm('是否確認刪除此類別?')"></td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";

                    $sql2 = "SELECT * FROM spm_types ";
                    $result2 = mysqli_query($db_link, $sql2);
                    $sql_listorder =" SELECT MAX(listorder) as max FROM  `spm_types` ";
                    $listresult=mysqli_query($db_link,  $sql_listorder);
                    $listcheck=mysqli_fetch_assoc($listresult);
                    $max_listorder=$listcheck['max'];

                    while ($row2 = $result2->fetch_assoc()) {
                        if (isset($_POST["$row2[spt_id]+2"])) {
                            $file_path = "supplement/$row2[spmtypename]";
                            if (is_dir($file_path)) {//先判斷是不是資料夾
                                if (rmdir($file_path)) {//判斷是否能刪除成功
//                                    echo “刪除資料夾成功”;
                                    $_SESSION["delete_spt_id"] = $row2["spt_id"];
                                    $sql_delete = "DELETE FROM spm_types WHERE spm_types.spt_id = $_SESSION[delete_spt_id]";
                                    mysqli_query($db_link, $sql_delete);
                                    echo "<script>alert('成功刪除!');location.href='AdminNewSupplement.php'</script>";
                                }
                                else
                                {
                                    echo "<script>alert('此類別含有補充資料檔案無法刪除!');location.href='AdminNewSupplement.php'</script>";
                                    //echo "此類別含有講記無法刪除！";//如果資料夾不為空，是無法刪除的
                                }
                            } else {
                                echo "<script>alert('補充資料類別不存在!');location.href='AdminNewSupplement.php'</script>";
                                //echo "講記類別不存在！";        資料夾不存在
                            }
                        }
                    }

                    $type = $_POST["type"];                     //新增講記類別

                    if (isset($_POST["go"])) {
                        if ($type == null) {
                            echo "<script>alert('請輸入欲新增的類別!');location.href='AdminNewSupplement.php'</script>";
                        } else {
                            //資料夾的建立
                            $file_path = "./supplement/$type";
                            if (!file_exists($file_path)) {
                                mkdir($file_path);
                                //echo “建立資料夾成功”;
                                $sqltype = "INSERT INTO spm_types (spmtypename,listorder) VALUES ('$type','$max_listorder'+1)";
                                mysqli_query($db_link, $sqltype);
                                echo "<script>alert('補充資料類別建立成功!');location.href='AdminNewSupplement.php'</script>";
                            } else {
//                            echo “資料夾已存在”;
                                echo "<script>alert('補充資料類別已存在!');location.href='AdminNewSupplement.php'</script>";
                            }
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
