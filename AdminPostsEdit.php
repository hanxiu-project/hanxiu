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
<?php
session_start();
include 'verification.php';
?>


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
                date_default_timezone_set('Asia/Taipei');
                $getDate= date("Y-m-d");
                $getDate2= date("Y-m-d", strtotime($getDate."+1 day"));
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
                                                <?php
                                                if ($row["save"] == 1)
                                                {
                                                ?>
                                                    <label for="date">發佈日期:</label>
                                                    <input id="date" name="date" type="date" value="<?php echo $row['date']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent">
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <label for="date">發佈日期:</label>
                                                    <input id="date" name="date" type="date" value="<?php echo $row['date']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" readonly="readonly" >
                                                <?php
                                                }
                                                ?>
                                                    <label for="day">下架日期:</label>
                                                    <input id="newday" name="newday" type="date" value="<?php echo $row['newday']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                    </br>
                                                <?php
                                                    if($row["top"]==0)
                                                {
                                                ?>
                                                    <input type='hidden' name='top' value='0'>
                                                    <input type='checkbox' name='top' value='1'><label>置頂</label>
                                                <?php
                                                }
                                                    else if($row["top"]==1)
                                                {
                                                ?>
                                                    <input type='checkbox' name='top' value='1' checked><label>置頂</label>
                                                <?php
                                                }
                                                ?>
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
                    if($_POST["date"]>$getDate)
                    {
                        $keep=1;
                    }
                    else
                    {
                        $keep=0;
                    }

                    if(isset($_POST["top"]))
                    {
                        $checked = 1;
                    }
                    else
                    {
                        $checked = 0;
                    }

                    if($_POST["title"]==null || $_POST["content"]==null || $_POST["date"] ==null)
                    {
                        echo "<script>alert('請輸入資料!');location.href='AdminPostsEdit.php'</script>";
                    }
                    else
                    {
                        $sql = "UPDATE posts SET  `title` = '$_POST[title]',`content` = '$_POST[content]',`date`='$_POST[date]',`newday`='$_POST[newday]', `top`='$_POST[top]',`save`='1' , `keep` = '$keep' WHERE posts.p_id = $_SESSION[edit_p_id]";

                        mysqli_query($db_link, $sql);
                        echo "<script>alert('公告已經上傳至暫存區!');location.href='AdminPostsSave.php'</script>";
                    }
                }

                if(isset($_POST["edit"]))
                {
                    if($row["old"]!=1)     /*如果該公告不是歷史公告的話*/
                    {
                        if ($_POST["date"] > $getDate)
                        {
                            $keep = 1;
                        }
                        else
                        {
                            $keep = 0;
                        }

                        if($_POST["top"] == 1)
                        {
                            $checked = 1;
                        }
                        else
                        {
                            $checked = 0;
                        }

                        if ($_POST["title"] == NULL || $_POST["content"] == NULL)
                        {
                            echo "<script>alert('請輸入標題或內容!');location.href='AdminPostsEdit.php'</script>";
                        }
                        else if ($_POST["date"] >= $_POST["newday"])
                        {
                            echo "<script>alert('發佈日期不得大於等於首頁下架日期!');location.href='AdminPostsEdit.php'</script>";
                        }
                        else if ($_POST["date"] > $getDate)
                        {
                            $sql = "UPDATE posts SET  `title` = '$_POST[title]',`content` = '$_POST[content]',`date`='$_POST[date]',`newday`='$_POST[newday]', `top`='$checked',`save`='0' WHERE posts.p_id = $_SESSION[edit_p_id]";
                            mysqli_query($db_link, $sql);
                            echo "<script>alert('公告已經上傳待發佈專區!');location.href='AdminPostsKeep.php'</script>";
                        }
                        else
                        {
                            $sqledit = "UPDATE posts SET `top`='$checked' , `title` = '$_POST[title]', `content` = '$_POST[content]' ,`date`='$_POST[date]',`newday`='$_POST[newday]',`save`='0' WHERE posts.p_id = $_SESSION[edit_p_id] ";
                            mysqli_query($db_link, $sqledit);

                            if ($_POST['top'] == '1')
                            {
                                echo "<script>alert('公告已經上傳，且為置頂公告!');location.href='AdminPostsTop.php'</script>";
                            }
                            else if ($row['old'] == '1')
                            {
                                echo "<script>alert('公告已經上傳!');location.href='AdminOldPostsManage.php'</script>";
                            }
                            else
                            {
                                echo "<script>alert('公告已經上傳!');location.href='AdminPostsManage.php'</script>";
                            }
                        }
                    }
                    else     /*如果該公告是歷史公告的話*/
                    {
                        if($_POST["top"] == 1)
                        {
                            $checked = 1;
                        }
                        else
                        {
                            $checked = 0;
                        }
                        if ($_POST["title"] == NULL || $_POST["content"] == NULL)
                        {
                            echo "<script>alert('請輸入標題或內容!');location.href='AdminPostsEdit.php'</script>";
                        }
                        else
                        {
                            $sqledit = "UPDATE posts SET `top`='$checked', `title` = '$_POST[title]', `content` = '$_POST[content]' ,`newday`='$_POST[newday]' WHERE posts.p_id = $_SESSION[edit_p_id] ";
                            mysqli_query($db_link, $sqledit);
                            if ($_POST['top'] == '1')
                            {
                                echo "<script>alert('公告修改完成!');location.href='AdminPostsTop.php'</script>";
                            }
                            else if ($row['old'] == '1')
                            {
                                echo "<script>alert('公告修改完成!');location.href='AdminOldPostsManage.php'</script>";
                            }
                            else
                            {
                                echo "<script>alert('公告修改完成!');location.href='AdminPostsManage.php'</script>";
                            }
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
