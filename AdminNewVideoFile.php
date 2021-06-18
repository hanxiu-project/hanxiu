<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

    <title>新增影音檔案 | 管理後台</title>

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
            
			<font size="6"><strong style= "background:white" >新增影音網址</strong></font>
		
        </div>
    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/


                $sql="SELECT * FROM posts WHERE posts.p_id = $_SESSION[edit_p_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                $sqltype="SELECT * FROM `videotypes`";
                $resulttype=mysqli_query($db_link,$sqltype);

                ?>

                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="forms" method="POST" action="">

                                            <div class="form-group">
                                                <label for="type">影音類別:</label>
                                                <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:transparent">
                                                    <?php
                                                    while ($row = $resulttype->fetch_assoc())
                                                    {
                                                        echo "<option name='type' value=$row[t_id]>$row[typename]</option>";
                                                    }
                                                    $sqltypeinput="SELECT * FROM `videotypes` where `t_id`='$_POST[type]'";
                                                    $resulttypeinput=mysqli_query($db_link,$sqltypeinput);
                                                    $rowinput= mysqli_fetch_assoc($resulttypeinput);
                                                    $_SESSION[inputtype]=$rowinput['typename'];
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="vcontent">影片描述:</label>
                                                <input id="vcontent" name="vcontent" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <label for="vnet">影片網址:</label>
                                                <input id="vnet" name="vnet" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >

                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="vpost" value="發佈" >
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                $vcontent = $_POST["vcontent"];
                $vnet = $_POST["vnet"];

                if(isset($_POST["vpost"]))
                {
                    $testwatchnetpos = strpos($_POST["vnet"],"watch");          //找網址內有watch?v=的位置(算w的位置在24)
                    $testnet = substr($_POST["vnet"],"$testwatchnetpos"+8);            //取的watch?v=之後的網址字串(因為watch?v=所以+8)
                    $renewnet = substr_replace($_POST["vnet"],"embed/$testnet",$testwatchnetpos);       //新網址


                    $sqlnet="SELECT * FROM `videos` WHERE `vnet` = '$renewnet'";
                    $resultnet=mysqli_query($db_link,$sqlnet);
                    $rownet=mysqli_fetch_assoc($resultnet);

                    if($vcontent==null && $vnet==null)
                    {
                        echo "<script>alert('請輸入影片網址或影片描述!');location.href='AdminNewVideoFile.php'</script>";
                    }
                    else if( $rownet[vnet] == $renewnet)
                    {
                        echo "<script>alert('請輸入影片網址重複，請重新輸入！');location.href='AdminNewVideoFile.php'</script>";
                    }
                    else
                    {
                        $sql="INSERT INTO `videos` (v_id,t_id,typename,vcontent,vnet) VALUES('NULL','$_POST[type]','$rowinput[typename]','$vcontent','$renewnet')";
                        mysqli_query($db_link, $sql);
                        echo "<script>alert('影音已經上傳!');location.href='AdminVideosManage.php'</script>";
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