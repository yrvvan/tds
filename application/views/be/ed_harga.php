<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Harga</li>
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
        <section class="panel">
            <header class="panel-heading">
                Edit Data Harga
            </header>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/edit_harga">
                    <input type="text" hidden="TRUE" name="id_harga" value="<?php echo $data->id_harga; ?>" required>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-input" autocomplete="off" name="title" autofocus="true" required value="<?php echo $data->title; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-input" autocomplete="off" name="produk" autofocus="true" required value="<?php echo $data->produk; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-input" autocomplete="off" name="harga" autofocus="true" required value="<?php echo $data->harga; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label col-sm-2">Deksripsi Pricelist</label>
                        <div class="col-sm-10">
                            <textarea class="form-control ckeditor" name="editor1" rows="6"><?php echo $data->deskripsi; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Input</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>