<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               افزودن نویسنده جدید
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نویسنده جدید </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">

                            <form method="post">
                            <div class="form-group">
                                <label class="form-label">نام</label>
                                <input type="text" class="form-control" name="txt_name" placeholder="نام...">
                            </div>

                                <?php
                                if(isset($_POST['btn_save']))
                                {
                                    $name=$_POST['txt_name'];

                                    if($name=="")
                                    {
                                        print('
                            <div class="alert alert-danger" role="alert">
                                    لطفا ورودی ها را پر نمائید
                                    </div>');
                                    }
                                    else
                                    {

                                        $sql="select * from writers where wr_name=N'$name'";
                                        $data=select($sql);
                                        if(mysqli_num_rows($data)==0)
                                        {
                                            $sql="insert into writers (wr_name) values(N'$name')";
                                            run($sql);

                                            ob_clean();
                                            ob_start();
                                            header('location: writers.php');
                                        }
                                        else
                                        {
                                            print('
                            <div class="alert alert-danger" role="alert">
                                    اطلاعات تکراری می باشد
                                    </div>');
                                        }
                                    }
                                }
                                ?>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success"  name="btn_save" value="ذخیره اطلاعات">
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include_once ('_footer.php') ?>