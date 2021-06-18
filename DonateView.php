<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>捐獻總覽 | 管理後台</title>

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
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
<?php
session_start();
include 'verification.php';
?>
<form name="forms" method="get" action="">

    <div id="wrapper">
        <?php include 'nav.php'; ?>
        <?php include 'database.php'; ?>

        <?php
        /*資料庫連結*/

        $sqltype = "SELECT * FROM donates ";
        $resulttype = mysqli_query($db_link, $sqltype);

        ?>
        <!--建立新公告-->
        <div class="row" style="margin-bottom: 20px; text-align: left">
            <div class="col-lg-12">
                <input type="text" name="sdonatemember" Placeholder="輸入姓名或編號">

                <input type="submit" name="gosearchm" class="btn btn-success  " value="搜尋" style="left">

                <select name="sort" value="date"
                        style="width:525px; height:30px; color:#000000; background-color:white">
                    <option>請選擇排序方式</option>
                    <optgroup label="根據金錢">
                        <option value="1">由低到高</option>
                        <option value="2">由高到低</option>
                    </optgroup>

                    <optgroup label="根據日期">
                        <option value="5">由新至舊</option>
                        <option value="6">由舊至新</option>

                    </optgroup>
                </select>
                <input type="submit" name="gosort" class="btn btn-success  " value="排序" style="left">
            </div>
        </div>
</form>
<div class="col-lg-12">

    <font size="6"><strong style="background:white">捐獻總覽</strong></font>

