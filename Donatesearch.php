<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>經文管理 | 管理後台</title>

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
<form name="formsearchdoante" method="post" action="">
<div id="wrapper">
    <?php include 'nav.php';?>
    <?php include 'database.php';?>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/
                $db_ip="127.0.0.1";
                $db_user="root";
                $db_pwd="123456789";
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");


                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                $sql_mid = "SELECT * FROM `donates` where dname like'%$_SESSION[sdonatemember]%' || m_id like '%$_SESSION[sdonatemember]%'  ";
                $result= mysqli_query($db_link,$sql_mid);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table  width=100% style=font-size:20px;line-height:50px;>";
                echo "<tr align=center>";
                echo "<td>捐獻者ID</td>";
                echo "<td>捐獻者</td>";
                echo "<td>捐獻內容</td>";
				echo "<td>捐獻數量</td>";
				echo "<td>捐獻日期</td>";
                echo "<td></td>";
                echo "</tr>";
                while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
                   echo "<td>$row[m_id]</td>";
                    echo "<td>$row[dname]</td>";
                    echo "<td>$row[type]</td>";
					echo "<td>$row[amount]</td>";
					echo "<td>$row[date]</td>";
                    ?>
					<td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[d_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這筆捐贈?')"></td>
					<?php
                    echo "</tr>";
                }
                echo "</table>";

                $sql2 = "SELECT * FROM `members`";
                $result2=mysqli_query($db_link,$sql2);

                while($row2=$result2->fetch_assoc()) {
                    if (isset($_POST["$row2[m_id]+1"])) {
                        $_SESSION["edit_m_id"]=$row2["m_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'DonatemanageEdit.php'";
                        echo "</script>";
                    }

                }

                    mysqli_close($db_link);
                ?>
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
