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
            <a class="navbar-brand" href="AdminScriptureManage.php">管理後台</a>
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
                        <a href="AdminVideosManage.php"><i class="fa fa-fw fa-user"></i>影音管理</a>
                    </li>
					<li>
                        <a href="AdminNewVideos.php"><i class="fa fa-fw fa-user"></i>建立影音</a>
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

                 $sql="SELECT * FROM members WHERE members.m_id = $_SESSION[edit_m_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                /*$sql2="SELECT typename FROM scripture,types WHERE scripture.t_id = types.t_id AND scripture.s_id = $_SESSION[edit_s_id]";
                $result2=mysqli_query($db_link,$sql2);
                $row2=mysqli_fetch_assoc($result2);*/


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

                                            <div class="form-group">
                                                <label for="mid">會員編號:</label>
                                               <input id="mid" name="mid" type="text" disabled="disabled"  value="<?php echo $row['m_id']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" > 
                                            </div>

                                            <div class="form-group">
                                                <label for="mname">會員姓名:</label>
                                                <input id="mname" name="mname" type="text" disabled="disabled" value="<?php echo $row['name']?>" style="width:525px; height:30px; color:#000000; background-color:transparent">
                                            </div>


                                            <div class="form-group">
                                                <label for="memail">會員信箱:</label>
                                                <input id="memail" name="memail" type="text" disabled="disabled"  value="<?php echo $row['email']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <label for="mtele">會員電話:</label>
                                                <input id="mtele" name="mtele" type="text" disabled="disabled" value="<?php echo $row['telephone']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                             <div class="form-group">
                                                <label for="dcontent">捐獻內容:</label>
                                                <select id="dcontent" name="dcontent">
												<option>金錢</option>
												<option>物資</option>
												</select>
                                            </div>
											
											<div class="form-group">
                                                <label for="damount">捐獻數量:</label>
                                                <input type="text" id="damount" name="damount" style="width:525px; height:30px; color:#000000; background-color:transparent">  
                                            </div>
											
                                            <div class="form-group">
                                                <label for="ddate">捐獻日期:</label>
                                                <input id="ddate" name="ddate" type="date"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="dpost" value="發布" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <?php
						$dname=$_POST["dname"];
						$dtele=$_POST["dtele"];
						$dcontent = $_POST["dcontent"];
						$damount = $_POST["damount"];
						$ddate = $_POST["ddate"];
							/*$sqli="SELECT * FROM `members` WHERE name = '$dname' and telephone='$dtele'";
						$result=mysqli_query($db_link,$sqli);
						$row=mysqli_fetch_assoc($result);
							mysqli_query($db_link, $sqli);
						$mid=$row["m_id"];*/
						
						
						$sqlii="SELECT * FROM `donate`";
						$result1=mysqli_query($db_link,$sqlii);
						$row1=mysqli_fetch_assoc($result1);
    
                        ?>
						<?php
						 if(isset($_POST["dpost"]))
                        {
                            if($damount==null || $ddate ==null)
                            {
                                echo "<script>alert('請輸入資料!');location.href='Donatemanage.php'</script>";
                            }
                            else
                            {
								
                                $sqldonate="INSERT INTO `donates` (m_id,dname,amount,date,type) VALUES('$row[m_id]','$row[name]','$damount','$ddate','$dcontent')";
                                mysqli_query($db_link, $sqldonate);
                                echo "<script>alert('捐獻資料已經上傳!');location.href='Donatemanage.php'</script>";
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
