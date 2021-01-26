<html>
<head>

    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./csss_file/cssfornophoto3.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

</head>

<body>

<?php
$db_ip = "127.0.0.1";
$db_user = "root";
$db_pwd = "123456789";
$db_link = @mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
mysqli_query($db_link, 'SET CHARACTER SET utf8');
//載入資料庫連線與啟用session
//include("sql.php");
session_start();

?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">


<!--最外圍-->
<div id="sitebody">


    <!--頁首-->
    <!--包住固定不動的Header-->
    <div id="header2">

        <div id="header">
            <img src="logo3.jpg" align="left" width="auto" height="100">
            <div id="wrapnav1">
                <nav>
                    <ul class="flex-nav ">
                        <?php
                        $sql_search_acc = "SELECT * FROM `members` WHERE `account` = '$_SESSION[acc]'";
                        $resultsrchacc = mysqli_query($db_link, $sql_search_acc);
                        $rows = mysqli_fetch_assoc($resultsrchacc);
                        $acc = $rows["account"];
                        $name = $rows["name"];

                        if ($_SESSION[acc] == null) {
                            echo "<li>";
                            echo "<a href='login.php'>登入</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='registered.php'>註冊</a>";
                            echo "</li>";
                        } else if ($acc == $_SESSION['acc']) {

                            echo "<li>";
                            echo "<a href='#'><b>$name</b>，您好</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='logout.php' >登出</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </nav>

            </div>
            <div id="wrapnav2">
                <nav>
                    <ul class="flex-nav ">
                        <li><a href="indexs.php">回首頁</a></li>
                        <li><a href="articletype.php">經文閱讀</a></li>
                        <li><a href="news.php">最新公告</a></li>
                        <li><a href="Memberdonates.php">查看捐獻</a></li>
                        <li><a href="MemberProfile.php">個人資料</a></li>
                        <li><a href="?">留言區</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <!--照片區-->


    <!--左邊欄位
    <div id="sidebar_left">sidebar_left</div>




    右邊欄位
    <div id="sidebar_right">sidebar_right</div>-->


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">
            <div class="contentlist">
                <?php

                $db_ip="127.0.0.1";
                $db_user="root";
                $db_pwd="123456789";
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
                mysqli_query($db_link, 'SET CHARACTER SET utf8');


                $sql = "SELECT * FROM members where account = '$_SESSION[acc]'";
                $result = mysqli_query($db_link, $sql);
                $row = mysqli_fetch_assoc($result);

                ?>
                <h3>|個人資料</h3>
                <div class="table" align="center">
                    <form name="form" method="post" action="">
                    <table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all" cellpadding='5'; >
                        <tr align="center">
                            <tr>
                                <td height="65"  align="center" style="height:60px" >
                                    <label for="account" accesskey="N">&emsp;&emsp;帳號:</label>
                                    <input type="text" style="font size:20px; padding:6px;" name="account" id="account" value="<?php echo $row[account]; ?>" readonly="readonly">
                                </td>
                            </tr>

                            <tr>
                                <td height="65" align="center" style="height:60px">
                                    <label for="password" accesskey="N">&emsp;&emsp;密碼:</label>
                                    <input type="password" style="font size:20px; padding:6px;" name="password" id="password" value="<?php echo $row[password]; ?>" readonly="readonly"><br>

                                    <div class="accordion" id="accordionExample2">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2"
                                                aria-expanded="false" aria-controls="collapse2">
                                            編輯
                                        </button>
                                        <div id="collapse2" class="collapse show " aria-labelledby="heading2" data-parent="#accordionExample2">
                                            <label for="e_password" accesskey="N">&emsp;&emsp;舊密碼:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_oldpassword" id="e_password" value="<?php echo $row[password]; ?>" readonly="readonly"><br>
                                            <label>&emsp;&emsp;新密碼:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_newpassword"><br>
                                            <label>&emsp;重新輸入新密碼:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_repassword">
                                            <input type="submit" name="edit_password" value="修改">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td height="65" align="center" style="height:60px"><label for="name" accesskey="N">會員姓名:</label>
                                    <input type="text" style="font size:20px; padding:6px;" name="name" id="name" value="<?php echo $row[name]; ?>" readonly="readonly"> <br>

                                    <div class="accordion" id="accordionExample3">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3"
                                                aria-expanded="false" aria-controls="collapse3">
                                            編輯
                                        </button>
                                        <div id="collapse3" class="collapse show " aria-labelledby="heading3" data-parent="#accordionExample3">
                                            <label for="e_name" accesskey="N">&emsp;&emsp;會員姓名:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_name" id="e_name" value="<?php echo $row[name]; ?>">
                                            <input type="submit" name="edit_name" value="修改">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td height="65" align="center" style="height:60px"><label for="email" accesskey="N">會員信箱:</label>
                                    <input type="gmail" style="font size:20px; padding:6px;" name="email" id="email" value="<?php echo $row[email]; ?>" readonly="readonly"><br>

                                    <div class="accordion" id="accordionExample4">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse4"
                                                aria-expanded="false" aria-controls="collapse4">
                                            編輯
                                        </button>
                                        <div id="collapse4" class="collapse show " aria-labelledby="heading4" data-parent="#accordionExample4">
                                            <label for="e_email" accesskey="N">&emsp;&emsp;會員信箱:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_email" id="e_email" value="<?php echo $row[email]; ?>">
                                            <input type="submit" name="edit_email" value="修改">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td height="65" align="center" style="height:60px"><label for="telephone" accesskey="N">會員行動:</label>
                                    <input type="text" style="font size:20px; padding:6px;" name="telephone" id="telephone" value="<?php echo $row[telephone]; ?>" readonly="readonly"><br>

                                    <div class="accordion" id="accordionExample5">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse5"
                                                aria-expanded="false" aria-controls="collapse5">
                                            編輯
                                        </button>
                                        <div id="collapse5" class="collapse show " aria-labelledby="heading5" data-parent="#accordionExample5">
                                            <label for="e_telephone" accesskey="N">&emsp;&emsp;會員行動:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_telephone" id="e_telephone" value="<?php echo $row[telephone]; ?>">
                                            <input type="submit" name="edit_telephone" value="修改">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td height="65" align="center" style="height:60px"><label for="address" accesskey="N">會員地址:</label>
                                    <input type="text" style="font size:20px; padding:6px;  width:450px;" name="address" id="address" value="<?php echo $row[address]; ?>" readonly="readonly"> <br>

                                    <div class="accordion" id="accordionExample6">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse6"
                                                aria-expanded="false" aria-controls="collapse6">
                                            編輯
                                        </button>
                                        <div id="collapse6" class="collapse show " aria-labelledby="heading6" data-parent="#accordionExample6">
                                            <label for="e_address" accesskey="N">&emsp;&emsp;會員地址:</label>
                                            <input type="text" style="font size:20px; padding:6px;" name="e_address" id="e_address" value="<?php echo $row[address]; ?>">
                                            <input type="submit" name="edit_address" value="修改">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                        </tr>

                    </table>
                    </form>

                       <?php
                       $sqlup_password="UPDATE `members` SET `password` = '$_POST[e_newpassword]' WHERE `members`.`m_id` = $row[m_id]";

                       $sqlup_name="UPDATE `members` SET `name` = '$_POST[e_name]' WHERE `members`.`m_id` = $row[m_id]";

                       $sqlup_email="UPDATE `members` SET `email` = '$_POST[e_email]' WHERE `members`.`m_id` = $row[m_id]";

                       $sqlup_telephone="UPDATE `members` SET `telephone` = '$_POST[e_telephone]' WHERE `members`.`m_id` = $row[m_id]";

                       $sqlup_address="UPDATE `members` SET `address` = '$_POST[e_address]' WHERE `members`.`m_id` = $row[m_id]";


                       if(isset($_POST["edit_password"]))
                       {
                           if($_POST["e_newpassword"]!=null || $_POST["e_repassword"]!=null)
                           {
                               if($_POST["e_newpassword"]==$_POST["e_oldpassword"])
                               {
                                  echo "<script>alert('新密碼不能與原本密碼相同!');location.href='MemberProfile.php'</script>";
                               }
                               else if($_POST["e_repassword"]!=$_POST["e_newpassword"])
                               {
                                   echo "<script>alert('再次輸入密碼錯誤!');location.href='MemberProfile.php'</script>";
                               }
                               else
                               {
                                   mysqli_query($db_link,$sqlup_password);
                                   echo "<script>alert('修改成功!');location.href='MemberProfile.php'</script>";
                               }
                           }
                       }


                       if(isset($_POST["edit_name"]))
                       {
                           if($_POST["e_name"]!=null)
                           {
                               mysqli_query($db_link, $sqlup_name);
                               echo "<script>alert('修改成功!');location.href='MemberProfile.php'</script>";
                           }
                       }

                       if(isset($_POST["edit_email"]))
                       {
                           if($_POST["e_mail"]!=null)
                           {
                               mysqli_query($db_link, $sqlup_email);
                               echo "<script>alert('修改成功!');location.href='MemberProfile.php'</script>";
                           }
                       }

                       if(isset($_POST["edit_telephone"]))
                       {
                           if($_POST["e_telephone"]!=null)
                           {
                               mysqli_query($db_link, $sqlup_telephone);
                               echo "<script>alert('修改成功!');location.href='MemberProfile.php'</script>";
                           }
                       }

                       if(isset($_POST["edit_address"]))
                       {
                           if($_POST["e_address"]!=null)
                           {
                               mysqli_query($db_link, $sqlup_address);
                               echo "<script>alert('修改成功!');location.href='MemberProfile.php'</script>";
                           }
                       }

                       ?>

                </div>
            </div>

        </div>


    </div>

    <!--註腳-->
    <footer class="footer">版權所有 © 勤益科大</footer>


</div>

</body>


</html>