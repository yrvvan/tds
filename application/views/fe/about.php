<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Tentang Kami</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Ingin lebih kenal kami?</h1>
                <div class="content-page">
                    <div class="row margin-bottom-30">
                        <!-- BEGIN INFO BLOCK -->               
                        <div class="col-md-7">
                            <h2 class="no-top-space"><?php echo $about->title; ?></h2>
                            <?php echo $about->isi; ?>
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
                                    foreach ($event as $eve) {
                                        if ($no == 1) {
                                            ?>
                                            <div class="item active">
                                            <?php } else { ?>

                                                <div class="item">
                                                <?php } ?>
                                                <img src="<?php echo base_url() . "assets/img/" . $eve->img_eve; ?>" alt="">
                                                <div class="carousel-caption">
                                                    <p><?php echo $eve->title_eve; ?></p>
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
                            <!-- BEGIN TESTIMONIALS -->
                            <div class="col-md-7 col-sm-7">
                                <h2>Feedback anda sangat berarti bagi kami</h2>
                                <p>Berikan testimoni singkat anda tentang produk dan pelayanan yang telah kami berikan, sebagai tolak ukur dan peningkatan pelayanan kami demi kepuasan pelanggan.</p>
                                <!-- BEGIN FORM-->
                                <form action="<?php echo base_url() . "Cruno/add_testimoni" ?>" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="contacts-name">Nama</label>
                                        <input type="text" class="form-control" id="contacts-name" name="nama" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contacts-email">Email</label>
                                        <input type="email" class="form-control" id="contacts-email" name="email" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="contacts-message">Testimoni</label>
                                        <textarea class="form-control" rows="4" id="contacts-message" name="testimoni"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Kirim</button>
                                    <button type="reset" class="btn btn-default">Batal</button>
                                </form>
                                <!-- END FORM-->
                            </div>
                            <div class="col-md-5 testimonials-v1">
                                <h2>Testimoni Klien</h2>                
                                <div id="myCarousel1" class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <?php
                                        $no = 1;
                                        foreach ($testimoni as $testi) {
                                            if ($no == 1) {
                                                ?>
                                                <div class="active item">
                                                <?php } else { ?>
                                                    <div class="item">
                                                    <?php } ?>
                                                    <blockquote><p><?php echo $testi->testi; ?></p></blockquote>
                                                    <div class="carousel-info">
                                                        <img class="pull-left" src="<?php echo base_url(); ?>assets/img/img1.jpg" alt="">
                                                        <div class="pull-left">
                                                            <span class="testimonials-name"><?php echo $testi->nama; ?></span>
                                                            <span class="testimonials-post"><?php echo $testi->email; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                            <!-- Carousel nav -->
                                            <a class="left-btn" href="#myCarousel1" data-slide="prev"></a>
                                            <a class="right-btn" href="#myCarousel1" data-slide="next"></a>
                                        </div>
                                    </div>
                                    <!-- END TESTIMONIALS -->
                                </div>

                            </div>
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END SIDEBAR & CONTENT -->
                </div>
            </div>
        </div>
    </div>
</div>