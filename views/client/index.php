<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               لیست تمامی سفارشات
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست سفارشات</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>تاریخ</th>
                            <th>زمان</th>
                            <th>جمع سفارش</th>
                            <th>تلفن همراه</th>
                            <th>نشانی</th>
                            <th>وضعیت</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $account=$_SESSION['ac_id'];

                        $sql="select * from vw_orders where or_account_id=$account order by or_date desc";
                        $data=select($sql);
                        while ($c=mysqli_fetch_array($data))
                        {
                            print ('
                                         <tr>
                                        <td>'.$c['or_id'].'</td>
                                       <td>'.$c['or_date'].'</td>
                                      <td>'.$c['or_time'].'</td>
                                  
                                      <td>'.number_format($c['or_sum']).' تومان </td>
                                      <td>'.$c['or_mobile'].'</td>
                                     <td title="'.$c['or_address'].'">[نشانی]</td>');

                            if($c['or_status']==0) print ('<td><span class="badge badge-danger">در انتظار پردازش</span> </td>');
                            else if($c['or_status']==1) print ('<td><span class="badge badge-success">ارسال شده</span> </td>');
                            else if($c['or_status']==2) print ('<td><span class="badge badge-primary">لغو شده</span> </td>');


                            print(' <td>
                              <a class="btn btn-primary btn-sm" href="orders_details.php?id='.$c['or_id'].'">
                                 <i class="fa fa-arrow-left"></i> جزئیات سفارش
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