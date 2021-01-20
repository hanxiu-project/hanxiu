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
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
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
				<a href="AdminScriptureManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>會員管理<b class="caret"></b></a>
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
                <li>
                    <a href="AdminPostsManage.php"><i class="fa fa-fw fa-edit"></i> 公告管理</a>
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
                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                session_start();

                $sql="SELECT * FROM posts WHERE posts.p_id = $_SESSION[edit_p_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                ?>



                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="forms" method="POST" action="">

                                            <div class="form-group">
                                                <label for="title">公告標題:</label>
                                                <input id="title" name="title" type="text"  value="<?php echo $row['title']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>


                                            <div class="form-group">
                                                <label for="content">公告內容:</label>
                                                <textarea id="content" name="content" rows="10" cols="80"><?php echo $row['content']?></textarea>
                                                <script>
                                                    CKEDITOR.replace('content',{
                                                        width:1650,height:500,
                                                    });
                                                </script>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">發布日期:</label>
                                                <input id="date" name="date" type="date" value="<?php echo $row['date']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="edit" value="修改" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_POST["type"]))
                {
                    $type = $_POST["type"];
                    switch ($type){
                        case '本地分':
                            $type_id = 1;
                            break;

                        case '攝決擇分':
                            $type_id = 2;
                            break;

                        case '攝釋分':
                            $type_id = 3;
                            break;

                        case '攝異門分':
                            $type_id = 4;
                            break;

                        case '攝事分':
                            $type_id = 5;
                            break;

                    }

                }

                $number = $_POST["number"];
                $title = $_POST["title"];
                $filename = $_POST["filename"];
                $content = $_POST["content"];
                $date = $_POST["date"];




                $sql_update_t_id = "UPDATE scripture SET t_id = '$type_id' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_number = "UPDATE scripture SET number = '$number' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_title = "UPDATE scripture SET title = '$title' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_filename = "UPDATE scripture SET filename = '$filename' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_content = "UPDATE scripture SET content = '$content' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_date = "UPDATE scripture SET date = '$date' WHERE scripture.s_id = $_SESSION[edit_s_id]";


                if(isset($_POST["edit"]))
                {
                    //寫入檔案
                    $myfile = fopen("C:/AppServ/www/漢修專題/ScriptureFile/$filename","w+") or die("Unable to open file!");
                    $txt = $content;
                    fwrite($myfile,$txt);
                    fclose($myfile);


                    if($_POST["type"]!=null && $_POST["number"]!=null && $_POST["title"]!=null && $_POST["filename"]!=null && $_POST["content"]!=null && $_POST["date"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_all);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                    if($_POST["number"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_number);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                    if($_POST["title"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_title);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                    if($_POST["filename"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_filename);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                    if($_POST["content"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_content);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                    if($_POST["date"]!=null)
                    {
                        mysqli_query($db_link, $sql_update_date);
                        echo "<script>alert('經文修改完成!');location.href='AdminScriptureManage.php'</script>";
                    }

                }

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
