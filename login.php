<html>

<head>

    <title>會員登入</title>


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
    <?php include 'header.php'; ?>

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
                            $sql1 = "SELECT path1 FROM carousel";
                            $result1 = mysqli_query($db_link,$sql1);
                            $rowcount =  mysqli_num_rows($result1);
                            $i = 0;
                            foreach ($result1 as $row1)
                            {
                                $actives = '';
                                if ($i == 0)
                                {
                                    $actives = 'active';
                                }
                                ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>" class="<?php $actives; ?>"></li>
                                <?php $i++; } ?>

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
            <h2>｜ 會員登入 </h2>
            <div class="tablelist">

                <div class="login">
                    <center>
                        <form name="login01" method="post" action="">

                            <font>帳號：</font><input type="text" name="account"><br><br>
                            <font>密碼：</font><input type="password" name="password"><br>
                            <a href="forgotpwd.php">忘記密碼？</a>
                            <br><br>

                            <input type="submit"
                                   style='width:120px; height:40px;color:black;background-color:#C7B897;border:0px none;'
                                   name="gologin" value="登入" style="width:60px;height:40px;">
                            <div id="loginandre">
                                <div id="regis">還沒註冊請註冊»
                                    <input type="submit"
                                           style='width:100px; height:40px;color:black;background-color:#C7B897;border:0px none;'
                                           name="goregis" value="註冊" style="width:60px;height:40px;">
                                </div>
                            </div>
                        </form>
                    </center>
                </div>

            </div>
        </div>
    </div>

    <?php
    $_SESSION['acc'] = $_POST["account"];                            //session存帳號密碼
    $_SESSION['pwd'] = $_POST["password"];

    $sql_login = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
    $result = mysqli_query($db_link, $sql_login);
    $row = mysqli_fetch_assoc($result);                        //查詢資料庫
    $acc = $row["account"];                                        //查詢到的帳號
    $pwd = $row["password"];                                        //查詢到的密碼
    $authority = $row["authority"];
    $_SESSION['name'] = $row["name"];
    $_SESSION['m_id'] = $row["m_id"];
    $_SESSION["verified"] = $row["verified"];

    if (isset($_POST["gologin"])) {
        if ($_POST["account"] == null || $_POST["password"] == null) {
            echo "<script>alert('請輸入帳號或密碼！');location.href='login.php'</script>";
        } else if ($acc != $_SESSION["acc"] || $pwd != $_SESSION["pwd"]) {
            echo "<script>alert('帳號或密碼錯誤！請重新輸入。');location.href='login.php'</script>";
        } else if ($_SESSION["verified"] == 0) {
            echo "<script>alert('帳號尚未驗證，請至email收取信驗證信。');location.href='login.php'</script>";
        } else if ($authority == 0) {
            header("location:indexs.php");
            //echo "<script>location.href='indexs.php';</script>";		//導向一般會員頁面
        } else if ($authority == 1 || $authority == 2) {
            header("location:AdminScriptureManage.php");    //導向管理員頁面
            $_SESSION["updatename"]="$row[name]";
        }

    }
    if (isset($_POST["goregis"])) {
        header("location:registered.php");
    }
    //mysqli_close($db_link);
    ?>


</div>


<!--註腳-->
<?php include 'footer.php'; ?>


</body>


</html>