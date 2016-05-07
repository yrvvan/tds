<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Kontak Kami</li>
        </ul>
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12">
                <h1>Lokasi Kami</h1>
                <div class="content-page">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <h2>Lebih dekat dengan kami</h2>
                            <p>Graha PGAS, Jl. Kyai Haji Zainul Arifin No. 20,Daerah Khusus Ibukota Jakarta.</p>
                            <!-- BEGIN FORM-->
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
                            <form action="<?php echo base_url() . "Cruno/add_pesan" ?>" method="POST" role="form">
                                <div class="form-group">
                                    <label for="contacts-name">Nama</label>
                                    <input type="text" class="form-control" id="contacts-name" name="nama" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="contacts-email">Email</label>
                                    <input type="email" class="form-control" id="contacts-email" name="email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="contacts-message">Pesan</label>
                                    <textarea class="form-control" rows="4" id="contacts-message" name="pesan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Kirim</button>
                                <button type="reset" class="btn btn-default">Batal</button>
                            </form>
                            <!-- END FORM-->
                        </div>

                        <div class="col-md-3 col-sm-3 sidebar2">
                            <h2>Kontak Kami</h2>
                            <address>
                                <strong>Loop, Inc.</strong><br>
                                795 Park Ave, Suite 120<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (234) 145-1810
                            </address>
                            <address>
                                <strong>Email</strong><br>
                                <a href="mailto:info@email.com">pgn@email.com</a><br>
                                <a href="mailto:support@example.com">support@pgn.com</a>
                            </address>   
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>