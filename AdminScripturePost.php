<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js?ver=<?php echo time; ?>"></script>

    <title>新增新講記 | 管理後台</title>

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
<form name="formspost" method="POST" action="">
<div id="wrapper">
    <?php include 'nav.php';?>
    <?php include 'database.php';?>

 <div class="col-lg-12">
            
			<font size="6"><strong style= "background:white" >新增講記</strong></font>
		
        </div>
    <!--Body-->
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class='wrapper'>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8">

                <?php
                include 'includes.php';
                /*資料庫連結*/
              
				$sqltype="SELECT * FROM `types` ";
                $resulttype=mysqli_query($db_link,$sqltype);
                /*$row=mysqli_fetch_assoc($resulttype);*/
				
                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");
                ?>

                    <div id="con2">
                        <div class="main">
                            <div class="newstitle" >

                                <div class="contentlist">

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <form name="form" method="POST" action="">

                                                <div class="form-group">
                                                    <label for="type">類別編號:</label>
													 <select id="type" name="type"  style="width:525px; height:30px; color:#000000; background-color:transparent">
													<?php while ($row = $resulttype->fetch_assoc()) {
														echo "<option value=$row[t_id]>$row[typename]</option>";

													}
													$sqltypeinput="SELECT * FROM `types` where `t_id`='$_POST[type]'";
													$resulttypeinput=mysqli_query($db_link,$sqltypeinput);
													$rowinput= mysqli_fetch_assoc($resulttypeinput);
													$inputtype=$rowinput['typename'];
													?>
                                                   
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="number">&emsp;&emsp;卷號:</label>
                                                    <input id="number" name="number" type="text"  style="width:525px; height:30px; color:#000000; background-color:transparent">
                                                </div>


                                                <div class="form-group">
                                                    <label for="title">經文標題:</label>
                                                    <input id="title" name="title" type="text"   style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                </div>


                                                <div class="form-group">
                                                    <label for="content">經文內容:</label>

													
                                                    <textarea id="content" name="content" id="content" rows="10" cols="80"></textarea>
                                                    <script>
                                                        CKEDITOR.replace('content',{
                                                            width:1000,height:500,
                                                        });
                                                    </script>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date">發佈日期:</label>
                                                    <input id="date" value="<?php echo $getDate?>" name="date" type="date"  style="width:525px; height:30px; color:#000000; background-color:transparent" >
                                                </div>

                                                <div class="form-group">
												    <input type="submit" class="btn btn-sm btn-warning" name="save" value="暫存" >
                                                    <input type="submit" class="btn btn-sm btn-warning" name="go" value="發佈" >
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
					
					
                    $number = $_POST["number"];
                    $title = $_POST["title"];
                    $filename = $_POST["number"].".txt";
                    $content = $_POST["content"];
					$sql_namecheck = "SELECT * FROM `scripture` where `filename`='$filename'";
					$checkresult= mysqli_query($db_link, $sql_namecheck);
					$rowcheck=mysqli_fetch_assoc($checkresult);
					$filenamecheck=$rowcheck["filename"];
                   
					
					# 設定時區
					date_default_timezone_set('Asia/Taipei');
					$getDate= date("Y-m-d");
					if($_POST["date"]==null){
						$date=$getDate;
					}else{
						$date = $_POST["date"];
					}
                   

                    if(isset($_POST["go"]))
                    {
						if($number==null || $title==null ||  $content==null || $date ==null)
                        {
                            echo "<script>alert('請輸入資料!');</script>";
							
							
                        }
                        else  if (file_exists("./ScriptureFile/".$inputtype."/".$filename)) //if($filename == $filenamecheck)
                        {
                            echo "<script>alert('卷號重複，請重新輸入！');location.href='AdminScripturePost.php'</script>";
                        }
                        else
                        {
                            //寫入檔案
                            $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
                            $myfile = fopen("./ScriptureFile/$inputtype/$filename","a+") or die("Unable to open file!");
                            $txt = $content;
                            fwrite($myfile,$txt);
                            fclose($myfile);

                            $system_msg = "講記新增";


                            $sql="INSERT INTO scripture (t_id,typename,number,title,filename,content,date,save,newupdate) VALUES ('$_POST[type]','$inputtype','$number','$title','$filename','$content','$date','0','$_SESSION[updatename]')";

                            mysqli_query($db_link, $sql);
                            echo "<script>alert('講記已經上傳!');location.href='AdminScriptureManage.php'</script>";
                        }
                    }


                    if(isset($_POST["save"]))
                    {
                       if($number==null || $title==null  || $content==null || $date ==null)
                       {
                            echo "<script>alert('請輸入資料!');location.href='AdminScripturePost.php'</script>";
                       }
                       else  if (file_exists("./ScriptureFile/".$inputtype."/".$filename)) //if($filename == $filenamecheck)
                       {
                           echo "<script>alert('卷號重複，請重新輸入！');location.href='AdminScripturePost.php'</script>";
                       }
                       else
                       {
                            //寫入檔案
                            $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
                            $myfile = fopen("./ScriptureFile/$inputtype/$filename","a+") or die("Unable to open file!");
						
                            $txt = $content;
                            fwrite($myfile,$txt);
                            fclose($myfile);

                            $system_msg = "講記暫存";

                            $sql="INSERT INTO scripture (t_id,typename,number,title,filename,content,date,save,newupdate) VALUES ('$_POST[type]','$inputtype','$number','$title','$filename','$content','$date','1','$_SESSION[updatename]')";
                            mysqli_query($db_link, $sql);
                            echo "<script>alert('講記已經暫存!');location.href='AdminScriptureSave.php'</script>";
                       }
                    }


                    if($_SERVER['REQUEST_METHOD'] === "POST")
                    {
                       if ($system_msg == "講記新增")
                       {
                           $log = "$_SESSION[name]新增$inputtype/卷號$_POST[number]";
                           logger($log);
                       }else if($system_msg == "講記暫存"){
                           $log = "$_SESSION[name]暫存$inputtype/卷號$_POST[number]";
                           logger($log);
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
