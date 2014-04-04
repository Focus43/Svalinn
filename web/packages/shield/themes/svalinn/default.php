<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <?php
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 // 
    ?>
</head>

<body class="antialiased <?php echo $c->getAttribute('body_class'); ?>">

<div class="off-canvas-wrap">
    <div class="inner-wrap">

        <?php Loader::packageElement('theme_header', 'shield'); ?>

        <!-- Start the masthead container -->
        <div class="container masthead masthead-title">
            <div class="gallery">
                <!--        TODO: use file manager for this image -->
                <div class="img"><img src="<?php echo SHIELD_IMAGES_URL; ?>masthead/professional-01.jpg" /></div>
            </div>
        </div>

        <!-- Start the main container -->
        <div class="row section">
            <div class="small-12 medium-2 columns">
                <?php
                // check if current page has subs
                // if not the sub nav should display current level pages
                $displayPages = ($c->getNumChildren() > 0) ? "below" : "current";

                $bt = BlockType::getByHandle('autonav');
                $bt->controller->orderBy = 'display_asc';
                $bt->controller->displayPages = $displayPages;
                $bt->controller->displaySubPages = 'none';
                $bt->controller->displaySubPageLevels = 'enough';
                $bt->render('templates/svalinn_sidenav');
                ?>
            </div>
            <div class="small-12 medium-10 columns">
                <h1><?php echo Page::getCurrentPage()->getCollectionName(); ?></h1>
                <p><?php $a = new Area('Intro'); $a->display($c); ?></p>
                <h2 class="feature-title"><?php echo Page::getCurrentPage()->getCollectionDescription(); ?></h2>
                <p><?php $a = new Area('Content Top'); $a->display($c); ?></p>
                <div class="panel">
                    <blockquote>
                        <p class="text-center">
                            <?php
                            $quoteStack = new Stack();
                            $quoteBlocks = $quoteStack->getByName("Testimonial Quotes")->getBlocks();
                            if ( count($quoteBlocks) > 0 ) {
                                $quoteBlocks[ rand ( 0 , count($quoteBlocks)-1) ]->display();
                            }
                            ?>
                        </p>
                    </blockquote>
                </div>
                <p><?php $a = new Area('Content Bottom'); $a->display($c); ?></p>
            </div>
        </div>

        </div>
        <?php Loader::packageElement('theme_footer', 'shield'); ?>
        <?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>