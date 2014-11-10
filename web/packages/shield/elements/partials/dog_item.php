<?php /** @var $dogObj ShieldDog */ ?>
<div class="row">
    <div class="small-12 columns">
        <a class="pic" href="<?php echo $this->action('details', $dogObj->getDogID()); ?>">
            <?php if( $dogObj->getPictureFileObj()->getFileID() >= 1 ): ?>
                <img src="<?php echo $imageHelper->getThumbnail($dogObj->getPictureFileObj(), 600, 368, true)->src; ?>" />
            <?php else: ?>
                <img src="<?php echo SHIELD_IMAGES_URL; ?>dog-placeholder.jpg"/>
            <?php endif; ?>

            <?php if( (int)$dogObj->getReservedStatus() !== ShieldDog::RESERVED_NO ): ?>
            <span class="ribbon <?php echo strtolower($dogObj->getReservedStatus(true)); ?>">
                <?php echo ((int)$dogObj->getReservedStatus() === ShieldDog::RESERVED_YES) ? sprintf('Reserved until %s', $dogObj->getReservedUntil('M d, Y')) : $dogObj->getReservedStatus(true); //((int)$this->reservedStatus === self::RESERVED_YES ? sprintf('until %s', $this->getReservedUntil('M d, Y')) : '') ?>
            </span>
            <?php endif; ?>
        </a>
    </div>
</div>
<div class="row">
    <div class="small-6 columns name"><?php echo $dogObj->getName(); ?></div>
    <div class="small-6 columns breed"><?php echo $dogObj->getBreedHandle(true); ?></div>
</div>
<div class="row">
	<div class="column">
		<hr/>
	</div>
<div class="row">
    <div class="small-6 columns dob"><?php echo $dogObj->getBirthdate('M d, Y'); ?></div>
    <!--<div class="small-6 columns level"><?php echo $dogObj->getProtectionHandle(true); ?> Protection</div>-->
</div>