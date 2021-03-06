<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>公告管理 | 管理後台</title>

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

    <!---->
    <div class="row" style="margin-bottom: 20px;text-align: left; font-size: 20px; color: #ffffff">
        <div class="col-lg-12">
           未回覆留言
        </div>
    </div>

    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                /*資料庫連結*/
               
                session_start();


               

                $sql = "SELECT `c_id`,`comments`.`m_id`,`account`,`name`,`message`,`msg_datetime` FROM `comments`,`members`  where `members`.`m_id` = `comments`.`m_id` and `comments`.`status`='0' ORDER BY msg_datetime DESC";
                $result= mysqli_query($db_link,$sql);

                echo "<form name='form1' method='POST' action=''>";
                echo "<table  width=100% style=font-size:24px; >";
                echo "<tr align=center>";
                echo "<td>會員編號</td>";
                echo "<td>會員帳號</td>";
                echo "<td>會員姓名</td>";
                echo "<td>留言內容</td>";
                echo "<td>留言時間</td>";
                echo "</tr>";
                while($row=$result->fetch_assoc())
                {
                    echo "<tr align=center>";
                    echo "<td>$row[m_id]</td>";
                    echo "<td>$row[account]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[message]</td>";
                    echo "<td>$row[msg_datetime]</td>";
                    echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[c_id]+1' value='回覆'></td>";
                    ?>
                    <td><input type='submit' class="btn btn-sm btn-danger "  style='width:100px;height:30px;'name="<?php echo "$row[m_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除這位管理員?')"></td><?php

                    echo "</tr>";
                }
                echo "</table>";



                $sql2 = "SELECT * FROM `comments`";
                $result2=mysqli_query($db_link,$sql2);

                while($row2=$result2->fetch_assoc()) {
                    if (isset($_POST["$row2[c_id]+1"])) {
                        $_SESSION["reply_c_id"]=$row2["c_id"];
                        echo "<script langauge = 'javascript' type='text/javascript'>";
                        echo "window.location.href = 'AdminCommentReply.php'";
                        echo "</script>";
                    }

                    //刪除還沒做

                   /* if (isset($_POST["$row2[v_id]+2"])) {
                        $_SESSION["delete_v_id"]=$row2["v_id"];
                        $sql_delete="DELETE FROM videos WHERE videos.v_id = $_SESSION[delete_v_id]";
                        mysqli_query($db_link, $sql_delete);
                        echo "<script>alert('成功刪除!');location.href='AdminCommentManagefor1.php'</script>";
                    }*/
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