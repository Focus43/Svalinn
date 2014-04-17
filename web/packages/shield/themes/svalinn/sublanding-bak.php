<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?>">
    <div class="off-canvas-wrap">
        <div class="inner-wrap">


            <!-- Start the masthead container -->
            <div class="container masthead">
                <div class="intro">
                    <div class="contain-to-grid">
                        <div class="row collapse"><div class="column small-12 medium-8 large-6">
                                <h1><?php echo $c->getAttribute('main_header'); ?></h1>
                                <p class="hide-for-medium-down"><?php echo $c->getAttribute('sub_header'); ?></p>
                            </div></div>
                    </div>
                </div>
                <div class="gallery">
                    <!--        TODO: use file manager for this image -->
                    <div class="img"><img src="<?php echo SHIELD_IMAGES_URL; ?>masthead/professional-01.jpg" /></div>
                </div>
            </div>

            <!-- Start the main container -->
            <div class="container main" role="main">
                <div class="row section">
                    <div class="small-12 medium-6 columns"><?php $a = new Area('Left Column'); $a->display($c); ?></div>
                    <div class="small-12 medium-6 columns"><?php $a = new Area('Right Column'); $a->display($c); ?></div>
                </div>

                <!-- TESTIMONIALS -->
                <div class="row section testimonials">
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