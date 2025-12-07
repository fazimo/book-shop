<?php include_once ('_header.php'); ?>

<?php
$id=$_GET['id'];
$sql="select * from vw_books where bo_id=$id";
$row=mysqli_fetch_array(select($sql));

?>
    <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Product Details -->
                    <div class="container">
                        <div class="product-quick-view">
                            <div class="row align-items-center">
                                <div class="col-lg-6">

                                  <img style="width: 90%;height: 90%" src="../../upload/<?php print($row['bo_pic']); ?>">


                                </div>
                                <div class="col-lg-6">
                                    <div class="quick-view-content">
                                        <div class="top">
                                            <h3 class="head"><?php print($row['bo_name']); ?></h3>
                                            <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10"><?php print(number_format($row['bo_fee'])); ?> تومان </span></div>
                                            <hr>
                                            <div class="category">دسته بندی: <span><?php print($row['gr_name']); ?></span></div>
                                            <div class="category">نویسنده: <span><?php print($row['wr_name']); ?></span></div>
                                            <div class="category">مترجم: <span><?php print($row['bo_translate']); ?></span></div>
                                            <div class="category">ناشر: <span><?php print($row['pu_name']); ?></span></div>
                                            <div class="category">سال نشر: <span><?php print($row['bo_year']); ?></span></div>
                                            <div class="category">تعداد صفحات: <span><?php print($row['bo_papers']); ?></span></div>
                                            <div class="available">گروه سنی:
                                                <?php
                                                if($row['bo_age']==0) print ('<span>0 تا 4 سال</span>');
                                                else if($row['bo_age']==1) print ('<span>5 تا 10 سال</span>');
                                                else if($row['bo_age']==2)  print ('<span>11 تا 15 سال</span>');
                                                else if($row['bo_age']==3) print ('<span>16 تا 25 سال</span>');
                                                else if($row['bo_age']==4) print ('<span>25 سال به بالا</span>');

                                                ?>

                                            </div>
                                            <hr>
                                            <div class="category">تعداد موجود در انبار: <span><?php print($row['bo_count']); ?></span></div>
                                        </div>

                                        <div>
                                            <?php
                                            if(isset($_POST['btn_add']))
                                            {
                                                $count=$_POST['txt_count'];

                                                $sql="select * from books where bo_id=$id";
                                                $row=mysqli_fetch_array(select($sql));
                                                if($count> $row['bo_count'])
                                                {
                                                    print('
                                    <div class="alert alert-danger" role="alert">
تعداد وارد شده از تعداد موجود در انبار بیشتر است
                                    </div>');
                                                }
                                                else
                                                {
                                                    $bas_id=0;
                                                    $account=$_SESSION['ac_id'];
                                                    $sql2="select * from baskets where bas_account_id=$account";
                                                    $data2=select($sql2);
                                                    if(mysqli_num_rows($data2)==0)
                                                    {
                                                        $bas_id=rand(111111,999999);
                                                        $sql3="insert into baskets (bas_account_id,bas_id) values ($account,$bas_id)";
                                                        run($sql3);
                                                    }
                                                    else
                                                    {
                                                        $row2=mysqli_fetch_array($data2);
                                                        $bas_id=$row2['bas_id'];
                                                    }

                                                    $sql="select * from baskets_items where it_basket_id=$bas_id and it_product_id=$id";
                                                    $data=select($sql);

                                                    if(mysqli_num_rows($data)==0)
                                                    {
                                                        $fee=$row['bo_fee'];
                                                        $sql="insert into baskets_items (it_count,it_fee,it_basket_id,it_product_id) values ($count,$fee,$bas_id,$id)";
                                                        run($sql);

                                                        ob_clean();
                                                        ob_start();
                                                        header('location: index.php');
                                                    }
                                                    else
                                                    {
                                                        $row3=mysqli_fetch_array($data);
                                                        $it_id=$row3['it_id'];
                                                        $sql="update baskets_items set it_count=it_count + $count where it_id=$it_id";
                                                        run($sql);

                                                        ob_clean();
                                                        ob_start();
                                                        header('location: index.php');
                                                    }

                                                }

                                            }



                                            if(isset($_SESSION['ac_id']))
                                            {
                                                print('<form method="post">
                                            <div class="quantity-container d-flex align-items-center mt-15">
                                              تعداد
                                                <input type="number" name="txt_count" class="quantity-amount ml-15 mr-15" style="margin-right: 20px" value="1" />
                                            </div>
                                            <div class="d-flex mt-20">
                                                
                                                <button type="submit" name="btn_add" class="view-btn color-2"><span>افزودن به سبد خرید</span></button>
                                            </div>
                                            </form>');
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="details-tab-navigation d-flex justify-content-center mt-30">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li>
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">شرح کتاب</a>
                                </li>

                                <li>
                                    <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments">نظرات کاربران</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description">
                                <div class="description">
                                    <p>
                                        <?php print ($row['bo_text']);?>
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments">
                                <div class="review-wrapper">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="total-comment">

                                                <?php
                                                $sql="select * from books_comments where cm_visible=1  and  cm_book_id=$id order by cm_date desc ";
                                                $data=select($sql);
                                                while ($c=mysqli_fetch_array($data))
                                                {
                                                    print('
                                                     <div class="single-comment">
                                                    <div class="user-details d-flex align-items-center flex-wrap">

                                                        <div class="user-name order-3 order-sm-2">
                                                            <h5>میهمان گفت</h5>
                                                            <span>'.$c['cm_date'].'-' . $c['cm_time'].'</span>
                                                        </div>
                                                        
                                                    </div>

                                                    <p class="user-comment">
                                                       '.$c['cm_text'].'
                                                    </p>
                                                </div>
                                                    ');
                                                }
                                                ?>



                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="add-review">
                                                <h3>ارسال نظر</h3>
                                                <form action="#" method="post" class="main-form">
                                                    <textarea name="txt_text" placeholder="نظر شما ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'نظر شما ...'"  class="common-textarea"></textarea>

                                                    <?php
                                                    if(isset($_POST['btn_comment']))
                                                    {
                                                        $text=$_POST['txt_text'];
                                                        if($text=="")
                                                        {
                                                            print('
                                    <div class="alert alert-danger" role="alert">
نظر خود را وارد نمائید
                                    </div>');
                                                        }
                                                        else
                                                        {
                                                            $date=jdate('Y/m/d');
                                                            $time=jdate('H:i:s');

                                                                $sql="insert into books_comments(cm_date,cm_time,cm_text,cm_book_id) values(N'$date',N'$time',N'$text',$id)";
                                                                run($sql);

                                                            print('
                                    <div class="alert alert-success" role="alert">
نظر شما ثبت شد و پس از تائید نمایش داده می شود
                                    </div>');
                                                        }
                                                    }
                                                    ?>

                                                    <button type="submit" name="btn_comment" class="view-btn color-2"><span>ذخیره نظر</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Product Details -->



        </div>

    </div>
</div>


<?php include_once ('_footer.php'); ?>