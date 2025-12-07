<?php
$DB_Host="127.0.0.1";
$DB_Username="root";
$DB_Password="";
$DB_DBName="db_bookstore";


function select($Script)
{
	global $DB_DBName,$DB_Host,$DB_Password,$DB_Username;
	$db=mysqli_connect($DB_Host,$DB_Username,$DB_Password);
	if($db==false) die("ارتباط با سرور برقرار نمی شود");
	if(mysqli_select_db($db,$DB_DBName)==false)
	{
		 die("خطا در انتخاب دیتابیس");
	}
	mysqli_query($db,"set char set utf8");
	$rows=mysqli_query($db,$Script);
	if($rows==false) die(mysqli_error($db));
	mysqli_close($db);
	return $rows;
}

function run($Script)
{
	global $DB_DBName,$DB_Host,$DB_Password,$DB_Username;
	
	$db=mysqli_connect($DB_Host,$DB_Username,$DB_Password);
	
	if($db==false) die("ارتباط با سرور برقرار نمی شود");
	
	if(mysqli_select_db($db,$DB_DBName)==false)
	{
		 die("خطا در انتخاب دیتابیس");
	}
	mysqli_query($db,$Script);
	mysqli_close($db);
}
?>