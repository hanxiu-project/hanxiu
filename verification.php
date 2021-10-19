<?php
session_start();

if($_SESSION['acc'] == null && $_SESSION['pwd'] == null)
{
    echo "<script>alert('尚未登入，請登入後再嘗試！');location.href='login.php'</script>";
}
else if ($_SESSION['authority']== 0)
{
    echo "<script>alert('抱歉！您無權限瀏覽此頁面！');location.href='indexs.php'</script>";
}
?>