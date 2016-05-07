<div class="col-md-4 col-sm-6 pre-footer-col testimonials-v1" style="overflow-y: scroll; height: 300px;">
    <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php
            foreach ($testimoni as $testi) {
                ?>
                <div class = "item active" style="margin: 5px 0;">
                    <blockquote><p><?php echo $testi->testi; ?></p></blockquote>
                    <div class="carousel-info">
                        <img class="pull-left" src="<?php echo base_url(); ?>assets/img/anon.jpg" alt="">
                        <div class="pull-left">
                            <span class="testimonials-name" style="color:white;"><?php echo $testi->nama; ?></span>
                            <span class="testimonials-post" style="color:#cccccc;"><?php echo $testi->email; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>