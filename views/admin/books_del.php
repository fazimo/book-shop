<?php
include_once ('../../include/database.php');
include_once ('../../include/jdf.php');

$id=$_GET['id'];

$sql="delete from books where bo_id=$id";
run($sql);



ob_clean();
ob_start();
header('location: books.php');

