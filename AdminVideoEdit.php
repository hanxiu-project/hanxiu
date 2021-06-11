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
                /*資料庫連結*/


                $sql="SELECT * FROM videos WHERE videos.v_id = $_SESSION[edit_v_id]";
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
                                                <label for="vcontent">影片描述:</label>
                                                <textarea id="vcontent" name="vcontent" rows="10" cols="80"><?php echo $row['vcontent']?></textarea>
                                                <script>
                                                    CKEDITOR.replace('vcontent',{
                                                        width:1650,height:500,
                                                    });
                                                </script>
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


                if(isset($_POST["edit"]))
                {
                    if($_POST["vcontent"] == NULL )
                    {
                        echo "<script>alert('請輸入影片描述!');location.href='AdminVideoEdit.php'</script>";
                    }
                    else
                    {
                        $sqledit = "UPDATE videos SET `vcontent` = '$_POST[vcontent]'WHERE videos.v_id = $_SESSION[edit_v_id] ";
                        mysqli_query($db_link, $sqledit);
                        echo "<script>alert('影音修改完成!');location.href='AdminVideosManage.php'</script>";
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
