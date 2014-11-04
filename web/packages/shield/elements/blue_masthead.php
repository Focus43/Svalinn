<?php /** @var $pageObj Page : injected by packageElement loader */ ?>
<article class="container masthead">
	<div class="inner"><span><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_title'); ?></span></div>
</article>