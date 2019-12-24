<?php 
$dsn='mysql:dbname=tqmsbzgg_shop;host=tqmsbzgg_shop;charset=utf8';
$user='tqmsbzgg_shop';
$password='%RdFsbr)I})8';
// $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
// $user='root';
// $password='root';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>