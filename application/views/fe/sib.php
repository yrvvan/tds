<div class="col-md-3 col-sm-3 blog-sidebar">
    <!-- CATEGORIES START -->
    <h2 class="no-top-space">Arsip</h2>
    <ul class="nav sidebar-categories margin-bottom-40">
        <?php
        foreach ($arsip as $ars) {
            if ($table == "event") {
                if (substr($ars->tgl_eve, 5, 2) == 1) {
                    $bulan = "Januari";
                } elseif (substr($ars->tgl_eve, 5, 2) == 2) {
                    $bulan = "Februari";
                } elseif (substr($ars->tgl_eve, 5, 2) == 3) {
                    $bulan = "Maret";
                } elseif (substr($ars->tgl_eve, 5, 2) == 4) {
                    $bulan = "April";
                } elseif (substr($ars->tgl_eve, 5, 2) == 5) {
                    $bulan = "Mei";
                } elseif (substr($ars->tgl_eve, 5, 2) == 6) {
                    $bulan = "Juni";
                } elseif (substr($ars->tgl_eve, 5, 2) == 7) {
                    $bulan = "Juli";
                } elseif (substr($ars->tgl_eve, 5, 2) == 8) {
                    $bulan = "Agustus";
                } elseif (substr($ars->tgl_eve, 5, 2) == 9) {
                    $bulan = "September";
                } elseif (substr($ars->tgl_eve, 5, 2) == 10) {
                    $bulan = "Oktober";
                } elseif (substr($ars->tgl_eve, 5, 2) == 11) {
                    $bulan = "November";
                } else {
                    $bulan = "Desember";
                }
            } else {
                if (substr($ars->create_date, 5, 2) == 1) {
                    $bulan = "Januari";
                } elseif (substr($ars->create_date, 5, 2) == 2) {
                    $bulan = "Februari";
                } elseif (substr($ars->create_date, 5, 2) == 3) {
                    $bulan = "Maret";
                } elseif (substr($ars->create_date, 5, 2) == 4) {
                    $bulan = "April";
                } elseif (substr($ars->create_date, 5, 2) == 5) {
                    $bulan = "Mei";
                } elseif (substr($ars->create_date, 5, 2) == 6) {
                    $bulan = "Juni";
                } elseif (substr($ars->create_date, 5, 2) == 7) {
                    $bulan = "Juli";
                } elseif (substr($ars->create_date, 5, 2) == 8) {
                    $bulan = "Agustus";
                } elseif (substr($ars->create_date, 5, 2) == 9) {
                    $bulan = "September";
                } elseif (substr($ars->create_date, 5, 2) == 10) {
                    $bulan = "Oktober";
                } elseif (substr($ars->create_date, 5, 2) == 11) {
                    $bulan = "November";
                } else {
                    $bulan = "Desember";
                }
            }
            if ($table == "event") {
                ?>
                <li><a href="<?php echo base_url() . "Cruno/arsip/event/" . substr($ars->tgl_eve, 0, 4) . "/" . substr($ars->tgl_eve, 5, 2); ?>"><?php echo $bulan . " " . substr($ars->tgl_eve, 0, 4) . " " . "(" . $ars->jum . ")"; ?> </a></li>
            <?php } else { ?>
                <li><a href="<?php echo base_url() . "Cruno/arsip/artikel/" . substr($ars->create_date, 0, 4) . "/" . substr($ars->create_date, 5, 2); ?>"><?php echo $bulan . " " . substr($ars->create_date, 0, 4) . " " . "(" . $ars->jum . ")"; ?> </a></li>
                <?php
            }
        }
        ?>
    </ul>
    <!-- CATEGORIES END -->

    <!-- BEGIN RECENT NEWS -->                            
    <?php if ($table == "event") { ?>
        <h2>Event Terkait</h2>
    <?php } else { ?>
        <h2>Artikel Terkait</h2>
    <?php } ?>

    <div class="recent-news margin-bottom-10" style="overflow-y: scroll; height:250px;">
        <?php if ($table == "event") { ?>
            <?php foreach ($event as $eve) { ?>
                <div class="row margin-bottom-10">
                    <div class="col-md-3">
                        <img class="img-responsive" alt="" src="<?php echo base_url() . "assets/img/" . $eve->img_eve; ?>">                        
                    </div>
                    <div class="col-md-9 recent-news-inner">
                        <h3><a href="<?php echo base_url() . "Cruno/read/event/" . $eve->id_event; ?>"><?php echo $eve->title_eve; ?></a></h3>
                        <p><?php echo $eve->tgl_eve; ?></p>
                    </div>                        
                </div>
                <?php
            }
        } else {
            foreach ($artikel as $art) {
                ?>
                <div class="row margin-bottom-10">
                    <div class="col-md-3">
                        <img class="img-responsive" alt="" src="<?php echo base_url() . "assets/img/" . $art->img_art; ?>"/>
                    </div>
                    <div class="col-md-9 recent-news-inner">
                        <h3><a href="<?php echo base_url() . "Cruno/read/artikel/" . $art->id_artikel; ?>"><?php echo $art->title_art; ?></a></h3>
                        <p><?php echo $art->create_date; ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <!-- END RECENT NEWS -->

    <!-- BEGIN BLOG TAGS -->
    <div class="blog-tags margin-bottom-20">
        <?php if ($table != "event") { ?>
            <h2>Tags</h2>
            <ul>
                <?php foreach ($tag as $tag) { ?>
                    <li><a href="#"><i class="fa fa-tags"></i><?php echo $tag->tag; ?></a></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <h2>Lokasi</h2>
            <ul>
                <?php foreach ($event as $eve) { ?>
                    <li><a href="#"><i class="fa fa-tags"></i><?php echo $eve->lokasi; ?></a></li>                
                        <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <!-- END BLOG TAGS -->
</div>