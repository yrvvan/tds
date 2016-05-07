<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
            <li class="active"><?php if ($table == "event") { ?>Event<?php } else { ?>Artikel<?php } ?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1><?php if ($table == "event") { ?>Event Terbaru<?php } else { ?>Artikel Terbaru<?php } ?></h1>
                <div class="content-page">
                    <div class="row">
                        <!-- BEGIN LEFT SIDEBAR -->            
                        <div class="col-md-9 col-sm-9 blog-posts">
                            <?php
                            foreach ($some_arsip as $sa) {
                                ?>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <img class="img-responsive" alt="" src="
                                        <?php
                                        if ($table == "event") {
                                            echo base_url() . "assets/img/" . $sa->img_eve;
                                        } else {
                                            echo base_url() . "assets/img/" . $sa->img_art;
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h2>

                                            <?php if ($table == "event") { ?>
                                                <a href="<?php echo base_url() . "Cruno/read/event/" . $sa->id_event; ?>" class="more"><?php echo $sa->title_eve; ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url() . "Cruno/read/artikel/" . $sa->id_artikel; ?>" class="more"><?php echo $sa->title_art; ?></a>
                                            <?php } ?>
                                        </h2>
                                        <ul class="blog-info">
                                            <li><i class="fa fa-calendar"></i> 
                                                <?php
                                                if ($table == "event") {
                                                    echo $sa->tgl_eve;
                                                } else {
                                                    echo $sa->create_date;
                                                }
                                                ?>
                                            </li>
                                            <li><i class="fa fa-tags"></i> 
                                                <?php
                                                if ($table == "event") {
                                                    echo $sa->lokasi;
                                                } else {
                                                    echo $sa->tag;
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                        <?php
                                        if ($table == "event") {
                                            echo $sa->isi_eve;
                                        } else {
                                            echo $sa->isi_art;
                                        }
                                        ?>
                                        <?php if ($table == "event") { ?>
                                            <a href="<?php echo base_url() . "Cruno/read/event/" . $sa->id_event; ?>" class="more">Read more <i class="fa fa-arrow-right"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url() . "Cruno/read/artikel/" . $sa->id_artikel; ?>" class="more">Read more <i class="fa fa-arrow-right"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr class="blog-post-sep">
                            <?php } ?>
                        </div>
                        <!-- END LEFT SIDEBAR -->

                        <!-- BEGIN RIGHT SIDEBAR -->            
                        <?php $this->load->view('fe/sid'); ?>
                        <!-- END RIGHT SIDEBAR -->            
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>