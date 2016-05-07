<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Menu" data-placement="right" class="fa fa-bars tooltips"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo" >TDS | <span>PGN</span></a>
    <!--logo end-->
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?php echo base_url() . "assets/img/" . $admin->ava_user; ?>" width="20px;">
                    <span class="username"><?php echo $admin->nm_user; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="<?php echo base_url() . "Crun0/logout"; ?>"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>
</header>