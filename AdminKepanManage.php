<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>科判管理 | 管理後台</title>

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
                                <a href="AdminCommentManagefor0.php"><i class="fa fa-fw fa-user"></i>未回覆留言</a>
                            </li>
                        </ul>

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
                        </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php
        /*資料庫連結*/
        $db_ip="127.0.0.1";
        $db_user="root";
        $db_pwd="123456789";
        $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
        $sqltype="SELECT * FROM kp_types ";
        $resulttype=mysqli_query($db_link,$sqltype);

        session_start();
        ?>
        <!--建立新經文-->
        <div class="row" style="margin-bottom: 20px; text-align: left">
            <div class="col-lg-12">
                <a href="AdminNewKepan.php" class="btn btn-success  " style="left">建立新科判</a>
                <a href="AdminNewKepanFile.php" class="btn btn-success  " style="left">建立新科判檔案</a>

                <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:white">
                    <option>請選擇科判</option>
                    <option value="all">全選</option>
                    <?php

                    while ($rowtype = $resulttype->fetch_assoc()) {
                        echo "<option name=typeid value=$rowtype[kptypename]>$rowtype[kptypename]</option>";

                    }?>               `
                </select>

                <input type="submit" class="btn btn-sm btn-warning" name="gotype" value="查看科判" >


            </div>

        </div>

        <!--Body-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class='wrapper'>
                    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                    <?php

                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                    $sql_tid = "SELECT * FROM kepans order by kpt_id";
                    $result= mysqli_query($db_link,$sql_tid);

                    echo "<form name='form1' method='POST' action=''>";
                    echo "<table  width=100% style=font-size:20px;>";
                    echo "<tr align=center>";
                    echo "<td>科判名稱</td>";
                    echo "<td>檔案名稱</td>";
                    echo "<td>發佈日期</td>";
                    echo "<td></td>";
                    echo "</tr>";
                    if (isset($_POST["gotype"])) {
                        $sql_typesearch = "SELECT * FROM kepans WHERE kptypename ='$_POST[type]' order by kpt_id ";
                        $resulttypesearch= mysqli_query($db_link,$sql_typesearch);
                        if ($_POST[type]=="all"){
                            while($row=$result->fetch_assoc())
                            {
                                echo "<tr align=center>";
                                echo "<td>$row[kptypename]</td>";
                                echo "<td>$row[filename]</td>";;
                                echo "<td>$row[date]</td>";

                                ?>
                                <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[k_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

                                <?php
                                echo "</tr>";
                            }
                        }
                        else{
                            while($rowt=$resulttypesearch->fetch_assoc())
                            {
                                echo "<tr align=center>";
                                echo "<td>$rowt[kptypename]</td>";
                                echo "<td>$rowt[filename]</td>";
                                echo "<td>$rowt[date]</td>";

                                ?>
                                <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$rowt[k_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

                                <?php
                                echo "</tr>";
                            }}


                    }
                    else{
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr align=center>";
                            echo "<td>$row[kptypename]</td>";
                            echo "<td>$row[filename]</td>";
                            echo "<td>$row[date]</td>";

                            ?>
                            <td><input type='submit' class="btn btn-sm btn-danger " style='width:100px;height:30px;' name="<?php echo "$row[k_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

                            <?php
                            echo "</tr>";
                        }
                    }

                    echo "</table>";

                    //$sql2="SELECT s_id,typename,number,title,date FROM scripture,types WHERE scripture.t_id = types.t_id";
                    $sql2 = "SELECT * FROM kepans ";
                    $result2=mysqli_query($db_link,$sql2);

                    while($row2=$result2->fetch_assoc()) {
                        if (isset($_POST["$row2[k_id]+1"])) {
                            $_SESSION["edit_k_id"]=$row2["k_id"];
                            echo "<script langauge = 'javascript' type='text/javascript'>";
                            echo "window.location.href = 'AdminScriptureEdit.php'";
                            echo "</script>";
                        }

                        if (isset($_POST["$row2[k_id]+2"])) {

                            $_SESSION["delete_k_id"]=$row2["k_id"];
                            $sql_delete="DELETE FROM kepans WHERE kepans.k_id = $_SESSION[delete_k_id]";
                            mysqli_query($db_link, $sql_delete);
                            $filename = $row2["filename"];//刪除檔案
                            unlink("../漢修專題/kepan/".$filename);
                            echo "<script>alert('成功刪除!');location.href='AdminKepanManage.php'</script>";

                        }
                        if (isset($_POST["$row2[k_id]+1"])) {
                            $_SESSION["edit_k_id"]=$row2["k_id"];
                            echo "<script langauge = 'javascript' type='text/javascript'>";
                            echo "window.location.href = 'AdminScriptureEdit.php'";
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
</form>
</body>

</html>