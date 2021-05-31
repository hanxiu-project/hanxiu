<html>
<head>

    <title>會員註冊</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="csss_file/RWDforarticle.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

</head>

<body>



    <meta http-equiv="content-type" content="text/html;charset=UTF-8">


    <!--最外圍-->
<div class="sitebody">


        <!--頁首-->
        <!--包住固定不動的Header-->
      <?php include 'header.php'; ?>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous"></script>

        <!--照片區-->


   



        <?php
                    //是否為行動裝置
                    function isMobileCheck(){
                        //Detect special conditions devices
                        $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
                        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
                        $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
                        if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
                            $Android = true;
                        }else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
                            $Android = false;
                            $AndroidTablet = true;
                        }else{
                            $Android = false;
                            $AndroidTablet = false;
                        }
                        $webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
                        $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
                        $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
                        //do something with this information
                        if( $iPod || $iPhone || $iPad || $Android || $AndroidTablet || $webOS || $BlackBerry || $RimTablet){
                            return true;
                        }else{
                            return false;
                        }
                    } 
?>



    <span style="font-family:微軟正黑體,serif;">
    <div class="content">
        <!--主內文區-->
     <div class="tableforcontent">
        
            <div class="newstitle">
                    <br>
                    <h2>｜會員註冊</h2>
            </div>
                    <form name="registered" method="post" action="">
                        <table class="registered" >


                            <tr>
                                <td><label for="account" accesskey="N">&emsp;&emsp;帳號:</label><input
                                            type="text" style="font size:20px; padding:6px;" name="account" id="account" pattern="^([a-zA-Z]+\d+|\d+[a-zA-Z]+)[a-zA-Z0-9]*$" minlength="8" maxlength="12" title="請最少輸入8-12位英文與數字"
                                            required autofocus placeholder="必填"><br>
                                </td>
                            </tr>

                            <tr>
                                <td ><label for="password" accesskey="N">&emsp;&emsp;密碼:</label><input
                                            type="password" style="font size:20px; padding:6px;" name="password" pattern="^([a-zA-Z]+\d+|\d+[a-zA-Z]+)[a-zA-Z0-9]*$" minlength="8" maxlength="12" title="請最少輸入8-12位英文與數字"
                                            id="password" required autofocus placeholder="必填"> </br>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="confirmpassword"
                                                                                          accesskey="N">確認密碼:</label><input
                                            type="password" style="font size:20px; padding:6px;" name="confirmpassword" 
                                            id="confirmpassword" required autofocus placeholder="必填"> </br>
                                </td>
                            </tr>

                            <tr>
                                <td ><label for="name"
                                                                                          accesskey="N">會員姓名:</label><input
                                            type="text" style="font size:20px; padding:6px;" name="name" id="name"
                                            required autofocus placeholder="必填"> </br>
                                </td>
                            </tr>

                            <tr>
                                <td >會員性別:<input type="radio" name="sex"
                                                                                               value="男">男<input
                                            type="radio" name="sex" value="女">女<br>
                                </td>
                            </tr>

                            <tr>
                                <td ><label for="email" accesskey="N">會員信箱:</label><input
                                            type="email" style="font size:20px; padding:6px;" name="email" id="email"
                                            required autofocus placeholder="必填"><br>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="telephone" accesskey="N">會員行動:</label><input
                                            type="text" style="font size:20px; padding:6px;" name="telephone"
                                            id="telephone" required autofocus placeholder="必填"><br>
                                </td>
                            </tr>

                            <tr>
                                <?php
                                if(isMobileCheck()){
                                    ?>
                                    <td><label for="address" accesskey="N">會員地址:</label><input
                                    type="text" style="font size:20px; padding:6px;  width:250px;"
                                    name="address" id="address" required autofocus placeholder="必填"> </br>
                                </td>
                                <?php
                                }else{?>
                                    <td><label for="address" accesskey="N">會員地址:</label><input
                                    type="text" style="font size:20px; padding:6px;  width:300px;"
                                    name="address" id="address" required autofocus placeholder="必填"> </br>
                                </td>
                                <?php

                                }
                                ?>
                              
                            </tr>

                            
                                </br>

                        </table>
                            <div class="loginandregis">
                                            <input type="submit" name="gore" value="註冊">
                            </div>
                    </form>
                 <?php
          
            $sql = "SELECT * FROM `members` where `account`='$_POST[account]'";
            mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
            $result = mysqli_query($db_link, $sql) or die("查詢失敗");
            $row = mysqli_fetch_assoc($result);
            $idcheck = $row[account];


            /*註冊按鈕*/

            if (isset($_POST["gore"]))
            {
                $u = $_POST['account'];
                $p = $_POST['password'];
                $e = $_POST['email'];

                if ($_POST[account] == null || $_POST[password] == null || $_POST[confirmpassword] == null || $_POST[name] == null || $_POST[sex] == null || $_POST[email] == null || $_POST[telephone] == null || $_POST[address] == null) {
                    echo "<script>alert('請輸入必填欄位');location.href='registered.php'</script>";
                } else if ($idcheck == $_POST[account]) {
                    echo "<script>alert('帳號已被使用請重新輸入');location.href='registered.php'</script>";
                } else if ($_POST[password] != $_POST[confirmpassword]) {
                    echo "<script>alert('確認密碼不符，請重新輸入');location.href='registered.php'</script>";
                } else {
                    /*$sqlii = "INSERT INTO `members` (account,password,name,gender,email,address,telephone,authority) VALUES('$_POST[account]','$_POST[password]','$_POST[name]','$_POST[sex]','$_POST[email]','$_POST[address]','$_POST[telephone]','0')";
                    mysqli_query($db_link, $sqlii);*/


                    $vkey = md5(time().$u);
                    $sql_insert = "INSERT INTO `members` (account,password,name,gender,email,address,telephone,authority,vkey) VALUES ('$_POST[account]','$_POST[password]','$_POST[name]','$_POST[sex]','$_POST[email]','$_POST[address]','$_POST[telephone]','0','$vkey')";
                    mysqli_query($db_link, $sql_insert);

                    if ($sql_insert) {

                        include('PHPMailer/PHPMailerAutoload.php');
                        $email = new PHPMailer();
                        $email->CharSet = 'UTF-8';
                        $email->isSMTP();
                        $email->SMTPAuth = true;
                        $email->SMTPSecure = 'ssl';
                        $email->Host = 'smtp.gmail.com';
                        $email->Port = '465';
                        $email->isHTML();
                        $email->Username = 'xuj8906@gmail.com';
                        $email->Password = '3acc732087p';
                        $email->setFrom('crazy32968@gmail.com');
                        $email->Subject = 'Email驗證信';
                        $email->Body = "<a href='http://localhost/漢修專題/verify.php?vkey=$vkey'>註冊帳號</a>";
                        $email->addAddress("$e");
                        $email->SMTPDebug = 3;


                        if (!$email->Send()) {
                            echo "Error" . $email->ErrorInfo;
                        } else {

                            echo "<script>alert('感謝註冊，請到email收取驗證信！');location.href='indexs.php'</script>";
                        }

                    }

                }
            }
            ?>
           
           </div>
            
        </div>
    </span>
 

</div>

<!--註腳-->
<?php include 'footer.php'; ?>
</body>
 

</html>