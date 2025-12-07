<?php
include_once ('../../include/database.php');
include_once ('../../include/jdf.php');

session_start();

$date=jdate('Y/m/d');
$time=jdate('H:i:s');

$account=$_SESSION['ac_id'];

$sql="insert into logs (lg_date,lg_time,lg_account_id,lg_event) values (N'$date',N'$time',$account,N'خروج از سایت')";
run($sql);

session_destroy();

ob_clean();
ob_start();
header('location: ../home');

