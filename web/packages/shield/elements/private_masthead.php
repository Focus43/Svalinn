<?php /** @var $pageObj Page : injected by packageElement loader */ ?>

<style>
	.masthead{
		background-image: url(<?php echo ($banner_image) ? $banner_image : $pageObj->getAttribute('masthead_image')->getVersion()->getRelativePath(); ?>);
	}
</style>
<div class="container masthead">
	<div class="inner"><h1><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_title'); ?></h1></div>
</div>
<?php if( $hideSubtitle !== true ): ?>
<div class="container leader">
	<div class="row inner"><h2><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_description'); ?></h2></div>
</div>
<?php endif; ?>
