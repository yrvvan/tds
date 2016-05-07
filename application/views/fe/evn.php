<!-- BEGIN BLOCKQUOTE BLOCK -->
<div class="row quote-v1 margin-bottom-30">
    <div class="col-md-9">
        <span>Event</span>
    </div>
    <div class="col-md-3 text-right">
        <a class="btn-transparent" href="<?php echo base_url(); ?>Cruno/all_evart/event" target="_blank"><i class="fa fa-rocket margin-right-10"></i>Lihat Semua</a>
    </div>
</div>
<!-- END BLOCKQUOTE BLOCK -->

<!-- BEGIN RECENT WORKS -->
<div class="row recent-work margin-bottom-40">
    <div class="col-md-3">
        <h2><a href="<?php echo base_url(); ?>Cruno/all_evart/event" target="_blank">Event Terselenggara</a></h2>
        <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde voluptatem. Sed unde omnis iste natus error sit voluptatem.</p>
    </div>
    <div class="col-md-9">
        <div class="owl-carousel owl-carousel3">
            <?php foreach ($event as $eve) { ?>
                <div class="recent-work-item">
                    <em>
                        <img src="<?php echo base_url() . "assets/img/" . $eve->img_eve; ?>" alt="<?php echo $eve->title_eve; ?>" class="img-responsive">
                        <a href="<?php echo base_url() . "Cruno/read/event/" . $eve->id_event; ?>"><i class="fa fa-link"></i></a>
                        <a href="<?php echo base_url() . "assets/img/" . $eve->img_eve; ?>" class="fancybox-button" title="<?php echo $eve->title_eve; ?>" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                    </em>
                    <a class="recent-work-description" href="<?php echo base_url() . "Cruno/read/event/" . $eve->id_event; ?>">
                        <strong><?php echo $eve->title_eve; ?> | <?php echo $eve->lokasi; ?></strong>
                        <b><?php echo $eve->tgl_eve; ?></b>
                    </a>
                </div>
            <?php }; ?>
        </div>       
    </div>
</div>   
<!-- END RECENT WORKS -->