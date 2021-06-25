<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>補充資料總覽 | 管理後台</title>

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
<form name="forms" method="get" action="">
    <div id="wrapper">
        <?php include 'nav.php';?>
        <?php include 'database.php';?>

        <?php
        /*資料庫連結*/

        $sqltype="SELECT * FROM spm_types ";
        $resulttype=mysqli_query($db_link,$sqltype);

        ?>
        <!--建立新經文-->
        <div class="row" style="margin-bottom: 20px; text-align: left">
            <div class="col-lg-12">
                <a href="AdminNewSupplement.php" class="btn btn-success  " style="left">新增補充資料類別</a>
                <a href="AdminNewSupplementFile.php" class="btn btn-success  " style="left">建立新補充資料</a>

                <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:white">
                    <option>請選擇補充資料類別</option>
                    <option value="all">全選</option>
                    <?php

                    while ($rowtype = $resulttype->fetch_assoc()) {
                        echo "<option name=typeid value=$rowtype[spmtypename]>$rowtype[spmtypename]</option>";

                    }?>               `
                </select>

                <input type="submit" class="btn btn-sm btn-warning" name="gotype" value="查看補充資料" >



            </div>

        </div>
        </form>
        <div class="col-lg-12">

            <font size="6"><strong style= "background:white" >補充資料總覽</strong></font>

        </div>
        <!--Body-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class='wrapper'>
                    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                    <?php

                    mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

                    echo "<form name='form1' method='POST' action=''>";
                    echo "<table border=1 width=100% style=font-size:20px;line-height:50px;>";
                    echo "<tr align=center>";
                    echo "<td>補充資料類別名稱</td>";
                    echo "<td>標題名稱</td>";
                    echo "<td>發佈日期</td>";
                    echo "<td>最新修改管理員</td>";
                    echo "<td>前二位修改管理員</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "</tr>";

                    if (!($_GET["type"]) || $_GET["type"]=="all")
                    {
                        $sql_tid = "SELECT * FROM supplements where save='0' order by spt_id";
                        $resultpage = mysqli_query($db_link, $sql_tid);

                        $date_nums = mysqli_num_rows($resultpage);                          //講記數量
                        $per = 10;                                                      //10筆換頁
                        $pages = ceil($date_nums / $per);                             //共幾頁
                        if (!isset($_GET["page"])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET["page"]);                              //確認頁數只能是數值資料
                        }

                        $start = ($page - 1) * $per;

                        $sqlresult = "SELECT * FROM supplements where save='0' order by spt_id Limit $start , $per";
                        $scriptureresult[$start] = mysqli_query($db_link, $sqlresult);
                        $scriptureresult[$page] = mysqli_query($db_link, $sqlresult);

                        while ($row = mysqli_fetch_assoc($scriptureresult[$start]))
                        {
                            echo "<tr align=center>";
                            echo "<td>$row[spmtypename]</td>";
                            echo "<td>$row[title]</td>";;
                            echo "<td>$row[date]</td>";
                            echo "<td>$row[newupdate]</td>";
                            echo "<td>$row[secupdate]/$row[thrupdate]</td>";
                            echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[sp_id]+1' value='編輯'></td>";
                            ?>
                            <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[sp_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

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
                    else if (isset($_GET["type"]))
                    {
                        $sqltype = "SELECT * FROM supplements WHERE spmtypename ='$_GET[type]' order by spt_id";
                        $resulttype= mysqli_query($db_link, $sqltype);
                        $date_nums = mysqli_num_rows($resulttype);                             //講記數量
                        $per = 10;                                                      //10筆換頁
                        $pages = ceil($date_nums / $per);                             //共幾頁
                        if (!isset($_GET["page"])) {
                            $page = 1;
                        } else {
                            $page = intval($_GET["page"]);                              //確認頁數只能是數值資料
                        }
                        $start = ($page - 1) * $per;

                        $sqlresultsrc = "SELECT * FROM supplements WHERE spmtypename ='$_GET[type]' order by spt_id Limit $start , $per";
                        $scriptureresult[src] = mysqli_query($db_link, $sqlresultsrc);

                        while ($row = mysqli_fetch_assoc($scriptureresult[src]))
                        {
                            echo "<tr align=center>";
                            echo "<td>$row[spmtypename]</td>";
                            echo "<td>$row[title]</td>";;
                            echo "<td>$row[date]</td>";
                            echo "<td>$row[newupdate]</td>";
                            echo "<td>$row[secupdate]/$row[thrupdate]</td>";
                            echo "<td><input type='submit' class='btn btn-sm btn-primary' style='width:100px;height:30px;' name='$row[sp_id]+1' value='編輯'></td>";

                            ?>
                            <td><input type='submit' class="btn btn-sm btn-danger " name="<?php echo "$row[sp_id]+2"; ?>" value='刪除' onclick="return confirm('是否確認刪除此檔案?')"></td>

                            <?php
                            echo "</tr>";
                        }

                        echo "</form>";
                        echo "</table>";
                        echo "<center>";
                        echo '共 ' . $date_nums . ' 筆-在 ' . $page . ' 頁-共 ' . $pages . ' 頁';
                        echo "<br/><a href=?type=$_GET[type]&gotype=查看補充資料&page=1>首頁</a> ";
                        echo "第 ";
                        for ($i = 1; $i <= $pages; $i++) {
                            if ($page - 10 < $i && $i < $page + 10) {
                                echo "<a href=?type=$_GET[type]&gotype=查看補充資料&page=$i>" . $i . "</a> ";
                            }
                        }
                        echo " 頁 <a href=?type=$_GET[type]&gotype=查看補充資料&page=$pages>末頁</a>";
                        echo "</center>";
                    }

                    $sql2 = "SELECT * FROM supplements ";
                    $result2 = mysqli_query($db_link, $sql2);

                    while ($row2 = $result2->fetch_assoc()) {
                        if (isset($_POST["$row2[sp_id]+1"])) {
                            $_SESSION["edit_sp_id"] = $row2["sp_id"];
                            echo "<script langauge = 'javascript' type='text/javascript'>";
                            echo "window.location.href = 'AdminSupplementEdit.php'";
                            echo "</script>";
                        }

                        if (isset($_POST["$row2[sp_id]+2"])) {

                            $_SESSION["delete_sp_id"]=$row2["sp_id"];
                            $sql_delete="DELETE FROM supplements WHERE supplements.sp_id = $_SESSION[delete_sp_id]";
                            mysqli_query($db_link, $sql_delete);
                            $filename = $row2["filename"];//刪除檔案
                            $type = $row2["spmtypename"];//刪除檔案
                            unlink("./supplement/".$type."/".$filename);
                            echo "<script>alert('成功刪除!');location.href='AdminSupplementManage.php'</script>";
                        }
                        if (isset($_POST["$row2[sp_id]+1"])) {
                            $_SESSION["edit_sp_id"] = $row2["sp_id"];
                            echo "<script langauge = 'javascript' type='text/javascript'>";
                            echo "window.location.href = 'AdminSupplementEdit.php'";
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
