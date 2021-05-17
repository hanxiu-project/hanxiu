<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

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
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>



<div id="wrapper">
    <!--sidebar-->
    <!-- Navigation -->
    <?php include 'nav.php';?>
    <?php include 'database.php';?>
    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
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
                                                <label for="date">發佈日期:<?php echo $row['date']?></label>
                                               </br>
												 <input type='checkbox' name='top' value="<?php echo $row['save'] ?>"><label>置頂</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="save" value="暫存" >
                                                <input type="submit" class="btn btn-sm btn-warning" name="edit" value="發佈" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_POST["save"]))
                {
                    if($_POST["title"]==null || $_POST["content"]==null || $_POST["date"] ==null)
                    {
                        echo "<script>alert('請輸入資料!');location.href='AdminPostsEdit.php'</script>";
                    }
                    else
                    {
                        $sql="INSERT INTO `posts` (p_id,mname,m_id,title,content,save,top) VALUES('NULL','$_SESSION[name]','$_SESSION[m_id]','$_POST[title]','$_POST[content]','1','$_POST[top]')";
                        mysqli_query($db_link, $sql);
                        echo "<script>alert('公告已經上傳至暫存區!');location.href='AdminPostsSave.php'</script>";
                    }
                }


                if(isset($_POST["edit"]))
                {
                    if($_POST["title"] == NULL || $_POST["content"] == NULL )
                    {
                        echo "<script>alert('請輸入標題或內容!');location.href='AdminPostsEdit.php'</script>";
                    }
                    else
                    {
                        $sqledit = "UPDATE posts SET `top`='$_POST[top]', `title` = '$_POST[title]', `content` = '$_POST[content]' WHERE posts.p_id = $_SESSION[edit_p_id] ";
                        mysqli_query($db_link, $sqledit);
						if($_POST['top']=='1'){
							 echo "<script>alert('公告修改完成!');location.href='AdminPostsTop.php'</script>";
						}
						else if($row['old']=='1'){
						    echo "<script>alert('公告修改完成!');location.href='AdminOldPostsManage.php'</script>";
						}
						else{
							echo "<script>alert('公告修改完成!');location.href='AdminPostsManage.php'</script>";
						}
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
