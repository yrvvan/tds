<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Harga</li>
        </ul>
        <!-- BEGIN CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Daftar Harga</h1>
                <div class="content-page">
                    <div class="row margin-bottom-40">
                        <!-- Pricing -->
                        <?php
                        $no = 1;
                        foreach ($harga as $hrg) {
                            ?>
                            <div class="col-md-3">
                                <?php if ($no == 1) { ?>
                                    <div class="pricing pricing-active hover-effect">
                                        <div class="pricing-head pricing-head-active">
                                        <?php } else { ?>
                                            <div class="pricing hover-effect">
                                                <div class="pricing-head">
                                                <?php } ?>
                                                <h3><?php echo $hrg->title; ?>
                                                    <span>
                                                        <?php echo $hrg->produk; ?>
                                                    </span>
                                                </h3>
                                                <h4><i>Rp</i><?php echo substr($hrg->harga, 0, 3); ?><i>.<?php echo substr($hrg->harga, 3, 3); ?></i>
                                                    <span>
                                                        Per Month
                                                    </span>
                                                </h4>
                                            </div>
                                            <div class="pricing-footer" style="text-align: left;">
                                                <?php echo $hrg->deskripsi; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $no++;
                                }
                                ?>
                                <!--//End Pricing -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
</div>