<header class="container header bg-white">
    <nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
        <section class="left name">
            <a href="/" title="Svalinn" rel="home">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>logo-svalinn.svg"/>
            </a>
        </section>
        <section class="top-bar-section primary-nav-section show-for-large-up">
            <?php
            $bt = BlockType::getByHandle('autonav');
            $bt->controller->orderBy                 = 'display_asc';
            $bt->controller->displayPages            = 'second_level';
            $bt->controller->displaySubPages         = 'all';
            $bt->controller->displaySubPageLevels    = 'custom';
            $bt->controller->displaySubPageLevelsNum = 1;
            $bt->render('templates/primary_nav');
            ?>
        </section>
        <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>
    </nav>
</header>