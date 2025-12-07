<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               لیست نظرات کاربران
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست نظرات کاربران</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>تاریخ</th>
                            <th>زمان</th>
                            <th>نام کتاب</th>
                            <th>متن نظر</th>
                            <th>وضعیت</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $sql="select * from vw_comments order by cm_date desc";
                        $data=select($sql);
                        while ($c=mysqli_fetch_array($data))
                        {
                            print ('
   <tr>
                                     <td>'.$c['cm_id'].'</td>
                                     <td>'.$c['cm_date'].'</td>
                                      <td>'.$c['cm_time'].'</td>
                                      <td>'.$c['bo_name'].'</td>
                                      <td>'.$c['cm_text'].'</td>
                                      <td title="'.$c['cm_text'].'">[شرح]</td>');

                                    if($c['cm_visible']==0) print ('<td><span class="badge badge-danger">در انتظار تائید</span> </td>');
                                    else print ('<td><span class="badge badge-success">در حال نمایش</span> </td>');
                                        
                                    print(' <td>
                              <a class="btn btn-success btn-sm" href="comments_accept.php?id='.$c['cm_id'].'">
                                 <i class="fa fa-check"></i> تائید نظر 
                              </a>
                              <a class="btn btn-danger btn-sm" href="comments_del.php?id='.$c['cm_id'].'">
                                 <i class="fa fa-remove"></i> حذف نظر 
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