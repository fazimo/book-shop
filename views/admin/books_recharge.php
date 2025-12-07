<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               شارژ موجودی کتاب
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">شارژ موجودی جدید </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">

                            <form method="post">
                                
                            <div class="form-group">
                                <label class="form-label">تعداد</label>
                                <input type="number" value="1" class="form-control" name="txt_count" placeholder="نام...">
                            </div>

                                <?php
                                if(isset($_POST['btn_save']))
                                {
                                    $count=$_POST['txt_count'];

                                    if($count=="")
                                    {
                                        print('
                            <div class="alert alert-danger" role="alert">
                                    لطفا تعداد را پر نمائید
                                    </div>');
                                    }
                                    else
                                    {

                                        $id=$_GET['id'];

                                       $sql="update books set bo_count=bo_count + $count where bo_id=$id";
                                       run($sql);

                                        ob_clean();
                                        ob_start();
                                        header('location: books.php');
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