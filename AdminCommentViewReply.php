<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>

    <title>查看留言回覆 | 管理後台</title>

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
    <!--sidebar-->
    <!-- Navigation -->
     <?php include 'admin.php';?>

    <div class="row" style="margin-bottom: 20px; text-align: left; font-size: 20px; color: #ffffff">
        <div class="col-lg-12">
            查看已回覆留言
        </div>
    </div>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/
                
                session_start();

                $sql="SELECT * FROM `comments`,`members` where `comments`.`c_id` = $_SESSION[vreply_c_id] and `comments`.`status`='1'";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                ?>

                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">


                                            <div class="form-group">
                                                <label for="title">會員編號:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['m_id']?></font>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">會員帳號:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['account']?></font>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">會員姓名:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['name']?></font>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">留言日期:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['msg_datetime']?></font>
                                            </div>


                                            <div class="form-group">
                                                <label for="content">留言內容:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['message']?></font>
                                            </div>

                                            <div class="form-group">
                                                <label for="">回覆內容：</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['reply']?></font>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">回覆日期:</label>
                                                <font style="width:525px; height:30px; color:#000000; background-color:transparent" ><?php echo $row['rpy_datetime']?></font>
                                            </div>



                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
