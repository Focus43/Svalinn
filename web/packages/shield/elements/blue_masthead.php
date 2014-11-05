<?php /** @var $pageObj Page : injected by packageElement loader */ ?>
<div class="container masthead">
	<div class="inner"><h1><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_title'); ?></h1></div>
</div>
<?php if( $hideSubtitle !== true ): ?>
<div class="container leader">
	<div class="inner"><h2><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_description'); ?></h2></div>
</div>
<?php endif; ?>