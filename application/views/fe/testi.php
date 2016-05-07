<div class="col-md-5 testimonials-v1">
    <div id="myCarousel" class="carousel slide">
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
    </div>
</div>