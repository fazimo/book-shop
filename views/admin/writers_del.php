<?php
include_once ('../../include/database.php');
include_once ('../../include/jdf.php');

$id=$_GET['id'];

$sql="delete from writers where wr_id=$id";
run($sql);



ob_clean();
ob_start();
header('location: writers.php');

