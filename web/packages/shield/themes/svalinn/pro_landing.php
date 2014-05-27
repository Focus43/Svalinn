<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
    <?php
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 //
    ?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> sublanding">
    <div class="off-canvas-wrap">
        <div class="inner-wrap">
            <!-- BEGIN HEADER -->

            <!-- END HEADER   -->

            <!-- BEGIN .masthead -->
            <!--<article class="container masthead bg-wave-blue">
                    <div class="row">
                        <div class="column medium-10 medium-centered intro">
                            <h1 class="text-center">
                                <?php echo Page::getCurrentPage()->getAttribute('meta_title'); ?>
                            </h1>
                            <p class="lead uppercase text-center">
                                <?php echo Page::getCurrentPage()->getAttribute('meta_description'); ?>
                            </p>
                        </div>
                        <div class="column medium-8 medium-centered">
                            <div class="dog">
                                <img src="<?php echo SHIELD_IMAGES_URL; ?>celtic-dog-blue.png"/>
                            </div>
                            <?php //$a = new Area('Masthead'); $a->display($c); ?>
                            <h2 class="subtitle text-center">The bond between humans and canines is one <br class="show-for-large-up"/>of the most powerful in the natural world.</h2>
                            <p class="text-center">Svalinn's training is geared towards honoring the classic partnership between man and dog that has been forged over thousands of years. With focus on a dual role as both friend and protector gives our dogs a level of sociability and vigilance unparalleled in the industry.</p>
                        </div>
                    </div>
                    <div class="celtic-knot"></div>
                </article>-->
            <?php Loader::packageElement('blue_masthead', 'shield', array(
                'pageObj'               => Page::getCurrentPage(),
                'mastheadEditableArea'  => true,
                'c'                     => $c // gross... but has to be injected
            )); ?>
            <!-- END .masthead -->

            <!-- BEGIN .submast -->
            <article class="container bg-knot-gray-lg">
                <div class="row">
                    <div class="column medium-12 large-10 medium-centered"></div>
                </div>
            </article>
            <!-- END .submast -->

            <!-- BEGIN .content -->
            <article class="container main bg-gray">
                <div class="row">
                    <div class="column medium-12">

                        <!-- CONTENTS -->
                        <div class="options row">
                            <div class="column medium-4">
                                <?php $a = new Area('Main Left'); $a->display($c); ?>
                            </div>
                            <div class="column medium-4">
                                <?php $a = new Area('Main Center'); $a->display($c); ?>
                            </div>
                            <div class="column medium-4">
                                <?php $a = new Area('Main Right'); $a->display($c); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column medium-12">
                                <?php $a = new Area('Main-2'); $a->display($c); ?>
                            </div>
                        </div>
                        <div class="row tab-group">
                            <div class="column  medium-12 large-10 medium-centered">
                                <dl class="tabs vertical" data-tab>
                                    <dd class="active"><a href="#panel1a">The Svalinn Name</a></dd>
                                    <dd><a href="#panel2a">Company History</a></dd>
                                    <dd><a href="#panel3a">History of Working Dogs</a></dd>
                                    <dd><a href="#panel4a">Philosophy &amp; Approach</a></dd>
                                </dl>
                                <div class="tabs-content vertical">
                                    <div class="content active" id="panel1a">
                                        <?php $a = new Area('Panel-1'); $a->display($c); ?>
                                    </div>
                                    <div class="content" id="panel2a">
                                        <?php $a = new Area('Panel-2'); $a->display($c); ?>
                                    </div>
                                    <div class="content" id="panel3a">
                                        <?php $a = new Area('Panel-3'); $a->display($c); ?>
                                    </div>
                                    <div class="content" id="panel4a">
                                        <?php $a = new Area('Panel-4'); $a->display($c); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row testimonials">
                            <div class="column medium-12 large-10 medium-centered">
                                <h3 class="text-center">From Our Clients</h3>
                                <?php
                                $quoteStack = Stack::getByName('Testimonial Quotes')->getBlocks();
                                if( !empty($quoteStack) ){
                                    $quoteStack[array_rand($quoteStack)]->display();
                                }
                                ?>
                            </div>
                        </div>
                        <!-- END CONTENTS -->
                    </div>
                </div>
            </article>
            <!-- END .content -->


            <!-- BEGIN .footer -->
            <?php Loader::packageElement('theme_footer', 'shield'); ?>
            <!-- END .footer -->

            <!-- BEGIN .right-off-canvas-menu -->
            <?php Loader::packageElement('responsive_sidebar', 'shield', array(
                'navigationSettings' => array(
                    'displayPages'   => 'second_level',
                    'displaySubPages' => 'all',
                    'displaySubPageLevels' => 'custom',
                    'displaySubPageLevelsNum' => 1
                )
            )); ?>
            <!-- END .right-off-canvas-menu -->



        </div><!-- END .inner-wrap -->
    </div><!-- END .off-canvas-wrap -->

<?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>