<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> default">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="main-wrap">
				<!-- BEGIN HEADER -->
	            <?php Loader::packageElement('theme_header', 'shield', array(
	                'navigationSettings' => array(
	                    'displayPages'   => 'second_level',
	                    'displaySubPages' => 'all',
	                    'displaySubPageLevels' => 'custom',
	                    'displaySubPageLevelsNum' => 1
	                )
	            )); ?>
				<!-- END HEADER   -->
				
				<!-- BEGIN .masthead -->
				<?php Loader::packageElement('blue_masthead', 'shield', array('pageObj' => Page::getCurrentPage())); ?>
				<!-- END .masthead -->
				
				<!-- BEGIN .content -->
				<article class="container main main-1">
					<div class="row">
						<div class="column medium-12 large-10 medium-centered">
							<?php $a = new Area('Main'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .content -->
				<!-- BEGIN .content -->
				<article class="container main main-2">
					<div class="row">
						<div class="column medium-12 large-10 medium-centered">
							<?php $a = new Area('Main-2'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .content -->
				<!-- BEGIN .content -->
				<article class="container main main-3">
					<div class="row">
						<div class="column medium-12 large-10 medium-centered">
							<?php $a = new Area('Main-3'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .content -->
				<div class="footer-img"></div>
				<div class="testimonials">
					<div class="row">
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
