<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               افزودن کتاب جدید
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کتاب جدید </h3>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">نام</label>
                                <input type="text" class="form-control" name="txt_name" placeholder="نام...">
                            </div>

                                <div class="form-group">
                                    <label class="form-label">دسته بندی</label>
                                    <select name="drop_groups" id="" class="form-control">
                                        <?php
                                        $sql="select * from groups order by gr_name";
                                        $data=select($sql);
                                        while ($c=mysqli_fetch_array($data))
                                        {
                                            print(' <option value="'.$c['gr_id'].'">'.$c['gr_name'].'</option>');
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">نویسنده</label>
                                    <select name="drop_writers" id="" class="form-control">
                                        <?php
                                        $sql="select * from writers order by wr_name";
                                        $data=select($sql);
                                        while ($c=mysqli_fetch_array($data))
                                        {
                                            print(' <option value="'.$c['wr_id'].'">'.$c['wr_name'].'</option>');
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">مترجم</label>
                                    <input type="text" class="form-control" name="txt_translate" placeholder="مترجم...">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">انتشارات</label>
                                    <select name="drop_publishers" id="" class="form-control">
                                        <?php
                                        $sql="select * from publishers order by pu_name";
                                        $data=select($sql);
                                        while ($c=mysqli_fetch_array($data))
                                        {
                                            print(' <option value="'.$c['pu_id'].'">'.$c['pu_name'].'</option>');
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">سال انتشار</label>
                                    <input type="text" class="form-control" name="txt_year" placeholder="سال انتشار...">
                                </div>


                                <div class="form-group">
                                    <label class="form-label">رده سنی</label>
                                    <select class="form-control" name="drop_age" id="">
                                        <option value="0">0 تا 4 سال</option>
                                        <option value="1">5 تا 10 سال</option>
                                        <option value="2">11 تا 15 سال</option>
                                        <option value="3">16 تا 25 سال</option>
                                        <option value="4">25 سال و بالاتر</option>
                                    </select>
                                </div>
                        </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">تعداد صفحات</label>
                                    <input type="number" class="form-control" name="txt_papers" placeholder="تعداد صفحات...">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">فی قیمت (تومان)</label>
                                    <input type="text" class="form-control" name="txt_fee" placeholder="قیمت...">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">تعداد اولیه</label>
                                    <input type="number" value="1" class="form-control" name="txt_count" placeholder="تعداد...">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">شرح کتاب</label>
                                    <textarea type="text" rows="8" class="form-control" name="txt_text" placeholder="متن..."></textarea>
                                </div>


                                <div class="form-group">
                                    <label class="form-label">تصویر کتاب</label>
                                    <input type="file" name="f" >
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            if(isset($_POST['btn_save']))
                            {
                                $name=$_POST['txt_name'];
                                $group=$_POST['drop_groups'];
                                $writer=$_POST['drop_writers'];
                                $translate=$_POST['txt_translate'];
                                $publisher=$_POST['drop_publishers'];
                                $age=$_POST['drop_age'];
                                $year=$_POST['txt_year'];
                                $papers=$_POST['txt_papers'];
                                $count=$_POST['txt_count'];
                                $fee=$_POST['txt_fee'];
                                $text=$_POST['txt_text'];

                                if($name=="" || $year=="" || $count=="" || $fee=="")
                                {
                                    print('
                            <div class="alert alert-danger" role="alert">
                                    لطفا ورودی ها را پر نمائید
                                    </div>');
                                }
                                else
                                {

                                    if($_FILES['f'])
                                    {
                                        $f=$_FILES['f'];
                                        $ext=@end(explode(".",$f["name"]));
                                        $filename="_".rand(11111,99999).".".$ext;
                                        $dest='../../upload/'.$filename;
                                        copy($f["tmp_name"],$dest);
                                    }

                                    $sql="insert into books(bo_name,bo_group_id,bo_writer_id,bo_translate,bo_publisher_id,bo_year,bo_age,bo_papers,bo_fee,bo_count,bo_text,bo_pic) values(N'$name',$group,$writer,N'$translate',$publisher,N'$year',$age,$papers,$fee,$count,N'$text',N'$filename')";
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
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once ('_footer.php') ?>