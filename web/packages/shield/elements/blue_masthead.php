<?php /** @var $pageObj Page : injected by packageElement loader */ ?>
<article class="container masthead">
    <div class="row">
        <div class="column medium-11 medium-centered intro">
			<div class="intro-inner">
	            <h1 class="text-center">
	                <span><?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_title'); ?></span>
	            </h1>
	            <hr/>
	            <?php if($mastheadEditableArea === true && ($c instanceof Page)): ?>
			        <div class="intro-content row">
			        	<div class="column medium-10 medium-centered">
				        	<?php $a = new Area('Masthead'); $a->display($c); ?>
			        	</div>
			        </div>
		        <?php else: ?>
		            <p class="lead uppercase text-center">
		                <?php echo ($customDescr) ? $customDescr : $pageObj->getAttribute('meta_description'); ?>
		            </p>
	            <?php endif; ?>
            </div>
        </div>
    </div>
</article>