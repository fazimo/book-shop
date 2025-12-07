<?php include_once ('_header.php'); ?>

    <div class="col-xl-9 col-lg-8 col-md-7">

            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                    <?php
                        $sql="select  * from vw_books order by bo_register_at desc";

                        if(isset($_GET['age']))
                        {
                            $age=$_GET['age'];
                            $sql="select  * from vw_books where bo_age=$age order by bo_register_at desc";
                        }

                        if( isset($_GET['groups']))
                        {
                            $group=$_GET['groups'];
                            $sql="select  * from vw_books where bo_group_id=$group order by bo_register_at desc";
                        }


                    $data=select($sql);
                        while ($c=mysqli_fetch_array($data))
                        {
                            print('
                              <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" style="width: 100%;height: 350px"  src="../../upload/'.$c['bo_pic'].'" alt="">
                            <div class="content-details fadeIn-bottom">
                                <div class="bottom d-flex align-items-center justify-content-center">
                                    <a href="details.php?id='.$c['bo_id'].'"><span class="lnr lnr-layers"></span></a>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <p style="margin-top: 10px">'.$c['gr_name'].'</p>
                            <h4 class="mt-1">'.$c['bo_name'].'</h4>
                            <p style="margin-top: 10px;color: red">'.number_format($c['bo_fee']).'تومان </p>
                        </div>
                    </div>
                            ');
                        }

                    ?>




                </div>
            </section>
            <!-- End Best Seller -->

        </div>

    </div>
</div>


<?php include_once ('_footer.php'); ?>