<header class="container header bg-white">
    <nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
        <section class="left name">
            <a href="/" title="Svalinn" rel="home" id="privateclient">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>logo-svalinn.svg"/>
            </a>
            <a href="/" title="Svalinn" rel="home" id="professional">
                <img src="<?php echo SHIELD_IMAGES_URL; ?>logo-svalinn-professional.png"/>
            </a>
        </section>
        <section class="top-bar-section primary-nav-section show-for-large-up">
            <?php
                $blockTypeNav = BlockType::getByHandle('autonav');
                $blockTypeNav->controller->orderBy = 'display_asc';
                foreach((array) $navigationSettings AS $key => $value){
                    $blockTypeNav->controller->{$key} = $value;
                }
                $blockTypeNav->render('templates/header_nav');
            ?>
        </section>
        <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>
    </nav>
</header>