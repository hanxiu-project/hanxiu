<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>

    <title>新增經文 | 管理後台</title>

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
        <!--sidebar-->
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="AdminDashboard.php">管理後台</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 管理員 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="indexs.php"><i class="fa fa-fw fa-envelope"></i> 回前台</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class="dropdown">
                        <a href="AdminScriptureManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>經文管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminScriptureManage.php"><i class="fa fa-fw fa-user"></i>經文總覽</a>
                            </li>
                            <li>
                                <a href="AdminScripturePost.php"><i class="fa fa-fw fa-user"></i>建立新經文</a>
                            </li>
                            <li>
                                <a href="ScriptureManageNewType.php"><i class="fa fa-fw fa-user"></i>建立新經文類別</a>
                            </li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="AdminCommentManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>會員管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="MemberManagefor1.php"><i class="fa fa-fw fa-user"></i>管理員</a>
                            </li>
                            <li>
                                <a href="MemberManagefor0.php"><i class="fa fa-fw fa-user"></i>一般會員</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="AdminPostsManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>公告管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminPostsManage.php"><i class="fa fa-fw fa-edit"></i> 公告管理</a>
                            </li>
                            <li>
                                <a href="AdminPostsPost.php"><i class="fa fa-fw fa-user"></i>建立公告</a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="Donatemanage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>捐獻管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="DonateView.php"><i class="fa fa-fw fa-user"></i>捐獻總覽</a>
                            </li>
                            <li>
                                <a href="Donatemanage.php"><i class="fa fa-fw fa-user"></i>增加捐獻</a>
                            </li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="AdminVideosManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>影音管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminVideosManage.php"><i class="fa fa-fw fa-user"></i>影音總覽</a>
                            </li>
                            <li>
                                <a href="AdminNewVideos.php"><i class="fa fa-fw fa-user"></i>新增影音</a>
                            </li>
                            <li>
                                <a href="AdminNewVideoFile.php"><i class="fa fa-fw fa-user"></i>新增影音檔案</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="AdminCommentManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>留言管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminCommentManagefor1.php"><i class="fa fa-fw fa-user"></i>已回覆留言</a>
                            </li>
                            <li>
                                <a href="AdminCommentManagefor0.php"><i class="fa fa-fw fa-user"></i>未回覆留言</a></li></ul>

                    <li class="dropdown">
                        <a href="AdminKepanManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>科判管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminKepanManage.php"><i class="fa fa-fw fa-user"></i>科判總攬</a>
                            </li>
                            <li>
                                <a href="AdminNewKepan.php"><i class="fa fa-fw fa-user"></i>新增科判</a>
                            </li>
                            <li>
                                <a href="AdminNewKepanFile.php"><i class="fa fa-fw fa-user"></i>新增科判檔案</a>
                            </li>
                        </ul>

                    <li class="dropdown">
                        <a href="AdminContactManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>聯絡資訊管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="AdminContactManage.php"><i class="fa fa-fw fa-user"></i>資訊管理</a>
                            </li>
                            </li>
                            </li>
                        </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

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
                    $sqltype="SELECT * FROM `kp_types` ";
                    $resulttype=mysqli_query($db_link,$sqltype);

                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                    ?>


                    <div id="con2">
                        <div class="main">
                            <div class="newstitle" >

                                <div class="contentlist">

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <form method="post" enctype="multipart/form-data" action="">

                                                <div class="form-group">
                                                    <label for="type">科判:</label>
                                                    <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:transparent">
                                                        <?php while ($row = $resulttype->fetch_assoc()) {
                                                            echo "<option name='type' value=$row[kpt_id]>$row[kptypename]</option>";


                                                        }
                                                        $sqltypeinput="SELECT * FROM `kp_types` where `kpt_id`='$_POST[type]'";
                                                        $resulttypeinput=mysqli_query($db_link,$sqltypeinput);
                                                        $rowinput= mysqli_fetch_assoc($resulttypeinput);
                                                        $_SESSION[inputtype]=$rowinput['kptypename'];
                                                        ?>

                                                    </select>
                                                </div>


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
                        if (file_exists('../漢修專題/kepan/' . $_FILES['my_file']['name'])){
                            echo '檔案已存在。<br/>';
                        } else {
                            $file = $_FILES['my_file']['tmp_name'];
                            $dest = '../漢修專題/kepan/' . $_FILES['my_file']['name'];

                            # 將檔案移至指定位置
                            move_uploaded_file($file, $dest);
                            //存入資料庫


                             $sql="INSERT INTO kepans (kpt_id,kptypename,filename,date) VALUES ('$_POST[type]','$rowinput[kptypename]','$filename','$getDate')";
                             mysqli_query($db_link, $sql);
                             echo "<script>alert('檔案已經上傳!');location.href='AdminKepanManage.php'</script>";
                        }
                    } /*else {
                        echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';*/
                    //}


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
