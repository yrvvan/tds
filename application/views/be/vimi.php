<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Misi Perusahaan</a></li>
                    <li class="active">Kolom <?php
                        if ($isi->id_vimi == "v01") {
                            echo "1";
                        } elseif ($isi->id_vimi == "v02") {
                            echo "2";
                        } else {
                            echo "3";
                        }
                        ?></li>
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
                        Misi Kolom <?php
                        if ($isi->id_vimi == "v01") {
                            echo "Satu";
                        } elseif ($isi->id_vimi == "v02") {
                            echo "Dua";
                        } else {
                            echo "Tiga";
                        }
                        ?>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="<?php echo base_url() . "Crun0/vimi/" . $isi->id_vimi; ?>" method="POST">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control round-input" autocomplete="off" required="TRUE" value="<?php echo $isi->title_vimi; ?>" autofocus="TRUE">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-sm-2">Misi Perusahaan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6" required="TRUE"><?php echo $isi->vimi; ?></textarea>
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