<!-- BEGIN BLOCKQUOTE BLOCK -->
<div class="row quote-v1 margin-bottom-30">
    <div class="col-md-9">
        <span>Artikel</span>
    </div>
    <div class="col-md-3 text-right">
        <a class="btn-transparent" href="<?php echo base_url(); ?>Cruno/all_evart/artikel" target="_blank"><i class="fa fa-rocket margin-right-10"></i>Lihat Semua</a>
    </div>
</div>
<!-- END BLOCKQUOTE BLOCK -->

<!-- BEGIN RECENT WORKS -->
<div class="row recent-work margin-bottom-40">
    <div class="col-md-3">
        <h2><a href="<?php echo base_url(); ?>Cruno/all_evart/artikel" target="_blank">Artikel Terakhir</a></h2>
        <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde voluptatem. Sed unde omnis iste natus error sit voluptatem.</p>
    </div>
    <div class="col-md-9">
        <div class="owl-carousel owl-carousel3">
            <?php foreach ($artikel as $art) { ?>
                <div class="recent-work-item">
                    <em>
                        <img src="<?php echo base_url() . "assets/img/" . $art->img_art; ?>" alt="<?php echo $art->title_art; ?>" class="img-responsive">
                        <a href="<?php echo base_url() . "Cruno/read/artikel/" . $art->id_artikel; ?>"><i class="fa fa-link"></i></a>
                        <a href="<?php echo base_url() . "assets/img/" . $art->img_art; ?>" class="fancybox-button" title="<?php echo $art->title_art; ?>" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                    </em>
                    <a class="recent-work-description" href="<?php echo base_url() . "Cruno/read/artikel/" . $art->id_artikel; ?>">
                        <strong><?php echo $art->title_art; ?> | <?php echo $art->tag; ?></strong>
                        <b><?php echo $art->create_date; ?></b>
                    </a>
                </div>
            <?php }; ?>
        </div>       
    </div>
</div>   
<!-- END RECENT WORKS -->