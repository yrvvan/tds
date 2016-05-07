<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('be/head'); ?>

    <body>

        <section id="container" class="">
            <?php $this->load->view('be/hea'); ?>
            <?php $this->load->view('be/sid'); ?>
            <?php $this->load->view('be/'.$cont); ?>
            <!--<?php $this->load->view('be/foo'); ?>-->
        </section>

        <?php $this->load->view('be/scr'); ?>
    </body>
</html>
