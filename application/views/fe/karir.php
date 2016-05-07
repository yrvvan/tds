<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Karir</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-9">
                <h1>Karir</h1>
                <div class="content-page">
                    <!-- BEGIN CAROUSEL -->            
                    <div class="front-carousel margin-bottom-20">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo base_url(); ?>assets/img/karir1.jpg" alt="" width="100%">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url(); ?>assets/img/karir2.png" alt="" width="100%">
                                </div>
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

                    <!-- BEGIN INFO BLOCK -->               
                    <h2>Jadilah bagian dari kami</h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p> 
                    <!-- BEGIN LISTS -->

                    <h2>Posisi yang tersedia</h2>
                    <div id="accordion1" class="panel-group">
                        <?php foreach ($karir as $kr) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?php echo $kr->id_karir; ?>">
                                            <?php echo $kr->title; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div style="height: 0px;" id="accordion1_<?php echo $kr->id_karir; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php echo $kr->deskr_karir; ?>
                                        <hr>
                                        <p>Memenuhi persyaratan.? Kirim resume dan cv anda pada form yang telah disediakan pada sidebar.</p>
                                    </div>
                                </div>
                            </div>         
                        <?php } ?>
                    </div>                
                </div>
            </div>

            <div class="col-md-3 col-sm-3 sidebar2">
                <h2 class="padding-top-30">Kontak kami</h2>
                <address>
                    <strong>Loop, Inc.</strong><br>
                    795 Park Ave, Suite 120<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (234) 145-1810
                </address>
                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:info@email.com">info@email.com</a><br>
                    <a href="mailto:support@example.com">support@example.com</a>
                </address>

                <h2 class="padding-top-20">Apply</h2>
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
                <!-- BEGIN FORM-->
                <form action="<?php echo base_url() . "Cruno/add_resume"; ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label for="career-name">Nama</label>
                        <input type="text" class="form-control" name="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="career-name">Email</label>
                        <input type="email" class="form-control" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="career-position">Posisi</label>
                        <select class="form-control" name="posisi">
                            <?php foreach ($karir as $kr) { ?>
                                <option value="<?php echo $kr->title; ?>"><?php echo $kr->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="career-resume">Resume</label>  |  <small>*Less than 2Mb  |  zip|doc|docx|pdf</small>
                        <input type="file" id="career-resume" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Kirim</button>
                </form>
                <!-- END FORM-->                                     
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
    </div>
</div>