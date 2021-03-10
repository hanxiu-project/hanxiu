<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>

    <title>新增公告 | 管理後台</title>

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
<?php
session_start();
?>

<div id="wrapper">
    <?php include 'admin.php';?>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/
            
                session_start();

                $sql="SELECT * FROM posts WHERE posts.p_id = $_SESSION[edit_p_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);
				date_default_timezone_set('Asia/Taipei');
					$getDate= date("Y-m-d");
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
                                                <input id="title" name="title" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
												<label for="day">下架天數:</label>
												<?php
												echo "<select name=day> <option value='1'>一天</option><option value='2'>兩天</option><option value='3'>三天</option><option value='4'>四天</option><option value='5'>五天</option><option value='6'>六天</option><option value='7'>七天</option><option value='15'>十五天</option><option value='30'>三十天</option></select>";
												?>
                                            </div>


                                            <div class="form-group">
                                                <label for="content">公告內容:</label>
                                                <textarea id="content" name="content" rows="10" cols="80"></textarea>
                                                <script>
                                                    CKEDITOR.replace('content',{
                                                        width:1650,height:500,
                                                    });
                                                </script>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">發布日期:</label>
                                                <input id="date" name="date" type="date" value="<?php echo $getDate?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
												
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="post" value="發布" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                        <?php

						# 設定時區
					
					if($_POST["date"]==null){
						$date=$getDate;
					}else{
						$date = $_POST["date"];
					}


                        $title = $_POST["title"];
                        $content = $_POST["content"];
                        


                        if(isset($_POST["post"]))
                        {
                            if($title==null && $content==null && $date ==null)
                            {
                                echo "<script>alert('請輸入資料!');location.href='AdminPostsPost.php'</script>";
                            }
                            else
                            {
                                $sql="INSERT INTO `posts` (p_id,mname,m_id,title,content,date,newday) VALUES('NULL','$_SESSION[name]','$_SESSION[m_id]','$title','$content','$date','$_POST[day]')";
                                mysqli_query($db_link, $sql);
                                echo "<script>alert('公告已經上傳!');location.href='AdminPostsManage.php'</script>";
                            }
                        }
                        mysqli_close($db_link);
                        ?>
                </form>

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
