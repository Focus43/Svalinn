<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie6 lt-ie7 lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie7  lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie9 oldie"> <![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js"><!--<![endif]-->
<head>
    <?php
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 //
    ?>
    <link rel="stylesheet" href="http://fisherphx.net/svalinn.css" />
</head>

<body class="antialiased<?php echo $bodyClasses; ?> sublanding">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="main-wrap">
            <?php Loader::packageElement('theme_header', 'shield', array(
                'navigationSettings' => array(
                    'displayPages'   => 'second_level',
                    'displaySubPages' => 'all',
                    'displaySubPageLevels' => 'custom',
                    'displaySubPageLevelsNum' => 1
                )
            ));  ?>
            <!-- END HEADER   -->

            <!-- BEGIN .masthead -->
            <?php /* Loader::packageElement('blue_masthead', 'shield', array(
                'pageObj'               => Page::getCurrentPage(),
                'mastheadEditableArea'  => true,
                'c'                     => $c // gross... but has to be injected
            )); */ ?>
            <article class="container masthead">
				    <div class="row">
				        <div class="column medium-11 medium-centered intro">
							<div class="intro-inner">
								<div class="maskTitle">
									<h1>A LEGACY OF VIGILANCE.</h1>
									<span title="A LEGACY OF VIGILANCE."></span>
								</div>
								<hr />
					            <?php $a = new Area('Masthead'); $a->display($c); ?>
				            </div>
				        </div>
				    </div>
				</article>
            <!-- END .masthead -->
            <!-- BEGIN .content -->
            <article class="container main main-1">
            	<div class="row">
            		<div class="column medium-11 medium-centered">
            			<?php $a = new Area('Main Left'); $a->display($c); ?>
            		</div>
            	</div>
            </article>
            <article class="container main main-2">
            	<div class="row">
            		<div class="column medium-12 medium-centered">
            			<?php $a = new Area('Main Center'); $a->display($c); ?>
            		</div>
            	</div>
            </article>
            <article class="container main main-3">
				<div class="row">
					<div class="column medium-12">
                        <?php $a = new Area('Main-2'); $a->display($c); ?>
						<!--<a href="/privateclient/the-svalinn-difference" class="btn btn-bordered btn-md blue cta on-lite uppercase align-center">More about our Dogs</a>-->
					</div>
				</div>
            </article>
            <!-- END .content -->
            <div class="footer-img"></div>
				<div class="testimonials">
					<div class="column medium-10 large-10 medium-centered">
                        <h3 class="text-center">From Our Clients</h3>
                        <?php
                            $quoteStack = Stack::getByName('Testimonial Quotes')->getBlocks();
                            if( !empty($quoteStack) ){
                                $quoteStack[array_rand($quoteStack)]->display();
                            }
                        ?>
					</div>
				</div>
				<!-- BEGIN .footer -->
	            <?php Loader::packageElement('theme_footer', 'shield'); ?>
				<!-- END .footer -->
			</div><!-- END .main-wrap -->

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