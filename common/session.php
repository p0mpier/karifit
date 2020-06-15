<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br>';
    print '<a href="login.php">ログイン画面へ</a>';
    exit();
}
?>