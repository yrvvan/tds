<div class="row margin-bottom-40 our-clients">
    <div class="col-md-3">
        <h2><a href="#">Klien Kami</a></h2>
        <p>Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p>
    </div>
    <div class="col-md-9">
        <div class="owl-carousel owl-carousel6-brands">
            <?php foreach ($klien as $kli) { ?>
                <div class="client-item">
                    <a href="#">
                        <img src="<?php echo base_url() . "assets/img/" . $kli->img; ?>" class="img-responsive" alt="<?php echo $kli->alt; ?>">
                        <img src="<?php echo base_url() . "assets/img/" . $kli->img; ?>" class="color-img img-responsive" alt="<?php echo $kli->alt; ?>">
                    </a>
                </div>
            <?php }; ?>
        </div>
    </div>          
</div>