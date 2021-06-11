<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

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

                //echo "<script>alert('$_SESSION[vreply_c_id]')</script>";

                $sqlall = "SELECT * FROM `comments` WHERE `c_id`= '$_SESSION[vreply_c_id]' and `m_id`= '$_SESSION[vreply_m_id]'";
                //$sqlall = "SELECT * FROM `comments`";
                $resultall=mysqli_query($db_link,$sqlall);
                $rowall=mysqli_fetch_assoc($resultall);



                $sql = "SELECT `c_id`,`comments`.`m_id`,`members`.`account`,`members`.`name`,`replyman`,`msg_datetime`,`message`,`reply`,`rpy_datetime` FROM `comments`,`members` where `comments`.`status`='1' and `members`.`m_id` = '$_SESSION[vreply_m_id]' and `comments`.`message`= '$rowall[message]'";




                //$sql="SELECT `c_id`,`members`.`m_id`,`members`.`account`,`members`.`name`,`replyman`,`msg_datetime`,`message`,`reply`,`rpy_datetime` FROM `comments`,`members` where `comments`.`c_id` = '$_SESSION[vreply_c_id]' and `comments`.`status`='1' and `members`.`m_id` = '$_SESSION[vreply_m_id]'";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);


                $commentresult[msg] = mysqli_query($db_link, $sql);

                ?>

                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                    <?php
                                        while($rowmsgdata = mysqli_fetch_assoc($commentresult[msg]))
                                        {
                                            echo "<div class='form-group'>";
                                            echo "<label for='title'>會員編號:</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[m_id]</font>";
                                            echo "</div>";
                                            echo "<div class='form-group''>";
                                            echo "<label for='title'>會員帳號:</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[account]</font>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='title'>會員姓名:</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[name]</font>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                            echo "<label for='date'>留言日期:</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[msg_datetime]</font>";
                                            echo "</div>";


                                            echo "<div class='form-group'>";
                                            echo "<label for='content'>留言內容:</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[message]</font>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                            echo "<label for=''>回覆人員：</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[replyman]</font>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                            echo "<label for=''>回覆內容：</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[reply]</font>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                            echo "<label for=''>回覆日期：</label>";
                                            echo "<font style='width:525px; height:30px; color:#000000; background-color:transparent' >$rowmsgdata[rpy_datetime]</font>";
                                            echo "</div>";

                                           echo "<hr style='background-color:black; height:1px; border:none;'>";
                                        }
                                        ?>



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
