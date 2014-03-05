<header class="contain-to-grid header">
    <nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
        <section class="left name"><a href="" title="" rel="home">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>logo-svalinn.svg"/>
            </a></section>
            <?php
            $page = Page::getCurrentPage();
            $typeHandle = $page->getCollectionTypeHandle();

            $bt = BlockType::getByHandle('autonav');
            $bt->controller->orderBy              = 'display_asc';
            $bt->controller->displayPages         = 'top';
            $bt->controller->displaySubPages      = ($typeHandle === 'home') ? 'none' : 'all';
            $bt->controller->displaySubPageLevels = ($typeHandle === 'home') ? 'none' :'custom';
            $bt->controller->displaySubPageLevelsNum = 1;
            $bt->render('templates/header_navigation');
            ?>
        <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>
    </nav>
</header>


