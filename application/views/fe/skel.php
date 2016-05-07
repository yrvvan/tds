<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('fe/head'); ?>

    <body class="corporate">
        <?php $this->load->view('fe/preh'); ?>
        <?php $this->load->view('fe/hea'); ?><!--sub-->

        <?php $this->load->view('fe/' . $content); ?><!--sub-->

        <?php $this->load->view('fe/prefo'); ?><!--sub-->
        <?php $this->load->view('fe/foo'); ?>
        <?php $this->load->view('fe/scr'); ?>

    </body>
</html>