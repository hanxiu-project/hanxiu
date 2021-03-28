<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>

    <title>新增補充資料檔案 | 管理後台</title>

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
<?php
session_start();
?>

<body>

<div id="wrapper">
    <?php include 'nav.php';?>
    <?php include 'database.php';?>
<div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >新增補充資料檔案</strong></font>
		
        </div>
    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">


                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form method="post" enctype="multipart/form-data" action="">


                                            <div class="form-group">
                                                <label for="file">檔案上傳:</label>
                                                <input type="file" name="my_file">
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning"  value="發佈" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                $getDate= date("Y-m-d");
                $filename = $_FILES['my_file']['name'];

                # 檢查檔案是否上傳成功
                if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){
                    /*echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
                    echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
                    echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
                    echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';*/


                    # 檢查檔案是否已經存在
                    if (file_exists("C:/AppServ/www/漢修專題/supplement/".$filename)){
                        echo "<script>alert('檔案已存在！');</script>";
                    } else {
                        $file = $_FILES['my_file']['tmp_name'];
                        $dest = "C:/AppServ/www/漢修專題/supplement/".$filename;

                        # 將檔案移至指定位置
                        move_uploaded_file($file, $dest);
                        //存入資料庫


                        $sql="INSERT INTO supplement (filename,date) VALUES ('$filename','$getDate')";
                        mysqli_query($db_link, $sql);
                        echo "<script>alert('檔案已經上傳!');location.href='AdminSupplementManage.php'</script>";
                    }
                } /*else {
                        echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
                    }*/


                ?>

            </div>
            <!-- /.container-fluid -->

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
