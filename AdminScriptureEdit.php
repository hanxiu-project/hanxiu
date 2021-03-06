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
                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                session_start();

                $sql="SELECT * FROM scripture WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                $sql2="SELECT typename FROM scripture,types WHERE scripture.t_id = types.t_id AND scripture.s_id = $_SESSION[edit_s_id]";
                $result2=mysqli_query($db_link,$sql2);
                $row2=mysqli_fetch_assoc($result2);
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");

                //讀取檔案
                $filename = $row["filename"];
                $str = "";

                //判斷是否有該檔案
                if(file_exists("C:AppServ/www/漢修專題/ScriptureFile/$filename"))
                {
                    $filee = fopen("C:AppServ/www/漢修專題/ScriptureFile/$filename","r");
                    if($filee != NULL)
                        //當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
                    {
                        while(!feof($filee))
                        {
                            $str .= fgets($filee);
                        }
                        fclose($filee);
                    }
                }

                ?>



                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="forms" method="POST" action="">

											<?php
											$sqltype="SELECT * FROM types ";
											$resulttype=mysqli_query($db_link,$sqltype);
											?>
											<div class="form-group">
											<label for="type">類別編號:</label>


											<select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:white">
										   
										  
											<?php 
											
											while ($rowtype = $resulttype->fetch_assoc()) {
											    if($row['typename']==$rowtype[typename])                    //先前的與現在抓資料庫的相同
                                                {
                                                    echo "<option name=typeid value=$rowtype[t_id] selected>$rowtype[typename]</option>";
                                                }
											    else
											    {
                                                    echo "<option name=typeid value=$rowtype[t_id]>$rowtype[typename]</option>";
                                                }
													$sqltypeinput="SELECT * FROM `types` where `t_id`='$_POST[type]'";
													$resulttypeinput=mysqli_query($db_link,$sqltypeinput);
													 $rowinput= mysqli_fetch_assoc($resulttypeinput);	
													 $inputtype=$rowinput['typename'];											
											}
											?>
											
											</select>
											   </div>
                                            

                                            <div class="form-group">
                                                <label for="number">卷號:</label>
                                                <input id="number" name="number" type="number" value="<?php echo $row['number']?>" style="width:525px; height:30px; color:#000000; background-color:transparent">
                                            </div>


                                            <div class="form-group">
                                                <label for="title">經文標題:</label>
                                                <input id="title" name="title" type="text"  value="<?php echo $row['title']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <label for="filename">檔名:</label>
                                                <input id="filename" name="filename" type="text" value="<?php echo $row['filename']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <label for="content">經文內容:</label>
                                                <textarea id="content" name="content" rows="10" cols="80"><?php echo $str?></textarea>
                                                <script>
                                                    CKEDITOR.replace('content',{
                                                        width:1650,height:500,
                                                    });
                                                </script>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">發布日期:</label>
                                                <input id="date" name="date" type="date" value="<?php echo $getDate?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
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
                

                $number = $_POST["number"];
                $title = $_POST["title"];
                $filename = $_POST["filename"];
                $content = $_POST["content"];
                $date = $_POST["date"];
				


				
				$sql_update_all = "UPDATE scripture SET `t_id` = '$_POST[type]',`typename` = '$inputtype',`number` = '$number',`title` = '$title',`filename` = '$filename',`content` = '$content',`date` = '$date' WHERE scripture.s_id = $_SESSION[edit_s_id]";
                $sql_update_t_id = "UPDATE scripture SET t_id = '$_POST[type]' WHERE scripture.s_id = $_SESSION[edit_s_id]";
				$sql_update_typename = "UPDATE scripture SET typename = '$inputtype' WHERE scripture.s_id = $_SESSION[edit_s_id]";
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
