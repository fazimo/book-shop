<?php
include_once ('../../include/database.php');
include_once ('../../include/jdf.php');

$id=$_GET['id'];

$sql="update orders set or_status=1  where or_id=$id";
run($sql);



ob_clean();
ob_start();
header('location: index.php');

