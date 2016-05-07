<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel post-wrap pro-box">
                    <aside class="post-highlight terques v-align">
                        <div class="panel-body">
                            <h2>Selamat datang <strong><?php echo $admin->nm_user; ?></strong>. Direkomendasikan untuk mengganti <a href="<?php echo base_url() . "Crun0/cek_user/" . $admin->username; ?>">"Password"</a> anda secara berkala.</h2>
                        </div>
                    </aside>
                    <aside>
                        <div class="post-info">
                            <span class="arrow-pro left"></span>
                            <div class="panel-body">
                                <div class="text-center twite">
                                    <h1>Go To</h1>
                                </div>

                                <footer class="social-footer">
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url(); ?>">
                                                <i class="fa fa-home"></i>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>Crun0/view/user">
                                                <i class="fa fa-users"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . "Crun0/logout"; ?>">
                                                <i class="fa fa-key"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </footer>
                            </div>
                        </div>
                    </aside>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--timeline start-->
                <section class="panel">
                    <div class="panel-body">
                        <div class="text-center mbot30">
                            <h3 class="timeline-title">Timeline</h3>
                            <p class="t-info">Timeline Log per Bulan</p>
                        </div>

                        <div class="timeline">
                            <?php
                            $no = 1;
                            foreach ($aktifitas as $af) {
                                if ($no % 2 == 0) {
                                    ?>
                                    <article class = "timeline-item">
                                    <?php } else { ?>
                                        <article class = "timeline-item alt">
                                        <?php } ?>
                                        <div class = "timeline-desk">
                                            <div class = "panel">
                                                <div class = "panel-body">
                                                    <span class = "arrow"></span>
                                                    <span class = "timeline-icon blue"></span>
                                                    <span class = "timeline-date"><?php echo substr($af->waktu, 11, 8); ?></span>
                                                    <h1 class="red"><?php echo substr($af->waktu, 0, 10); ?> | <?php echo $af->nm_user; ?></h1>
                                                    <p><?php echo $af->aktifitas; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                    $no++;
                                }
                                ?>
                        </div>

                        <div class="clearfix">&nbsp;</div>
                    </div>
                </section>
                <!--timeline end-->
            </div>
        </div>

        <!-- page end-->
    </section>
</section>