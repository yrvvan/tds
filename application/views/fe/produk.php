<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Produk</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Salah satu Produk dan Pelayanan kami</h1>
                <div class="content-page">
                    <div class="row margin-bottom-30">
                        <!-- BEGIN INFO BLOCK -->               
                        <div class="col-md-7">
                            <h2 class="no-top-space"><?php echo $dtl_produk->title; ?></h2>
                            <?php echo $dtl_produk->deskripsi; ?>
                            <!-- END LISTS -->
                        </div>
                        <!-- END INFO BLOCK -->   

                        <!-- BEGIN CAROUSEL -->            
                        <div class="col-md-5 front-carousel">
                            <div id="myCarousel" class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="<?php echo base_url() . "assets/img/" . $dtl_produk->img; ?>" alt="">
                                        <div class="carousel-caption">
                                            <p><?php echo $dtl_produk->title; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>                
                        </div>
                        <!-- END CAROUSEL -->
                    </div>
                    <!-- BEGIN RECENT WORKS -->
                    <div class="row recent-work margin-bottom-40">
                        <div class="col-md-3">
                            <h2><a href="#">Produk dan Pelayanan Lainnya</a></h2>
                            <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde voluptatem. Sed unde omnis iste natus error sit voluptatem.</p>
                        </div>
                        <div class="col-md-9">
                            <div class="owl-carousel owl-carousel3">
                                <?php foreach ($produk as $prod) { ?>
                                    <div class="recent-work-item">
                                        <em>
                                            <img src="<?php echo base_url() . "assets/img/" . $prod->img; ?>" alt="<?php echo $prod->title; ?>" class="img-responsive">
                                            <a href="<?php echo base_url() . "Cruno/produk/" . $prod->id_produk; ?>"><i class="fa fa-link"></i></a>
                                            <a href="<?php echo base_url() . "assets/img/" . $prod->img; ?>" class="fancybox-button" title="<?php echo $prod->title; ?>" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                                        </em>
                                        <a class="recent-work-description" href="<?php echo base_url() . "Cruno/produk/" . $prod->id_produk; ?>">
                                            <strong><?php echo $prod->title; ?></strong>
                                        </a>
                                    </div>
                                <?php }; ?>
                            </div>       
                        </div>
                    </div>   
                    <!-- END RECENT WORKS -->

                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>