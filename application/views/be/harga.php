<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Pricelist</li>
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/add_harga">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambah Harga</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="title" autofocus="true" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="produk" autofocus="true" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="harga" autofocus="true" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-sm-2">Deksripsi Pricelist</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button type="submit" class="btn btn-info">Input</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <a class="btn btn-success" data-toggle="modal" href="#myModal">
                        <i class="fa fa-plus"></i> Tambah Harga
                    </a>                    
                </div>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Harga
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($harga as $hrg) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hrg->title; ?></td>
                                            <td><?php echo $hrg->produk; ?></td>
                                            <td><?php echo $hrg->harga; ?></td>
                                            <td><?php echo $hrg->deskripsi; ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="<?php echo base_url() . "Crun0/edit/ed_harga/harga/id_harga/" . $hrg->id_harga; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-danger" href="<?php echo base_url() . "Crun0/delete/harga/harga/id_harga/" . $hrg->id_harga; ?>" onclick="return confirm('Are you sure you want to delete this data.?');"><i class="fa fa-cut"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>