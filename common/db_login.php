<?php

$dsn = 'mysql:dbname=ddp;host=localhost;charset=utf8';
$user = 'root';
$password = '';
//$dsn = 'mysql:dbname=omoshirokeikaku_ddo;host=mysql713.db.sakura.ne.jp;charset=utf8';
//$user = 'omoshirokeikaku';
//$password = 'f9773mpvrn';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>