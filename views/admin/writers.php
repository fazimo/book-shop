<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <a href="writers_add.php" class="btn btn-primary"> <i class="fa fa-plus"> </i>  افزودن نویسنده جدید</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست نویسندگان</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>نام نویسنده</th>
                            <th>تعداد کتاب ها</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $sql="select * from vw_writers";
                        $data=select($sql);

                        while ($c=mysqli_fetch_array($data))
                        {
                            print ('
   <tr>
                                     <td>'.$c['wr_id'].'</td>
                                     <td>'.$c['wr_name'].'</td>
                                      <td><span class="badge badge-dark">'.$c['count'].' کتاب</span> </td>
                                    <td>
                              <a class="btn btn-danger btn-sm" href="writers_del.php?id='.$c['wr_id'].'">
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