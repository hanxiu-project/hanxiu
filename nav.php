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
                    <a href="indexs.php"><i class="fas fa-share-square"></i> 回前台</a>
                </li>
               
                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>登出</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
                 <li class="dropdown">
				<a href="AdminOriginEdit.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-file"></i>緣起管理<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
				<a href="AdminOriginEdit.php"><i class="fas fa-file"></i> 緣起管理編輯</a>
				</li>
				
				</ul>
				</li>
				<li class="dropdown">
				<a href="AdminSloganEdit.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-file"></i>標語管理<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
				<a href="AdminSloganEdit.php"><i class="fas fa-file"></i> 首頁標語編輯</a>
				</li>
					<li>
				<a href="AdminErrorSloganEdit.php"><i class="fas fa-file"></i> 留言區標語編輯</a>
				</li>
					<li>
				<a href="AdminfootSloganEdit.php"><i class="fas fa-file"></i> 底部標語編輯</a>
				</li>
				</ul>
				</li>
            <li class="dropdown">
                <a href="AdminScriptureManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-file"></i> 講記管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminScriptureManage.php"><i class="fas fa-file"></i> 講記總覽</a>
                    </li>
                    <li>
                        <a href="AdminScriptureSave.php"><i class="fas fa-file"></i> 暫存講記總覽</a>
                    </li>
                    <li>
                        <a href="AdminScripturePost.php"><i class="fas fa-file"></i> 新增講記</a>
                    </li>
                    <li>
                        <a href="ScriptureManageNewType.php"><i class="fas fa-file"></i> 新增講記類別</a>
                    </li>
                    <li>
                        <a href="AdminScripturesTypeSort.php"><i class="fas fa-file"></i> 講記類別排序</a>
                    </li>
                    <li>
                        <a href="AdminShowScriptureManage.php"><i class="fas fa-cogs"></i>編輯講記是否顯示</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="AdminKepanManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-folder"></i> 科判管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminKepanManage.php"><i class="fas fa-folder"></i> 科判總覽</a>
                    </li>
                    <li>
                        <a href="AdminNewKepan.php"><i class="fas fa-folder"></i> 新增科判類別</a>
                    </li>
                    <li>
                        <a href="AdminNewKepanFile.php"><i class="fas fa-folder"></i> 新增科判檔案</a>
                        
                    </li>
                    <li>
                        <a href="AdminKepanTypeSort.php"><i class="fas fa-folder"></i>科判類別排序</a>
                      </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="AdminSupplementManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sticky-note"></i> 補充資料管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminSupplementManage.php"><i class="fas fa-sticky-note"></i> 補充資料總覽</a>
                    </li>
                    <li>
                        <a href="AdminSupplementSave.php"><i class="fas fa-file"></i> 暫存補充資料總覽</a>
                    </li>
                    <li>
                        <a href="AdminNewSupplement.php"><i class="fas fa-sticky-note"></i> 新增補充資料類別</a>
                    </li>
                    <li>
                        <a href="AdminNewSupplementFile.php"><i class="fas fa-sticky-note"></i> 新增補充資料</a>

                    </li>
                    <li>
                        <a href=" AdminSupplementTypeSort.php"><i class="fas fa-sticky-note"></i> 補充資料類別排序</a>

                    </li>
                   
                </ul>
            </li>
            <li class="dropdown">
                <a href="AdminVideosManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-video"></i> 影音管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminVideosManage.php"><i class="fas fa-video"></i> 影音總覽</a>
                    </li>
                    <li>
                        <a href="AdminNewVideos.php"><i class="fas fa-video"></i> 新增影音類別</a>
                    </li>

                    <li>
                        <a href="AdminNewVideoFile.php"><i class="fas fa-video"></i> 新增影音網址</a>
                    </li>
                    <li>
                        <a href="AdminVideoTypeSort.php"><i class="fas fa-video"></i> 影音類別排序</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="AdminPostsManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell"></i> 公告管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminPostsPost.php"><i class="fas fa-bell"></i> 新增公告</a>
                    </li>
                    <li>
                        <a href="AdminPostsSave.php"><i class="fas fa-bell"></i> 暫存公告管理</a>
                    </li>
					<li>
                        <a href="AdminPostsTop.php"><i class="fas fa-bell"></i> 置頂公告管理</a>
                    </li>
                    <li>
                        <a href="AdminPostsKeep.php"><i class="fas fa-bell"></i> 待發公告管理</a>
                    </li>
                    <li>
                        <a href="AdminPostsManage.php"><i class="fas fa-bell"></i> 新公告管理</a>
                    </li>
                    <li>
                        <a href="AdminOldPostsManage.php"><i class="fas fa-bell"></i> 歷史公告管理</a>
                    </li>
                </ul>
            </li>

<!--            <li class="dropdown">-->
<!--                <a href="Donatemanage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-star"></i> 捐獻管理<b class="caret"></b></a>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li>-->
<!--                        <a href="DonateView.php"><i class="fas fa-star"></i> 捐獻總覽</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="Donatemanage.php"><i class="fas fa-star"></i> 新增捐獻</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->




            <li class="dropdown">
                <a href="AdminCommentManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-comment"></i> 留言管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminCommentManagefor1.php"><i class="fas fa-comment"></i> 已回覆留言</a>
                    </li>
                    <li>
                        <a href="AdminCommentManagefor0.php"><i class="fas fa-comment"></i> 未回覆留言</a>
                    </li>
                </ul>
            </li>






            <li class="dropdown">
                <a href="AdminContactManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-comment-alt"></i> 聯絡資訊管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminContactManage.php"><i class="fas fa-comment-alt"></i> 資訊管理</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="AdminImageManage.php" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-image"></i> 幻燈片管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="AdminImageManage.php"><i class="far fa-image"></i> 照片總覽</a>
                    </li>
                    <li>
                        <a href="AdminNewImageFile.php"><i class="far fa-image"></i> 新增照片檔案</a>
                    </li>
                    <li>
                        <a href="AdminImageSort.php"><i class="far fa-image"></i> 照片排序</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="MemberManagefor1.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-users"></i> 會員管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="MemberManagefor1.php"><i class="fas fa-cogs"></i> 管理員</a>
                    </li>
                    <li>
                        <a href="MemberManagefor0.php"><i class="fa fa-fw fa-user"></i> 一般會員</a>
                    </li>
                </ul>
            </li>  
           
</ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>