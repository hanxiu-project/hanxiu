<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

    <title>新增經文 | 管理後台</title>

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
              
           
                
                session_start();

                 $sql="SELECT * FROM members WHERE members.m_id = $_SESSION[edit_m_id]";
                $result=mysqli_query($db_link,$sql);
                $row=mysqli_fetch_assoc($result);

                /*$sql2="SELECT typename FROM scripture,types WHERE scripture.t_id = types.t_id AND scripture.s_id = $_SESSION[edit_s_id]";
                $result2=mysqli_query($db_link,$sql2);
                $row2=mysqli_fetch_assoc($result2);*/


                //讀取檔案
                $filename = $row["filename"];
                $str = "";

                //判斷是否有該檔案
                if(file_exists("C:AppServ/www/漢修專題/ScriptureFile/$filename"))
                {
                    $filee = fopen("C:AppServ/www/漢修專題/ScriptureFile/$filename","r");
                    if($filee != NULL)
                        //當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
                    {
                        while(!feof($filee))
                        {
                            $str .= fgets($filee);
                        }
                        fclose($filee);
                    }
                }

                ?>



                <div id="con2">
                    <div class="main">
                        <div class="newstitle" >

                            <div class="contentlist">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <form name="forms" method="POST" action="">

                                            <div class="form-group">
                                                <label for="mid">會員編號:</label>
                                               <input id="mid" name="mid" type="text" disabled="disabled"  value="<?php echo $row['m_id']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" > 
                                            </div>

                                            <div class="form-group">
                                                <label for="mname">會員姓名:</label>
                                                <input id="mname" name="mname" type="text" disabled="disabled" value="<?php echo $row['name']?>" style="width:525px; height:30px; color:#000000; background-color:transparent">
                                            </div>


                                            <div class="form-group">
                                                <label for="memail">會員信箱:</label>
                                                <input id="memail" name="memail" type="text" disabled="disabled"  value="<?php echo $row['email']?>" style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <label for="mtele">會員電話:</label>
                                                <input id="mtele" name="mtele" type="text" disabled="disabled" value="<?php echo $row['telephone']?>"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                             <div class="form-group">
                                                <label for="dcontent">捐獻內容:</label>
                                                <select id="dcontent" name="dcontent">
												<option>金錢</option>
												<option>物資</option>
												</select>
                                            </div>
											
											<div class="form-group">
                                                <label for="damount">捐獻數量:</label>
                                                <input type="text" id="damount" name="damount" style="width:525px; height:30px; color:#000000; background-color:transparent">  
                                            </div>
											
                                            <div class="form-group">
                                                <label for="ddate">捐獻日期:</label>
                                                <input id="ddate" name="ddate" type="date"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-sm btn-warning" name="dpost" value="發佈" >
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <?php
						$dname=$_POST["dname"];
						$dtele=$_POST["dtele"];
						$dcontent = $_POST["dcontent"];
						$damount = $_POST["damount"];
						$ddate = $_POST["ddate"];
							/*$sqli="SELECT * FROM `members` WHERE name = '$dname' and telephone='$dtele'";
						$result=mysqli_query($db_link,$sqli);
						$row=mysqli_fetch_assoc($result);
							mysqli_query($db_link, $sqli);
						$mid=$row["m_id"];*/
						
						
						$sqlii="SELECT * FROM `donate`";
						$result1=mysqli_query($db_link,$sqlii);
						$row1=mysqli_fetch_assoc($result1);
    
                        ?>
						<?php
						 if(isset($_POST["dpost"]))
                        {
                            if($damount==null || $ddate ==null)
                            {
                                echo "<script>alert('請輸入資料!');location.href='Donatemanage.php'</script>";
                            }
                            else
                            {
								
                                $sqldonate="INSERT INTO `donates` (m_id,dname,amount,date,type) VALUES('$row[m_id]','$row[name]','$damount','$ddate','$dcontent')";
                                mysqli_query($db_link, $sqldonate);
                                echo "<script>alert('捐獻資料已經上傳!');location.href='Donatemanage.php'</script>";
                            }
                        }
						?>
            </div>
            <!-- /.container-fluid -->

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
