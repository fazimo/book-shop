<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <a href="books_add.php" class="btn btn-primary"> <i class="fa fa-plus"> </i>  افزودن کتاب جدید</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست کتب</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>نام</th>
                            <th>گروه</th>
                            <th>نویسنده</th>
                            <th>مترجم</th>
                            <th>ناشر</th>
                            <th>سال نشر</th>
                            <th>رده سنی</th>
                            <th>قیمت</th>
                            <th>ت. موجود</th>
                            <th>شرح</th>

                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $sql="select * from vw_books";
                        $data=select($sql);

                        while ($c=mysqli_fetch_array($data))
                        {
                            print ('
   <tr>
                                     <td>'.$c['bo_id'].'</td>
                                     <td>'.$c['bo_name'].'</td>
                                     <td>'.$c['gr_name'].'</td>
                                     <td>'.$c['wr_name'].'</td>
                                     <td>'.$c['bo_translate'].'</td>
                                     <td>'.$c['pu_name'].'</td>
                                     <td>'.$c['bo_year'].'</td>');

                            if($c['bo_age']==0) print ('<td><span class="badge badge-primary">0-4 سال</span> </td>');
                            else if($c['bo_age']==1)  print ('<td><span class="badge badge-success">5-10 سال</span> </td>');
                            else if($c['bo_age']==2)  print ('<td><span class="badge badge-success">11-15 سال</span> </td>');
                            else if($c['bo_age']==3)  print ('<td><span class="badge badge-success">16-25 سال</span> </td>');
                            else if($c['bo_age']==4)  print ('<td><span class="badge badge-success">بالاتر از 25 سال</span> </td>');

                            print('
                              <td>'.number_format($c['bo_fee']).' تومان </td>
                              <td>'.$c['bo_count'].'</td>
                              <td title="'.$c['bo_text'].'">[شرح]</td>
                            <td>
                              <a class="btn btn-primary btn-sm" href="books_recharge.php?id='.$c['bo_id'].'">
                                 <i class="fa fa-plus"></i> ا. موجودی
                              </a>
                              <a class="btn btn-danger btn-sm" href="books_del.php?id='.$c['bo_id'].'">
                                 <i class="fa fa-remove"></i> حذف
                              </a>
                             </td> </tr>');
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include_once ('_footer.php') ?>