</div>
<!--Body-->
<div id="page-wrapper">

    <div class="container-fluid">

        <div class='wrapper'>
            <meta http-equiv="content-type" content="text/html;charset=UTF-8">

            <?php

            mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

            $sql = "SELECT * FROM donates";
            $result = mysqli_query($db_link, $sql);
            $resultfortd = mysqli_query($db_link, $sql);
            $rowfortd = $resultfortd->fetch_assoc();
            echo "<form name='form1' method='POST' action=''>";
            echo "<table border=1 width=100% style=font-size:24px;line-height:50px; >";
            echo "<tr align=center>";
            echo "<td>捐獻者ID</td>";
            echo "<td>捐獻者</td>";
            echo "<td>捐獻內容</td>";
            echo "<td>捐獻數量</td>";
            echo "<td>捐獻日期</td>";
            if ($rowfortd["m_id"] != null) {
                echo "<td></td>";

            }
            echo "</tr>";


            /*排序*/
            /**/
            if(isset($_GET["gosearchm"]))
            {
                $sql_mid = "SELECT * FROM `donates` where dname like'%$_GET[sdonatemember]%' || m_id like '%$_GET[sdonatemember]%'  ";
                $result= mysqli_query($db_link,$sql_mid);

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
            }
            else if (!($_GET["gosort"]))
            {
                $sqlsort = "SELECT * FROM donates  ";
                $resultsort = mysqli_query($db_link, $sqlsort);

                $date_nums = mysqli_num_rows($resultsort);                          //講記數量
                $per = 10;                                                      //10筆換頁
                $pages = ceil($date_nums / $per);                             //共幾頁
                if (!isset($_GET["page"])) {
                    $page = 1;
                } else {
                    $page = intval($_GET["page"]);                              //確認頁數只能是數值資料
                }

                $start = ($page - 1) * $per;

                $sqlresult = "SELECT * FROM donates Limit $start , $per";
                $scriptureresult[$start] = mysqli_query($db_link, $sqlresult);
                $scriptureresult[$page] = mysqli_query($db_link, $sqlresult);


                while ($row = mysqli_fetch_assoc($scriptureresult[$start])) {
                    echo "<tr align=center>";
                    echo "<td>$row[m_id]</td>";
                    echo "<td>$row[dname]</td>";
                    echo "<td>$row[type]</td>";
                    echo "<td>$row[amount]</td>";
                    echo "<td>$row[date]</td>";
                    ?>
                    <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[d_id]+2"; ?>"
                               value='刪除' onclick="return confirm('是否確認刪除這筆捐贈?')"></td>

                    <?php
                    echo "</tr>";

                }

                echo "</form>";
                echo "</table>";
                echo "<center>";
                echo '共 ' . $date_nums . ' 筆-在 ' . $page . ' 頁-共 ' . $pages . ' 頁';
                echo "<br/><a href=?page=1>首頁</a> ";
                echo "第 ";
                for ($i = 1; $i <= $pages; $i++) {
                    if ($page - 10 < $i && $i < $page + 10) {
                        echo "<a href=?page=$i>" . $i . "</a> ";
                    }
                }
                echo " 頁 <a href=?page=$pages>末頁</a>";
                echo "</center>";
            }
            else if (isset($_GET["gosort"])) {
                if ($_GET[sort] == 1) {
                    $sqlsort = "SELECT * FROM donates order by amount ASC  ";
                    $resultsort = mysqli_query($db_link, $sqlsort);
                } else if ($_GET[sort] == 2) {
                    $sqlsort = "SELECT * FROM donates order by amount DESC  ";
                    $resultsort = mysqli_query($db_link, $sqlsort);
                } else if ($_GET[sort] == 5) {
                    $sqlsort = "SELECT * FROM donates order by date DESC  ";
                    $resultsort = mysqli_query($db_link, $sqlsort);
                } else if ($_GET[sort] == 6) {
                    $sqlsort = "SELECT * FROM donates order by date ASC  ";
                    $resultsort = mysqli_query($db_link, $sqlsort);
                }

                $date_nums = mysqli_num_rows($resultsort);                             //講記數量
                //$date_nums = mysqli_num_rows($sqltype);
                $per = 10;                                                      //10筆換頁
                $pages = ceil($date_nums / $per);                             //共幾頁
                if (!isset($_GET["page"])) {
                    $page = 1;
                } else {
                    $page = intval($_GET["page"]);                              //確認頁數只能是數值資料
                }
                $start = ($page - 1) * $per;
                $sqlresultsort = "$sqlsort Limit $start , $per";
                $sortresult[src] = mysqli_query($db_link, $sqlresultsort);

                while ($row = mysqli_fetch_assoc($sortresult[src])) {
                    echo "<tr align=center>";
                    echo "<td>$row[m_id]</td>";
                    echo "<td>$row[dname]</td>";
                    echo "<td>$row[type]</td>";
                    echo "<td>$row[amount]</td>";
                    echo "<td>$row[date]</td>";
                    ?>
                    <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[d_id]+2"; ?>"
                               value='刪除' onclick="return confirm('是否確認刪除這筆捐贈?')"></td>

                    <?php
                    echo "</tr>";

                }
                echo "</form>";
                echo "</table>";
                echo "<center>";
                echo '共 ' . $date_nums . ' 筆-在 ' . $page . ' 頁-共 ' . $pages . ' 頁';
                echo "<br/><a href=?type=$_GET[type]&gotype=查看講記類別&page=1>首頁</a> ";
                echo "第 ";
                for ($i = 1; $i <= $pages; $i++) {
                    if ($page - 10 < $i && $i < $page + 10) {
                        echo "<a href=?type=$_GET[type]&gotype=查看講記類別&page=$i>" . $i . "</a> ";
                    }
                }
                echo " 頁 <a href=?type=$_GET[type]&gotype=查看講記類別&page=$pages>末頁</a>";
                echo "</center>";

            }

            $sql2 = "SELECT * FROM donates";
            $result2 = mysqli_query($db_link, $sql2);

            while ($row2 = $result2->fetch_assoc()) {
                if (isset($_POST["$row2[d_id]+1"])) {
                    $_SESSION["edit_d_id"] = $row2["d_id"];
                    echo "<script langauge = 'javascript' type='text/javascript'>";
                    echo "window.location.href = 'AdminPostsEdit.php'";
                    echo "</script>";
                }

                if (isset($_POST["$row2[d_id]+2"])) {
                    $_SESSION["delete_d_id"] = $row2["d_id"];
                    $sql_delete = "DELETE FROM donates WHERE donates.d_id = $_SESSION[delete_d_id]";
                    mysqli_query($db_link, $sql_delete);
                    echo "<script>alert('成功刪除!');location.href='DonateView.php'</script>";
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