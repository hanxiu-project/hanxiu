<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

    <title>新增照片檔案 | 管理後台</title>

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
    <?php include 'nav.php';?>
    <?php include 'database.php';?>
 <div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >新增照片檔案</strong></font>
        </div>
    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">


                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="forms" method="POST" action="" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="title">選擇照片上傳:</label>
                                            </div>


                                             <div class="form-group">
                                                 <input type="file" name="image" class="form-control p-1 " required style="width:525px; height:50px; color:#000000; background-color:transparent" >
                                             </div>


                                            <div class="form-group">
                                                <input type="submit" name="upload" value="上傳照片" class="btn btn-warning "   style="width:200px; height:40px; color:white;" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php




                    if(isset($_POST["upload"]))
                    {
                        $image = $_FILES['image']['name'];
                        $path1 = 'images/'.$image;
                        $path2 = './images/'.$image;              //$path2 = 'C:/AppServ/www/漢修專題/images/'.$image;
                        $sqlnum = "SELECT * FROM carousel";
                        $resultnum = mysqli_query($db_link,$sqlnum);
                        $rownum = mysqli_num_rows($resultnum);
                        $num = $rownum+1;

                        $sql = "INSERT INTO `carousel` (id,listorder,imgname,path1,path2) values ('NULL','$num','$image','$path1','$path2')";
                        mysqli_query($db_link, $sql);

                        if($sql)
                        {
                            move_uploaded_file($_FILES['image']['tmp_name'],$path2);
                            echo "<script>alert('照片上傳成功!');location.href='AdminImageManage.php'</script>";

                        }
                        else
                        {
                            echo "<script>alert('照片上傳失敗!');location.href='AdminNewImageFile.php'</script>";
                        }
                    }

                mysqli_close($db_link);
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