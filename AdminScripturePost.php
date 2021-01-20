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
<form name="formspost" method="post" action="">
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
				$sqltype="SELECT * FROM `types` ";
                $resulttype=mysqli_query($db_link,$sqltype);
                /*$row=mysqli_fetch_assoc($resulttype);*/
				session_start();
                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                ?>



                    <div id="con2">
                        <div class="main">
                            <div class="newstitle" >

                                <div class="contentlist">

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <form name="form" method="post" action="">

                                                <div class="form-group">
                                                    <label for="type">類別編號:</label>
													 <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:transparent">
													<?php while ($row = $resulttype->fetch_assoc()) {
														echo "<option value=$row[t_id]>$row[typename]</option>";
														
														
													}
													$sqltypeinput="SELECT * FROM `types` where `t_id`='$_POST[type]'";
													$resulttypeinput=mysqli_query($db_link,$sqltypeinput);
													 $rowinput= mysqli_fetch_assoc($resulttypeinput);	
													 $inputtype=$rowinput['typename'];
													?>
                                                   
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="number">&emsp;&emsp;卷號:</label>
                                                    <input id="number" name="number" type="number"  style="width:525px; height:30px; color:#000000; background-color:transparent">
                                                </div>


                                                <div class="form-group">
                                                    <label for="title">經文標題:</label>
                                                    <input id="title" name="title" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="filename">&emsp;&emsp;檔名:</label>
                                                    <input id="filename" name="filename" type="text" placeholder="檔名須為.txt"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="content">經文內容:</label>
                                                    <textarea id="content" name="content" id="content" rows="10" cols="80"></textarea>
                                                    <script>
                                                        CKEDITOR.replace('content',{
                                                            width:1300,height:500,
                                                        });
                                                    </script>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date">發布日期:</label>
                                                    <input id="date" value="" name="date" type="date"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-sm btn-warning" name="go" value="發佈" >
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
                    $number = $_POST["number"];
                    $title = $_POST["title"];
                    $filename = $_POST["filename"];
                    $content = $_POST["content"];
					if($_POST["date"]==null){
						$date=$getDate;
					}else{
						$date = $_POST["date"];
					}
                   

                    if(isset($_POST["go"]))
                    {
                        if($number==null && $title==null && $filename==null && $content==null && $date ==null)
                        {
                            echo "<script>alert('請輸入資料!');location.href='AdminScripturePost.php'</script>";
                        }
                        else
                        {
                            //寫入檔案
                            $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
                            $myfile = fopen("C:/AppServ/www/漢修專題/ScriptureFile/$filename","a+") or die("Unable to open file!");
                            $txt = $content;
                            fwrite($myfile,$txt);
                            fclose($myfile);

                            $sql="INSERT INTO scripture (t_id,typename,number,title,filename,content,date) VALUES ('$_POST[type]','$inputtype','$number','$title','$filename','$content','$date')";
                            mysqli_query($db_link, $sql);
                            echo "<script>alert('經文已經上傳!');location.href='AdminScriptureManage.php'</script>";
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
