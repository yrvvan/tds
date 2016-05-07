<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Tag</li>
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
                        Tambah Tag
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>Crun0/add_tag">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Tag</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" name="tag" autocomplete="off" autofocus="TRUE">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-info">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Tag
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tag</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tag as $tg) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $tg->tag; ?></td>
                                            <td><?php echo $tg->create_date; ?></td>
                                            <td><a class="btn btn-danger" href="<?php echo base_url() . "Crun0/del_tag/" . $tg->id_tags; ?>" onclick="return confirm('Are you sure you want to delete this data.?');"><i class="fa fa-cut"></i> Delete</a></td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tag</th>
                                        <th>Created Date</th>
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