<?php ?>
<div class="dog-gallery" style="text-align: center">

    <?php foreach ($galleryFiles as $file) {
        $fv = $file->getApprovedVersion();
        $desc = $fv->getDescription();
        ?>
        <img src="<?php echo $image->getThumbnail($file, 600, 400, false)->src; ?>" class="thumbnail" style="margin: 0 auto">
        <span class="caption"><?php echo $desc ?></span>

    <?php } ?>

</div>
