<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Tentang</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
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
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit halaman "tentang kami"
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/pages/1/tentang">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="title" autofocus="true" value="<?php echo $tentang->title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-sm-2">Deksripsi Tentang Kami</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6"><?php echo $tentang->isi; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-info">Input</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>