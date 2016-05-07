<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Jaringan</a></li>
            <li class="active">Internasional</li>
        </ul>
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12">
                <h1>Cakupan Jaringan Internasional Kami</h1>
                <div class="content-page">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gmaps margin-bottom-40">
                                <img src="<?php echo base_url() . "assets/img/" . $luneg->img; ?>" style="width: 100%;"/>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="content-page">
                                <div class="row margin-bottom-30">
                                    <!-- BEGIN INFO BLOCK -->               
                                    <div class="col-md-7">
                                        <h2 class="no-top-space"><?php echo $luneg->title; ?></h2>
                                        <?php echo $luneg->isi; ?>
                                        <!-- END LISTS -->
                                    </div>
                                    <!-- END INFO BLOCK -->   

                                    <!-- BEGIN CAROUSEL -->            
                                    <div class="col-md-5 front-carousel">
                                        <div id="myCarousel" class="carousel slide">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <?php
                                                $no = 1;
                                                foreach ($produk as $prod) {
                                                    if ($no == 1) {
                                                        ?>
                                                        <div class="item active">
                                                        <?php } else { ?>
                                                            <div class="item">
                                                            <?php } ?>
                                                            <img src="<?php echo base_url() . "assets/img/" . $prod->img; ?>" alt="">
                                                            <div class="carousel-caption">
                                                                <p><?php echo $prod->title; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                </div>
                                                <!-- Carousel nav -->
                                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>                
                                        </div>
                                        <!-- END CAROUSEL -->
                                    </div>

                                    <div class="row margin-bottom-40">
                                        <?php if ($error != "") { ?>
                                            <div class="alert alert-success alert-block fade in">
                                                <button data-dismiss="alert" class="close close-sm" type="button">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <h4>
                                                    <i class="fa fa-ok-sign"></i>
                                                    <?php echo $error; ?>
                                                </h4>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- END CONTENT -->
                                </div>
                                <!-- END SIDEBAR & CONTENT -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>