<div class="row service-box margin-bottom-40">
    <div style="text-align: center;">
        <?php echo $visi->visi; ?>
    </div>
    <?php foreach ($vimi as $vm) { ?>
        <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
                <h2><?php echo $vm->title_vimi; ?></h2>
                <?php echo $vm->vimi; ?>
            </div>
        </div>
    <?php } ?>
</div>