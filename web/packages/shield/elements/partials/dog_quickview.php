<a class="dog-for-sale clearfix <?php echo ($dogObj->getReservedStatus()=="1") ? "reserved" : ""; ?>" href="<?php echo $this->action('profile', $dogObj->getDogID()); ?>" data-provider="<?php echo $dogObj->getName(); ?>" data-name="<?php echo "{$dogObj->getName()}"; ?>">
	<?php if( $dogObj->getPictureFileObj()->getFileID() >= 1 ): ?>
		<img class="thumbnail pull-left" src="<?php echo $image->getThumbnail($dogObj->getPictureFileObj(), 75, 90, true)->src; ?>" />
	<?php else: ?>
		<span class="thumbnail placeholder pull-left">Unavailable</span>
	<?php endif; ?>
	<?php echo $dogObj->getName(); ?>
	
    <small><?php echo $dogObj->getBreedHandle(true); ?> - <?php echo $dogObj->getProtectionHandle(true); ?></small>
    <br />
    
    <?php if( $dogObj->getReservedStatus() == Dogs::RESERVED_YES ): ?>
        <span class="label label-warning">Reserved</span><br>
    <?php endif; ?>
    <?php if( $dogObj->getReservedStatus() == Dogs::RESERVED_SOLD ): ?>
        <span class="label label-important">SOLD</span><br>
    <?php endif; ?>
    
    <?php echo $dogObj->getPrice(true); ?><br />
    
    <?php echo $dogObj->getShortDescription(); ?>
</a>
