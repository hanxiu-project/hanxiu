<html>

<head>

    <title>首頁</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="csss_file/cssfornophoto3.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>


</head>

<body>

<?php




?>


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

            </div>

>>>>>>> cecac84c061fef24315a5ee692b5ce33a51e3a06

            <!--左邊欄位
            <div id="sidebar_left">sidebar_left</div>




            右邊欄位
            <div id="sidebar_right">sidebar_right</div>-->


            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM posts WHERE p_id = $id";
                $result = mysqli_query($db_link, $sql);
                $row = mysqli_fetch_assoc($result);
            }
            ?>

            <!--主內文區-->
            <div id="content">
                <div class="newstitle">
                    <h2>｜<?php echo $row["title"] ?></h2>
                </div>
                <div class="tablelist">


                    <div class="table" align="center">
                        <table width="60%" style="border:3px 	#000000  solid;padding:5px;" rules="all"
                               cellpadding='5' ;>
                            <tr>
                                <td>
                                    發布日期：<?php echo $row["date"] ?></p>
                                    內容：<?php echo $row["content"] ?></td>
                            </tr>
                        </table>


                    </div>
                </div>


            </div>


       
        <!--註腳-->
        <?php include 'footer.php';?>
    </div>


    
 </div>
</body>


</html>