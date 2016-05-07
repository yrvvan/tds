<!-- BEGIN NAVIGATION -->
<div class="header-navigation pull-right font-transform-inherit">
    <ul>
        <li class="active">
            <a href="<?php echo base_url(); ?>">
                Beranda
            </a>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Produk & Pelayanan                
            </a>
            <ul class="dropdown-menu">
                <?php foreach ($produk as $prod) { ?>
                    <li><a href="<?php echo base_url() . "Cruno/produk/" . $prod->id_produk; ?>"><?php echo $prod->title; ?></a></li>
                <?php } ?>
                <li><a href="<?php echo base_url() . "Cruno/view/price"; ?>">Daftar Harga</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>Cruno/view/about">
                Tentang Kami
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>Cruno/view/contact">
                Kontak Kami                
            </a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Jaringan Kami
            </a>                
            <ul class="dropdown-menu">
                <?php foreach ($jaringan as $jrg) { ?>
                    <li><a href="<?php echo base_url() . "Cruno/jaringan/" . $jrg->id_jaringan; ?>"><?php echo $jrg->menu; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>Cruno/view/karir">
                Karir                
            </a>
        </li>

        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
            <span class="sep"></span>
            <i class="fa fa-search search-btn"></i>
            <div class="search-box">
                <form action="<?php echo base_url() . "Cruno/search"; ?>" method="post">
                    <div class="input-group">
                        <input type="text" placeholder="Cari..." class="form-control" name="cari" autocomplete="off" autofocus="TRUE">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div> 
        </li>
        <!-- END TOP SEARCH -->
    </ul>
</div>
<!-- END NAVIGATION -->