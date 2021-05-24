<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>

    <link href="csss_file/RWD.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>-->
</head>

<body >

<!--最外圍-->
<div class="sitebody">

    <?php include 'header.php'; ?>

    <!--頁首-->
    <!--包住固定不動的Header-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <!--照片區-->

    <div class="photo">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="10000">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="10000">
                        <ol class="carousel-indicators">

                            <?php
                            $sql1 = "SELECT path1 FROM carousel ORDER BY listorder ";
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
                                        <img src="<?php echo $row1[path1]; ?>" class="d-block w-100"  alt="...">
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="carousel-item ">
                                        <img src="<?php echo $row1[path1]; ?>" class="d-block w-100"alt="...">
                                    </div>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
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
	
    <div class="content">
	 <?php
          echo "</br>";
            ?>
                   
		    <div class="newstitle">
            <h2>｜會員登入 </h2>
            </div>
        
           
                       
                    
          

            <center>
				<div class="tableforcontent" align="center">

                <form name="login01" method="post" action="">
                <font>帳號：</font><input type="text" name="account"><br><br>
                <font>密碼：</font><input type="password" name="password"><br>
                <a href="forgotpwd.php">忘記密碼？</a>
                <br><br>
                <div class="wraplogin">
                <div class="loginandregis">
                <input type="submit"style='height:40px;'name="gologin" value="登入" style="width:60px;height:40px;">
                        </div>
                     
                <div class="regis">  
                還沒註冊請註冊»   
                <input type="submit" style='height:40px;'name="goregis" value="註冊" style="width:60px;height:40px;">
                </div>
                </div>
                </form>  
                            
                               
                 </div>  
             </center>                  
        
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
            //header("location:indexs.php");
            echo "<script>location.href='indexs.php';</script>";		//導向一般會員頁面
        } else if ($authority == 1 || $authority == 2) {
			$_SESSION["updatename"]="$row[name]";
            //header("location:AdminScriptureManage.php");
            echo "<script>location.href='AdminScriptureManage.php';</script>";        //導向管理員頁面
            $_SESSION["updatename"]="$row[name]";
        }

    }
    if (isset($_POST["goregis"])) {
        //header("location:registered.php");
        echo "<script>location.href='registered.php';</script>";
    }
    //mysqli_close($db_link);
    ?>
    




</div>



<!--註腳-->



</body>
<?php include 'footer.php'; ?>

</html>