<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"> Produk</a></li>
                    <li class="active">Data Produk</li>
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
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/add_produk" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambah Produk</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Title Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" autocomplete="off" name="title" autofocus="true" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-sm-2">Deksripsi Produk</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="editor1" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label col-md-2">Gambar Produk</label>
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
                        <i class="fa fa-plus"></i> Tambah Produk
                    </a>                    
                </div>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Artikel
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Produk</th>
                                        <th>Ringkasan</th>
                                        <th>Image Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $prod) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $prod->title; ?></td>
                                            <td><?php echo substr($prod->deskripsi, 0, 100) . " ..."; ?></td>
                                            <td><img src="<?php echo base_url() . "assets/img/" . $prod->img; ?>" width="200px"/></td>
                                            <td>
                                                <a href="<?php echo base_url() . "Crun0/edit/ed_produk/produk/id_produk/" . $prod->id_produk; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?php echo base_url() . "Crun0/delete/prod/produk/id_produk/" . $prod->id_produk; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data.?');"><i class="fa fa-cut"></i> Delete</a>
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
                                        <th>Produk</th>
                                        <th>Ringkasan</th>
                                        <th>Image Produk</th>
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