<?php
session_start();
ob_clean();
ob_start();

include_once ('../../include/database.php');
include_once ('../../include/jdf.php');
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>کتاب فروشی آنلاین</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="../../css/linearicons.css">
    <link rel="stylesheet" href="../../css/owl.carousel.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/nice-select.css">
    <link rel="stylesheet" href="../../css/nouislider.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>

<!-- Start Header Area -->
<header class="default-header">
    <div class="menutop-wrap">
        <div class="menu-top container" style="direction: rtl">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="list">
                    <li><a href="index.php">صفحه نخست</a></li>


                </ul>
                <ul class="list">
                    <?php
                    if(isset($_SESSION['ac_id']))
                    {
                        print('<li><a  href="../client/">رفتن به پنل کاربری</a></li>');
                    }
                    else
                    {
                        print ('<li><a href="login.php">ورود/عضویت</a></li>');
                    }

                    ?>


                    <li><a href="basket.php">سبد خرید</a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light" style="direction: rtl">
        <div class="container">
            <a class="navbar-brand" href="index.php">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav" style="text-align: right;height: 40px;line-height: 40px; margin: auto;">

                    <?php
                    $sql="select * from groups order by gr_name asc";
                    $data=select($sql);
                    while ($c=mysqli_fetch_array($data))
                    {
                        print(' <li><a href="index.php?groups='.$c['gr_id'].'">'.$c['gr_name'].'</a></li>');
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End Header Area -->
<div class="container mt-100">
    <div class="row" style="direction: rtl">
        <div class="col-xl-3 col-lg-4 col-md-5">

            <div class="sidebar-filter mt-50">

                <div class="common-filter">
                    <div class="head">محبوب ترین دسته بندی ها</div>
                    <form action="#">
                        <ul>
                            <?php
                            $sql="select * from vw_groups order by counts desc limit 0,5";
                            $data=select($sql);
                            while ($c=mysqli_fetch_array($data))
                            {
                                print('<li style="padding-right: 30px;" class="filter-list"><a href="index.php?groups='.$c['gr_id'].'" >'.$c['gr_name'].' ('. $c['counts'] .' کتاب )</a></li>');
                            }

                            ?>

                        </ul>
                    </form>
                </div>
                <div class="common-filter">
                    <div class="head">رده سنی</div>
                    <form action="#">
                        <ul>
                            <li style="padding-right: 30px;" class="filter-list"><a href="index.php?age=0" >0 تا 4 سال</a></li>
                            <li  style="padding-right: 30px;" class="filter-list"><a href="index.php?age=1" >5 تا 10 سال</a></li>
                            <li  style="padding-right: 30px;" class="filter-list"><a href="index.php?age=2" >11 تا 15 سال</a></li>
                            <li  style="padding-right: 30px;" class="filter-list"><a href="index.php?age=3" >16 تا 25 سال</a></li>
                            <li  style="padding-right: 30px;"  class="filter-list"><a href="index.php?age=4" >25 سال و بالاتر</a></li>
                        </ul>
                    </form>
                </div>

            </div>
        </div>
