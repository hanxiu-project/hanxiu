<html>

<head>

    <title>忘記密碼</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="csss_file/topic.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>


</head>

<body>
<!--最外圍-->
<div id="sitebody">


    <!--頁首-->
    <!--包住固定不動的Header-->
    <?php include 'header.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <!--照片區-->
    <div id="photo">

        <div id="container">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $sql1 = "SELECT path1 FROM carousel ORDER BY listorder ";
                    $result1 = mysqli_query($db_link,$sql1);
                    $rowcount =  mysqli_num_rows($result1);
                    $i = 0;
                    foreach ($result1 as $row1)
                    {
                        if ($i == 0)
                        {
                            ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>" class="<?php $actives; ?>"></li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>"></li>
                            <?php
                        }
                        $i++;
                    } ?>
                </ol>

                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($result1 as $row1)
                    {
                        if ($i == 0)
                        {
                            ?>
                            <div class="carousel-item active ">
                                <img src="<?php echo $row1[path1]; ?>" class="d-block w-100" height="500px" alt="...">
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="carousel-item ">
                                <img src="<?php echo $row1[path1]; ?>" class="d-block w-100" height="500px" alt="...">
                            </div>
                            <?php
                        }
                        $i++;
                    }
                    ?>

                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>


            </div>

        </div>
    </div>


    <!--左邊欄位
    <div id="sidebar_left">sidebar_left</div>




    右邊欄位
    <div id="sidebar_right">sidebar_right</div>-->


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <h2>｜ 忘記密碼 </h2>
            <div class="tablelist">

                <div class="login">
                    <center>
                        <form name="login01" method="post" action="">
                            <font>輸入您註冊的電子郵件，並至信箱收取確認信：</font><input type="email" name="checkemail"><br><br>
                            <br><br>
                            <input type="submit" style='width:120px; height:40px;color:black;background-color:#C7B897;border:0px none;' name="go" value="送出" style="width:60px;height:40px;">
                        </form>
                    </center>
                </div>

            </div>

        </div>
    </div>

    <?php


    $sql_login = "SELECT * FROM `members` WHERE `email` = '$_POST[checkemail]'";
    $result = mysqli_query($db_link, $sql_login);
    $row = mysqli_fetch_assoc($result);                        //查詢資料庫
    $email = $_POST[checkemail];                                        //查詢到email
    $u = $row["name"];

    $_SESSION["verified"] = $row["verified"];

    if (isset($_POST["go"])) {
        if ($email != $_POST[checkemail]) {
            echo "<script>alert('e-mail與會員帳號不符');location.href='forgotpwd.php'</script>";
        } else {
            $fgpwd = md5(time() . $u);
            $sql_login = "SELECT * FROM `members` WHERE `email` = '$_POST[checkemail]'";
            mysqli_query($db_link, $sql_login);
            if ($sql_login) {

                include('PHPMailer/PHPMailerAutoload.php');
                $mail = new PHPMailer();
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->isHTML();
                $mail->Username = 'xuj8906@gmail.com';
                $mail->Password = '3acc732087p';
                $mail->setFrom('crazy32968@gmail.com');
                $mail->Subject = '漢修學院｜重設您的會員密碼';
                $mail->Body = "<a href='http://localhost/漢修專題/resetpwd.php?fgpwd=$fgpwd'>重設密碼</a>";
                $mail->addAddress("$email");
                $mail->SMTPDebug = 3;

                if (!$mail->Send()) {
                    echo "Error" . $mail->ErrorInfo;
                } else {

                    echo "<script>alert('已寄出重設密碼郵件，請到email收取信件！');location.href='indexs.php'</script>";
                }

            }
        }


    }

    //mysqli_close($db_link);
    ?>
</div>

<!--註腳-->
<?php include 'footer.php'; ?>

</div>
</body>
</html>