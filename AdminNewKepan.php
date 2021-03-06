<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>

    <title>新增科判 | 管理後台</title>

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
     <?php include 'admin.php';?>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                session_start();
                /*資料庫連結*/
               

                $sql="SELECT * FROM kp_types ";
                $result=mysqli_query($db_link,$sql);
               // $row=mysqli_fetch_assoc($result);

                
                ?>



                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="form" method="post" action="">

                                            <div class="form-group">
                                                <label for="type">目前科判:
                                                    <?php
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td height='65' align='center' style='height:60px'>$row[kptypename]&emsp;</td>";

                                                        echo "</tr>";
                                                    }?>
                                                </label>

                                            </div>



                                            <div class="form-group">
                                                <label for="content">增加科判:</label>
                                                <input id="type" name="type" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>



                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="go" value="發佈" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php


                $kptype = $_POST["type"];

                if(isset($_POST["go"]))
                {
                    if($kptype==null)
                    {
                        echo "<script>alert('請輸入資料!');location.href='AdminNewKepan.php'</script>";
                    }
                    else
                    {

                        $sqltype="INSERT INTO kp_types (kptypename) VALUES ('$kptype')";
                        mysqli_query($db_link, $sqltype);
                        echo "<script>alert('科判新增成功!');location.href='AdminNewKepan.php'</script>";
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
