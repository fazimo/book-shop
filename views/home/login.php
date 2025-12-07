<?php include_once ('_header.php'); ?>

    <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-form">
                            <h3 class="billing-title text-center">ورود به سایت</h3>
                            <p class="text-center mt-80 mb-40">نام کاربری و رمز عبور خود را وارد نمائید </p>
                            <form action="#" method="post">
                                <input type="text" name="txt_username" placeholder="نام کاربری ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'نام کاربری ...'" class="common-input mt-20">
                                <input type="password" name="txt_password" placeholder="رمز عبور ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'رمز عبور ...'"  class="common-input mt-20">
                                <br>
                                <?php
                                if(isset($_POST['btn_login']))
                                {
                                    $user=$_POST['txt_username'];
                                    $pass=$_POST['txt_password'];
                                    if($user=="" || $pass=="")
                                    {
                                        print('
                                    <div class="alert alert-info" role="alert">
                                  ورود نام کاربری و رمز عبور الزامی است
                                    </div>');
                                    }
                                    else
                                    {

                                       $sql="select * from accounts where ac_username=N'$user' and ac_password=N'$pass'";
                                       $data=select($sql);

                                       if(mysqli_num_rows($data)==0)
                                       {

                                           print('
                                    <div class="alert alert-danger" role="alert">
نام کاربری یا رمز عبور اشتباه می باشد.
                                    </div>');
                                       }
                                       else
                                       {
                                           $row=mysqli_fetch_array($data);

                                           $_SESSION['ac_id']=$row['ac_id'];
                                           $_SESSION['ac_level']=$row['ac_level'];
                                           $_SESSION['ac_name']=$row['ac_name'];

                                           $account=$row['ac_id'];
                                           $date=jdate('Y/m/d');
                                           $time=jdate('H:i:s');
                                           $sql="insert into logs (lg_date,lg_time,lg_account_id,lg_event) values (N'$date',N'$time',$account,N'ورود به سایت')";
                                           run($sql);

                                           ob_clean();
                                           ob_start();
                                           switch ($row['ac_level'])
                                           {
                                               case 0:
                                                   header('location: ../admin/');
                                                   break;
                                               case 1:
                                                   header('location: index.php');
                                                   break;
                                           }


                                       }
                                    }
                                }
                                ?>

                                <button name="btn_login" class="view-btn color-2 mt-20 w-100"><span>ورود به سایت</span></button>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="register-form">
                            <h3 class="billing-title text-center">ثبت نام در سایت</h3>
                            <p class="text-center mt-40 mb-30">حساب کاربری خود را ایجاد نمائید</p>
                            <form method="post">
                                <input type="text" name="txt_reg_name" placeholder="نام کامل شما ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'نام کامل شما ...'"  class="common-input mt-20">
                                <input type="text" name="txt_reg_username" placeholder="نام کاربری ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'نام کاربری ...'"  class="common-input mt-20">
                                <input type="password" name="txt_reg_password" placeholder="رمز عبور ..." onfocus="this.placeholder=''" onblur="this.placeholder = 'رمز عبور ...'"  class="common-input mt-20">

                                <br>
                                <?php
                                if(isset($_POST['btn_register']))
                                {
                                    $user=$_POST['txt_reg_username'];
                                    $pass=$_POST['txt_reg_password'];
                                    $name=$_POST['txt_reg_name'];
                                    if($user=="" || $pass=="" || $name=="")
                                    {
                                        print('
                                    <div class="alert alert-info" role="alert">
                                ورود تمامی مشخصات الزامی است
                                    </div>');
                                    }
                                    else
                                    {

                                        $sql="select * from accounts where ac_username=N'$user'";
                                        $data=select($sql);

                                        if(mysqli_num_rows($data)==0)
                                        {

                                            $id=rand(111111,999999);

                                            $sql="insert into accounts (ac_id,ac_name,ac_username,ac_password) values ($id,N'$name',N'$user',N'$pass')";
                                            run($sql);

                                            ob_clean();
                                            ob_start();
                                            header('location: index.php');
                                        }
                                        else
                                        {
                                            print('
                                    <div class="alert alert-danger" role="alert">
نام کاربری تکراری است لطفا نام دیگری برگزینید
                                    </div>');
                                        }
                                    }
                                }
                                ?>

                                <button name="btn_register" type="submit" class="view-btn color-2 mt-20 w-100"><span>Register</span></button>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Best Seller -->

        </div>

    </div>
</div>

<?php include_once ('_footer.php'); ?>