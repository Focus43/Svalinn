<?php /** @var $dogObj ShieldDog */ ?>
<div class="row">
    <div class="small-12 columns">
        <a href="<?php echo $this->action('details', $dogObj->getDogID()); ?>">
            <?php if( $dogObj->getPictureFileObj()->getFileID() >= 1 ): ?>
                <img src="<?php echo $imageHelper->getThumbnail($dogObj->getPictureFileObj(), 400, 245, true)->src; ?>" />
            <?php else: ?>
                <img src="<?php echo SHIELD_IMAGES_URL; ?>dog-placeholder.jpg"/>
            <?php endif; ?>
        </a>
    </div>
</div>
<div class="row">
    <div class="small-6 columns name"><?php echo $dogObj->getName(); ?></div>
    <div class="small-6 columns breed"><?php echo $dogObj->getBreedHandle(true); ?></div>
</div>
<hr/>
<div class="row">
    <div class="small-6 columns level"><?php echo $dogObj->getProtectionHandle(true); ?> Protection</div>
    <div class="small-6 columns dob"><?php echo $dogObj->getBirthdate('M d, Y'); ?></div>
</div>