<html>
<head>

    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="csss_file/cssfornophoto3.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>

</head>

<body>
<form name="registered" method="post" action="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8">


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


    <!--左邊欄位
    <div id="sidebar_left">sidebar_left</div>




    右邊欄位
    <div id="sidebar_right">sidebar_right</div>-->


    <!--主內文區-->
    <div id="content">
        <div class="newstitle">

            <div class="contentlist">
                <h2 >｜會員註冊</h2>
                <div class="tableforregis" align="center">
            
			<table width="60%" style="font-family:標楷體; font-size:18px;  solid;padding:5px;" cellpadding='5';>
					
					<tr>
						<td height="65" align="center" style="height:60px" ><label for="account" accesskey="N">&emsp;&emsp;帳號:</label><input type="text" style="font size:20px; padding:6px;" name="account"id="account" required autofocus placeholder="必填"><br>
						</td>
					</tr>

					<tr>
						<td height="65" align="center" style="height:60px"><label for="password" accesskey="N">&emsp;&emsp;密碼:</label><input type="password" style="font size:20px; padding:6px;" name="password" id="password" required autofocus placeholder="必填"> </br>
						</td>
					</tr>

					<tr>
						<td height="65" align="center" style="height:60px"><label for="confirmpassword" accesskey="N">確認密碼:</label><input type="password" style="font size:20px; padding:6px;" name="confirmpassword" id="confirmpassword" required autofocus placeholder="必填"> </br>
						</td>
                    </tr>

					<tr>
						<td height="65" align="center" style="height:60px"><label for="name" accesskey="N">會員姓名:</label><input type="text" style="font size:20px; padding:6px;" name="name" id="name" required autofocus placeholder="必填"> </br>
						</td>
                    </tr>

					<tr>
						<td height="65" align="center" style="height:60px">會員性別:<input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女">女<br>
						</td>
                    </tr>

					<tr>
						<td height="65" align="center" style="height:60px"><label for="email" accesskey="N">會員信箱:</label><input type="gmail" style="font size:20px; padding:6px;" name="email" id="email" required autofocus placeholder="必填"><br>
						</td>
                    </tr>

					<tr>
						<td height="65" align="center" style="height:60px"><label for="telephone" accesskey="N">會員行動:</label><input type="text" style="font size:20px; padding:6px;" name="telephone" id="telephone" required autofocus placeholder="必填"><br>
						</td>
                    </tr>

                    <tr>
						<td height="65" align="center" style="height:60px"><label for="address" accesskey="N">會員地址:</label><input type="text" style="font size:20px; padding:6px;  width:450px;" name="address" id="address" required autofocus placeholder="必填"> </br>
                        </td>
                    </tr>

            <div id="loginandre">
						</br>

                <tr>
                    <td height="65" align="center" style="height:60px">
                        <input type="submit" style='width:120px; height:40px;color:black;background-color:#C7B897;border:0px none;' name="gore" value="註冊" style="width:60px;height:40px;">
                    </td>

                </tr>

            </div>

				</table>

        </div>


    </div>
	</div>
    <?php
	/*資料庫連結*/
	
	$db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
	$sql = "SELECT * FROM `members`";
	mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
	$result=mysqli_query($db_link,$sql)or die("查詢失敗");
	$row=mysqli_fetch_assoc($result);
	$idcheck=$row[account];
  
  
  
	/*註冊按鈕*/
		
	if(isset($_POST["gore"]))
		if($_POST[account] == null || $_POST[password] == null || $_POST[confirmpassword] == null || $_POST[name] == null || $_POST[sex] == null || $_POST[email] == null || $_POST[telephone] == null || $_POST[address] == null){
		echo "<script>alert('請輸入必填欄位');location.href='registered.php'</script>";
		}
		else if($idcheck == $_POST[account]){
			echo "<script>alert('已有相同帳號');location.href='registered.php'</script>";
		}
		
			else {
				$sqlii="INSERT INTO `members` (account,password,name,gender,email,address,telephone,authority) VALUES('$_POST[account]','$_POST[password]','$_POST[name]','$_POST[sex]','$_POST[email]','$_POST[address]','$_POST[telephone]','0')";
	mysqli_query($db_link, $sqlii);
	echo "<script>alert('註冊成功');location.href='login.php'</script>";
			}
		


	?>
    <!--註腳-->
 <?php include 'footer.php';?>


</div>

</body>


</html>