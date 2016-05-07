<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+62 1234 5678</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>info@pgn.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <?php if ($this->session->userdata('username') == NULL && $this->session->userdata('logged_in') != TRUE) { ?>
                        <li><a href="<?php echo base_url() . "Cruno/log"; ?>">Masuk</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo base_url() . "Crun0"; ?>">Admin Page</a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>