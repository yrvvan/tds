<script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>      
<script src="<?php echo base_url() ?>assets/js/back-to-top.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo base_url() ?>assets/js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?php echo base_url() ?>assets/js/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

<!-- BEGIN RevolutionSlider -->

<script src="<?php echo base_url() ?>assets/js/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>assets/js/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>assets/js/revo-slider-init.js" type="text/javascript"></script>
<!-- END RevolutionSlider -->

<script src="<?php echo base_url() ?>assets/js/layout.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        RevosliderInit.initRevoSlider();
        Layout.initTwitter();
        Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
        Layout.initNavScrolling();
    });
    //menentukan koordinat titik tengah peta
    var myLatlng = new google.maps.LatLng(-6.159399, 106.814940);
//              pengaturan zoom dan titik tengah peta
    var myOptions = {
        zoom: 13,
        center: myLatlng
    };
//              menampilkan output pada element
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
//              menambahkan marker
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "Perusahaan Gas Negara"
    });
</script>