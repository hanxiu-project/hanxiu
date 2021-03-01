<?php
session_start();
$db_ip="127.0.0.1";
$db_user="root";
$db_pwd="123456789";
$db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");


mysqli_query($db_link, 'SET CHARACTER SET UTF-8');

$getDate= date("Y-m-d");

$fikee=$_FILES['my_file']['name'];

echo $_SESSION[inputtype] . '<br/>';
echo $_SESSION[kptypeid] . '<br/>';
echo $fikee . '<br/>';
echo $getDate . '<br/>';

echo $_SESSION[inputtype] . '<br/>';

echo "<br>";
# 檢查檔案是否上傳成功
if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){
    echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
    echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
    echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
    echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';



    # 檢查檔案是否已經存在
    if (file_exists('../漢修專題/kepan/' . $_FILES['my_file']['name'])){
        echo '檔案已存在。<br/>';
    } else {
        $file = $_FILES['my_file']['tmp_name'];
        $dest = '../漢修專題/kepan/' . $_FILES['my_file']['name'];

        # 將檔案移至指定位置
        move_uploaded_file($file, $dest);




        //存入資料庫




       /* $sql="INSERT INTO kepans (kpt_id,kptypename,filename,date) VALUES ('$_SESSION[kptypeid]','$_SESSION[inputtype]','$file','$getDate')";
        mysqli_query($db_link, $sql);
        echo "<script>alert('檔案已經上傳!');location.href='AdminKepanManage.php'</script>";*/
    }
} else {
    echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
}
?>