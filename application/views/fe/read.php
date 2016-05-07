<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
            <li><a href="#">Baca</a></li>
            <li class="active">
                <?php
                if ($tbl == "artikel") {
                    echo $isi->title_art;
                } else {
                    echo $isi->title_eve;
                }
                ?>
            </li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>
                    <?php
                    if ($tbl == "artikel") {
                        echo $isi->title_art;
                    } else {
                        echo $isi->title_eve;
                    }
                    ?>
                </h1>
                <div class="content-page">
                    <div class="row">
                        <!-- BEGIN LEFT SIDEBAR -->            
                        <div class="col-md-9 col-sm-9 blog-item">
                            <div class="blog-item-img">
                                <img src="<?php
                                if ($tbl == "artikel") {
                                    echo base_url() . "assets/img/" . $isi->img_art;
                                } else {
                                    echo base_url() . "assets/img/" . $isi->img_eve;
                                }
                                ?>" alt="" width="100%">
                                <!-- END CAROUSEL -->             
                            </div>
                            <?php
                            if ($tbl == "artikel") {
                                echo $isi->isi_art;
                            } else {
                                echo $isi->isi_eve;
                            }
                            ?>
                            <ul class="blog-info">
                                <li><i class="fa fa-user"></i> By admin</li>
                                <li><i class="fa fa-calendar"></i> 
                                    <?php
                                    if ($tbl == "artikel") {
                                        echo $isi->create_date;
                                    } else {
                                        echo $isi->tgl_eve;
                                    }
                                    ?>
                                </li>
                                <li><i class="fa fa-tags"></i> 
                                    <?php
                                    if ($tbl == "artikel") {
                                        echo $isi->tag;
                                    } else {
                                        echo $isi->lokasi;
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>

                        <!-- BEGIN RIGHT SIDEBAR -->            
                        <?php $this->load->view('fe/sib'); ?>
                        <!-- END RIGHT SIDEBAR -->            
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>