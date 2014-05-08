<?php /** @var $pageObj Page : injected by packageElement loader */ ?>
<article class="container masthead bg-wave-blue">
    <div class="row">
        <div class="column medium-10 medium-centered intro">
            <h1 class="text-center">
                <?php echo $pageObj->getAttribute('meta_title'); ?>
            </h1>
            <p class="lead uppercase text-center">
                <?php echo $pageObj->getAttribute('meta_description'); ?>
            </p>
        </div>
        <?php if($mastheadEditableArea === true && ($c instanceof Page)): ?>
        <div class="column small-8 large-3 small-centered dog">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>celtic-dog-blue.png"/>
            </div>
        <div class="column medium-10 medium-centered">
            <?php $a = new Area('Masthead'); $a->display($c); ?>
            <!--<h2 class="subtitle text-center">The bond between humans and canines is one <br class="show-for-large-up"/>of the most powerful in the natural world.</h2>
            <p class="text-center">Svalinn's training is geared towards honoring the classic partnership between man and dog that has been forged over thousands of years. With focus on a dual role as both friend and protector gives our dogs a level of sociability and vigilance unparalleled in the industry.</p>-->
        </div>
        <?php endif; ?>
    </div>
    <div class="celtic-knot"></div>
</article>