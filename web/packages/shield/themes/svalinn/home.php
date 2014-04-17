<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
<?php
    $formHelper = Loader::helper('form');
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased home <?php echo $bodyClasses; ?>">

<div class="off-canvas-wrap">
    <div class="inner-wrap">

        <?php Loader::packageElement('theme_header', 'shield'); ?>

        <!-- Start the masthead container -->
        <div class="container masthead">
            <div class="intro">
                <div class="contain-to-grid">
                    <div class="row collapse">
                        <div class="column small-12 medium-8 large-6">
                            <h1><?php $a = new Area('Main Header'); $a->display($c); ?></h1>
                            <p class="hide-for-medium-down"><span><?php $a = new Area('Sub Header'); $a->display($c); ?></span></p>
                            <ul class="inline-list">
                                <li><a href="/privateclient" class="btn btn-md  btn-blue-inverse uppercase">Private Client</a></li>
                                <li><a href="/professional" class="btn btn-md btn-blue-inverse uppercase">Professional</a></li>
                            </ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="gallery">
                <!--        TODO: use file manager for this image -->
                <div class="img"><img src="<?php echo SHIELD_IMAGES_URL; ?>masthead/home-01.jpg" /></div>
            </div>
        </div>

        <!-- Start the main container -->
        <div class="container feature">
            <div class="contain-to-grid">
                <div class="row">
                    <div class="column medium-8">
                        <h2><?php $a = new Area('Content Header'); $a->display($c); ?></h2>
                        <p><?php $a = new Area('Content'); $a->display($c); ?></p>
                        <p><a href="">Learn About The Dogs &raquo;</a></p>
                    </div>
                    <div class="seal show-for-medium-up"><img src="<?php echo SHIELD_IMAGES_URL; ?>/k9-textured-seal.png"/></div>
                </div>
            </div>
            <div class="dash"></div>
        </div>

        <div class="container main" role="main">
            <div class="the-best">
                <div class="row">
                    <div class="medium-8 columns medium-centered">
                        <p class="text-center"><img class="dog" src="<?php echo SHIELD_IMAGES_URL; ?>/dog-silhouette.png"/></p>
                        <h1 class="text-center"><span>BEST</span></h1>
                    </div>
                </div>
                <div class="row divided collapse">
                    <div class="medium-4 columns">
                        <h2 class="text-center"><?php $a = new Area('Three Col Header 1'); $a->display($c); ?></h2>
                        <p class="text-center"><?php $a = new Area('Three Col Content 1'); $a->display($c); ?></p>
                    </div>
                    <div class="medium-4 columns">
                        <h2 class="text-center"><?php $a = new Area('Three Col Header 2'); $a->display($c); ?></h2>
                        <p class="text-center"><?php $a = new Area('Three Col Content 2'); $a->display($c); ?></p>
                    </div>
                    <div class="medium-4 columns">
                        <h2 class="text-center"><?php $a = new Area('Three Col Header 3'); $a->display($c); ?></h2>
                        <p class="text-center"><?php $a = new Area('Three Col Content 3'); $a->display($c); ?></p>
                    </div>
                </div>
                <div class="row cta">
                    <div class="medium-8 columns medium-centered text-center">
                        <a class="btn btn-red-inverse" href="">More about our k9s</a>
                    </div>
                </div>
            </div>
            <div class="row feathered-divide">
                <div class="small-12 medium-6 columns">
                    <p><?php $a = new Area('Left Column'); $a->display($c); ?></p>
                </div>
                <div class="small-12 medium-6 columns">
                    <p><?php $a = new Area('Right Column'); $a->display($c); ?></p>
                </div>
            </div>

            <!-- TESTIMONIALS -->
            <div class="row testimonials">
                <div class="column medium-10 medium-centered">
                    <h3 class="text-center">From Our Clients</h3>
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
            </div>

        </div>

        <?php Loader::packageElement('theme_footer', 'shield'); ?>
        <?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>
