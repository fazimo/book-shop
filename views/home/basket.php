<?php include_once ('_header.php'); ?>

    <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 single-product">

                            <h2>سبد خرید</h2>
                            <hr>

                        <?php
                        if(isset($_SESSION['ac_id']))
                        {
                            $account=$_SESSION['ac_id'];

                            print('
                            <!-- Start Cart Area -->
                        <div class="container">
                            <div class="cart-title">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 >نام</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>فی قیمت</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>تعداد</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>جمع</h6>
                                    </div>
                                </div>
                            </div>');

                            $sql="select * from baskets where bas_account_id=$account";
                            $data=select($sql);
                            if(mysqli_num_rows($data)==0)
                            {
                                print(' <div class="alert alert-danger" role="alert">
                                       شما سبد خریدی ایجاد نکرده اید
                                    </div>');
                            }
                            else
                            {
                                    $row=mysqli_fetch_array($data);
                                    $bas_id=$row['bas_id'];
                                    $sql2="select * from vw_baskets_items where it_basket_id=$bas_id";
                                    $data2=select($sql2);
                                    if(mysqli_num_rows($data2)==0)
                                    {
                                        print(' <div class="alert alert-danger" role="alert">
                                       سبد خرید شما خالی است
                                    </div>');
                                    }
                                    else
                                    {
                                        $amount=0;
                                        while ($c=mysqli_fetch_array($data2))
                                        {
                                            $sum=$c['it_count'] * $c['it_fee'];
                                            $amount+=$sum;
                                            print ('
                                        <div class="cart-single-item">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-12">
                                        <div class="product-item d-flex align-items-center">
                                            <img src="img/ci1.jpg" class="img-fluid" alt="">
                                            <h6>'.$c['bo_name'].'('.$c['wr_name'].')</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="price">'.number_format($c['it_fee']).' تومان </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="quantity-container d-flex align-items-center mt-15">
                                            <input type="text" class="quantity-amount" value="'.$c['it_count'].'" />

                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="total">'.number_format($sum).' تومان </div>
                                    </div>
                                </div>
                            </div>


                            <div class="subtotal-area d-flex align-items-center justify-content-end">
                                <div class="title text-uppercase">مبلغ قابل پرداخت:</div>
                                <div class="subtotal">'.number_format($amount).' تومان </div>
                            </div>

                        </div>
                                        ');
                                        }
                                    }
                            }


                        }
                        else
                        {
                            print('
                                    <div class="alert alert-danger" role="alert">
                                        ابتدا وارد سایت شوید
                                    </div>');
                        }
                        ?>


                    </div>

                </div>
                    <?php

                    if(isset($_POST['btn_save']))
                    {
                        $mobile=$_POST['txt_mobile'];
                        $address=$_POST['txt_address'];

                        if($mobile=="" || $address=="")
                        {
                            print(' <div class="alert alert-danger" role="alert">
                                     لطفا شماره تماس و نشانی را وارد نمائید
                                    </div>');
                        }

                        else
                        {
                            $order_id=rand(111111,999999);
                            $date=jdate('Y/m/d');
                            $time=jdate('H:i:s');

                            $sql="insert into orders(or_id,or_date,or_time,or_account_id,or_sum,or_mobile,or_address) values ($order_id,N'$date',N'$time',$account,$amount,N'$mobile',N'$address')";
                            run($sql);

                            $sql2="select * from baskets_items where it_basket_id=$bas_id";
                            $data2=select($sql2);
                            if(mysqli_num_rows($data2)>0)
                            {
                               while ($c2=mysqli_fetch_array($data2))
                               {
                                   $product_id=$c2['it_product_id'];
                                   $fee=$c2['it_fee'];
                                   $count=$c2['it_count'];
                                   $sql3="insert into orders_items(it_order_id,it_product_id,it_fee,it_count) values ($order_id,$product_id,$fee,$count)";
                                   run($sql3);

                                   $sql4="update books set bo_count=bo_count - $count where bo_id=$product_id";
                                   run($sql4);

                               }

                               $sql5="delete from baskets where bas_id=$bas_id";
                               run($sql5);

                                $sql6="delete from baskets_items where it_basket_id=$bas_id";
                                run($sql6);

                                  ob_clean();
                                ob_start();
                                header('location: ../client/');

                            }


                        }

                    }

                    if(isset($_SESSION['ac_id']))
                    {
                        $account = $_SESSION['ac_id'];

                        print ('
                          <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 single-product">

                        <h2>مشخصات پستی</h2>
                        <hr>

                        <form method="post">
                            <div class="form-group">
                                <label class="form-label">شماره تماس</label>
                                <input type="text" class="form-control" name="txt_mobile" placeholder="شماره تماس...">
                            </div>

                            <div class="form-group">
                                <label class="form-label">نشانی پستی</label>
                                <textarea type="text" rows="7" class="form-control" name="txt_address" placeholder="نشانی پستی..."></textarea>
                            </div>



                            <div class="form-group">
                                <input type="submit" class="btn btn-success"  name="btn_save" value="تائید نهایی سفارش">
                            </div>

                        </form>

                    </div>

                </div>
                        ');
                    }
                     ?>

            </section>
            <!-- End Best Seller -->

        </div>

    </div>
</div>

<?php include_once ('_footer.php'); ?>