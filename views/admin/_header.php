<?php
session_start();
ob_clean();
ob_start();

include_once('../../include/database.php');
include_once('../../include/jdf.php');


?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />

    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>

    <title>پنل کاربری</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="../../css/dashboard/assets/js/require.min.js"></script>

    <!-- Dashboard Core -->
    <link href="../../css/dashboard/assets/css/dashboard.css" rel="stylesheet" />
    <script src="../../css/dashboard/assets/js/dashboard.js"></script>

</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">

                    <div class="d-flex order-lg-2 ml-auto">

                        <div class="dropdown" style="direction: rtl;text-align: right">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">

                                <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php print $_SESSION['ac_name']; ?></span>
                      <small class="text-muted d-block mt-1">مدیریت</small>
                    </span>
                            </a>

                        </div>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse" style="direction: rtl;text-align: right">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link"> سفارشات</a>
                            </li>

                            <li class="nav-item">
                                <a href="books.php" class="nav-link"> کتاب ها</a>
                            </li>
                            <li class="nav-item">
                                <a href="writers.php" class="nav-link"> نویسندگان</a>
                            </li>
                        
                           
                            <li class="nav-item">
                                <a href="comments.php" class="nav-link"> نظرات درباره کتاب</a>
                            </li>
                          
                          
                      

                         
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">خروج از سایت </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>