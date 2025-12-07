<?php
include_once ('../../include/database.php');
include_once ('../../include/jdf.php');

$id=$_GET['id'];

$sql="update books_comments set cm_visible=1 where cm_id=$id";
run($sql);



ob_clean();
ob_start();
header('location: comments.php');

