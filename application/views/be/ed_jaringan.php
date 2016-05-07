<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Jaringan</li>
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
                        Edit halaman "Jaringan"
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/edit_jaringan" enctype="multipart/form-data">
                            <input type="text" hidden="TRUE" name="id_jaringan" value="<?php echo $data->id_jaringan; ?>" required>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="menu" autofocus="true" value="<?php echo $data->menu; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="title" autofocus="true" value="<?php echo $data->title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-sm-2">Deskripsi Jaringan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6"><?php echo $data->isi; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-md-2">Gambar Jaringan</label>
                                <div class="col-sm-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="file"/>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="label label-danger">NOTE!</span>
                                    <span>
                                        Attached image thumbnail is
                                        supported in Latest Firefox, Chrome, Opera,
                                        Safari and Internet Explorer 10 only
                                    </span>
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