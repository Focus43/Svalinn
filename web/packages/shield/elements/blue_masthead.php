<?php /** @var $pageObj Page : injected by packageElement loader */ ?>
<article class="container masthead bg-wave-blue">
    <div class="row">
        <div class="column medium-10 medium-centered intro">
            <h1 class="text-center">
                <?php echo ($customTitle) ? $customTitle : $pageObj->getAttribute('meta_title'); ?>
            </h1>
            <p class="lead uppercase text-center">
                <?php echo ($customDescr) ? $customDescr : $pageObj->getAttribute('meta_description'); ?>
            </p>
        </div>
        <?php if($mastheadEditableArea === true && ($c instanceof Page)): ?>
        <div class="column small-8 large-3 small-centered dog">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>celtic-dog-blue.png"/>
            </div>
        <div class="column medium-10 medium-centered">
            <?php $a = new Area('Masthead'); $a->display($c); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="celtic-knot"></div>
</article>