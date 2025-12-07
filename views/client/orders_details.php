<?php include_once ('_header.php') ?>
    <div class="my-3 my-md-5" style="direction: rtl;text-align: right">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               لیست اقلام سفارش
            </h1>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست اقلام</h3>
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
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>جمع کل</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $id=$_GET['id'];
                        $sql="select * from vw_orders_items where it_order_id=$id";
                        $data=select($sql);
                        while ($c=mysqli_fetch_array($data))
                        {
                            $sum=$c['it_count']*$c['it_fee'];
                            print ('
                                         <tr>
                                       <td>'.$c['it_id'].'</td>
                                     <td>'.$c['bo_name'].'</td>
                                     <td>'.$c['gr_name'].'</td>
                                     <td>'.$c['wr_name'].'</td>
                                     <td>'.$c['bo_translate'].'</td>
                                     <td>'.$c['pu_name'].'</td>
                                     <td>'.$c['bo_year'].'</td>
                                         <td>'.number_format($c['it_fee']).' تومان </td>
                                           <td>'.$c['it_count'].'</td>
                                     <td>'.number_format($sum).' تومان </td>
                                     

                          </tr>');
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
<?php include_once ('_footer.php') ?>