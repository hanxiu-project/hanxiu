

<?php

$db_ip = "127.0.0.1";
$db_user = "root";
$db_pwd = "123456789";
$db_link = @mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
mysqli_query($db_link, 'SET CHARACTER SET utf8');
//載入資料庫連線與啟用session
//include("sql.php");
session_start();
# 設定時區
			

	 mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");
	?>
   

            <?php
            //...
            $sql = "SELECT * FROM posts where old='0' && keep='1' order by `date` ASC ";
            $result = mysqli_query($db_link, $sql);
			
            ?>
         
							
                            <?php
                            while ($row = $result->fetch_assoc()) {
									
								
									
								if($getDate==$row[date] || $row[date]<$getDate){
									$sqlii="update `posts` set keep='0'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlii);
									
									
								}
                              
                            }
                           

                            
                            ?>
							<?php
            //...
            $sqlp = "SELECT * FROM posts where old='0' && keep='0'  order by `date` ASC ";
            $resultp = mysqli_query($db_link, $sqlp);
			
            ?>
                            <?php
                            while ($rowp = $resultp->fetch_assoc()) {
									
									
								if($getDate>=$rowp[newday]){
									$sqlp="update `posts` set old='1'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlp);
									
									
								}
                                
                            }
                           

                            
                            ?>
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
				<a href="AdminScriptureManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>講記管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
					    <li>
                            <a href="AdminScriptureManage.php"><i class="fa fa-fw fa-user"></i>講記總覽</a>
                        </li>
					    <li>
                            <a href="AdminScriptureSave.php"><i class="fa fa-fw fa-user"></i>暫存講記總覽</a>
                        </li>
					    <li>
                            <a href="AdminScripturePost.php"><i class="fa fa-fw fa-user"></i>新增新講記</a>
                        </li>
                        <li>
                            <a href="ScriptureManageNewType.php"><i class="fa fa-fw fa-user"></i>新增新講記類別</a>
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
                            <a href="AdminPostsKeep.php"><i class="fa fa-fw fa-edit"></i> 待發公告管理</a>
                        </li>
                        <li>
                            <a href="AdminPostsManage.php"><i class="fa fa-fw fa-edit"></i> 新公告管理</a>
                        </li>
						 <li>
                            <a href="AdminOldPostsManage.php"><i class="fa fa-fw fa-edit"></i> 歷史公告管理</a>
                        </li>
					    <li>
                            <a href="AdminPostsPost.php"><i class="fa fa-fw fa-user"></i>新增公告</a>
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
                            <a href="Donatemanage.php"><i class="fa fa-fw fa-user"></i>新增捐獻</a>
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
                            <a href="AdminNewVideos.php"><i class="fa fa-fw fa-user"></i>新增影音類別</a>
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
                </li>

                <li class="dropdown">
                <a href="AdminKepanManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>科判管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="AdminKepanManage.php"><i class="fa fa-fw fa-user"></i>科判總覽</a>
                        </li>
                        <li>
                            <a href="AdminNewKepan.php"><i class="fa fa-fw fa-user"></i>新增科判類別</a>
                        </li>
                        <li>
                            <a href="AdminNewKepanFile.php"><i class="fa fa-fw fa-user"></i>新增科判檔案</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="AdminSupplementManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>補充資料管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="AdminSupplementManage.php"><i class="fa fa-fw fa-user"></i>補充資料總覽</a>
                        </li>
                        <li>
                            <a href="AdminNewSupplementFile.php"><i class="fa fa-fw fa-user"></i>新增補充資料檔案</a>
                        </li>
                    </ul>
                </li>


			    <li class="dropdown">
                <a href="AdminContactManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>聯絡資訊管理<b class="caret"></b></a>
				    <ul class="dropdown-menu">
                        <li>
                            <a href="AdminContactManage.php"><i class="fa fa-fw fa-user"></i>資訊管理</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="AdminImageManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>幻燈片管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="AdminImageManage.php"><i class="fa fa-fw fa-user"></i>照片總覽</a>
                        </li>
                        <li>
                            <a href="AdminNewImageFile.php"><i class="fa fa-fw fa-user"></i>新增照片檔案</a>
                        </li>
                        <li>
                            <a href="AdminImageSort.php"><i class="fa fa-fw fa-user"></i>照片排序</a>
                        </li>
                    </ul>
                </li>

        </div>
        <!-- /.navbar-collapse -->
    </nav>