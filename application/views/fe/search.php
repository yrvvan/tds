<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Hasil Pencarian</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12">
                <h1>Hasil Pencarian</h1>
                <div class="content-page">
                    <form action="<?php echo base_url() . "Cruno/search"; ?>" class="content-search-view2" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari..." name="cari" autocomplete="off">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </span>
                        </div>
                    </form>
                    <?php foreach ($src_event as $se) { ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo base_url() . "Cruno/read/event/" . $se->id_event; ?>"><?php echo $se->title_eve; ?></a></h4>
                            <?php echo $se->isi_eve; ?>
                            <a class="search-link" href="<?php echo base_url() . "Cruno/read/event/" . $se->id_event; ?>"><?php echo $se->lokasi . " | " . $se->tgl_eve; ?></a>
                        </div>
                    <?php } ?>
                    <?php foreach ($src_artikel as $sa) { ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo base_url() . "Cruno/read/artikel/" . $sa->id_artikel; ?>"><?php echo $sa->title_art; ?></a></h4>
                            <?php echo $sa->isi_art; ?>
                            <a class="search-link" href="<?php echo base_url() . "Cruno/read/artikel/" . $sa->id_artikel; ?>"><?php echo $sa->tag . " | " . $sa->create_date; ?></a>
                        </div>
                    <?php } ?>
                    <?php foreach ($src_jaringan as $sj) { ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo base_url() . "Cruno/jaringan/" . $sj->id_jaringan; ?>"><?php echo $sj->title; ?></a></h4>
                            <?php echo $sj->isi; ?>
                            <a class="search-link" href="<?php echo base_url() . "Cruno/jaringan/" . $sj->id_jaringan; ?>"><?php echo "Jaringan " . $sj->menu; ?></a>
                        </div>
                    <?php } ?>
                    <?php foreach ($src_karir as $sk) { ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo base_url() . "Cruno/view/karir"; ?>"><?php echo $sk->title; ?></a></h4>
                            <?php echo $sk->deskr_karir; ?>
                            <a class="search-link" href="<?php echo base_url() . "Cruno/view/karir"; ?>"><?php echo $sk->create_date; ?></a>
                        </div>
                    <?php } ?>
                    <?php foreach ($src_produk as $sp) { ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo base_url() . "Cruno/produk/" . $sp->id_produk; ?>"><?php echo $sp->title; ?></a></h4>
                            <?php echo $sp->deskripsi; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>