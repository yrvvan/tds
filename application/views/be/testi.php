<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Crun0"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Testimoni Klien</li>
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
                        Data Testimoni
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="table table-striped table-bordered table-hover display" id="example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Klien</th>
                                        <th>Email</th>
                                        <th>Testimoni</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Klien</th>
                                        <th>Email</th>
                                        <th>Testimoni</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($testimoni as $testi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $testi->nama; ?></td>
                                            <td><?php echo $testi->email; ?></td>
                                            <td><?php echo $testi->testi; ?></td>
                                            <td>
                                                <?php if ($testi->approval == "no") { ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . "Crun0/approval/yes/" . $testi->id_testi; ?>"><i class="fa fa-edit"></i> Approve</a>
                                                <?php } else { ?>
                                                    <a class="btn btn-warning" href="<?php echo base_url() . "Crun0/approval/no/" . $testi->id_testi; ?>"><i class="fa fa-edit"></i> Unapprove</a>
                                                <?php } ?>
                                                <a href="<?php echo base_url() . "Crun0/delete/testi/testi/id_testi/" . $testi->id_testi; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data.?');"><i class="fa fa-cut"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>