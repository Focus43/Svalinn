<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js"><!--<![endif]-->
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> breeds">
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
	            <?php Loader::packageElement('blue_masthead', 'shield', array(
	                'pageObj' => Page::getCurrentPage()
	            )); ?>
				<!-- END .masthead -->
				
				<!-- BEGIN .intro -->
				<article class="container main main-1">
					<div class="row">
						<div class="column medium-12 medium-centered">
							<?php $a = new Area('Main'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .intro -->
				
				<!-- BEGIN .submast -->
				<article class="container tab-nav">
					<div class="row collapse">
						<div class="column medium-12 large-10 medium-centered">
							<dl class="tabs centered" data-tab>
								<dd class="active"><a href="#german-shepherd">German Shepherd</a></dd>
								<dd><a href="#dutch-sheperd">Dutch Shepherd</a></dd>
								<dd><a href="#belgian-malinois">Belgian Malinois</a></dd>
							</dl>
						</div>
					</div>
				</article>
				<!-- END .submast -->
				
				<!-- BEGIN .content -->
				<article class="container main main-2 main-breeds">
					<div class="row collapse">
						<div class="column medium-12 large-12 medium-centered">
							<div class="tabs-content">
								<div class="content active" id="german-shepherd">
									<div class="row">
										<div class="column medium-6 left-col">
	                                        <?php $a = new Area('Level 1-Left'); $a->display($c); ?>
										</div>
										<div class="column medium-6 right-col">
											<div class="desc">
												<?php $a = new Area('Level 1-Right'); $a->display($c); ?>
											</div>
											<hr/>
											<div class="char">
												<?php $a = new Area('Level 1-Bottom'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="content" id="dutch-sheperd">
									<div class="row">
										<div class="column medium-6 left-col">
		                                    <?php $a = new Area('Level 2-Left'); $a->display($c); ?>
										</div>
										<div class="column medium-6 right-col">
                                            <div class="desc">
												<?php $a = new Area('Level 2-Right'); $a->display($c); ?>
											</div>
											<hr/>
											<div class="char">
												<?php $a = new Area('Level 2-Bottom'); $a->display($c); ?>
											</div>
										</div>
									</div>						
								</div>
								<div class="content" id="belgian-malinois">
									<div class="row">
										<div class="column medium-6 left-col">
	                                        <?php $a = new Area('Level 3-Left'); $a->display($c); ?>
										</div>
										<div class="column medium-6 right-col">
                                            <div class="desc">
												<?php $a = new Area('Level 3-Right'); $a->display($c); ?>
											</div>
											<hr/>
											<div class="char">
												<?php $a = new Area('Level 3-Bottom'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
				<article class="container main main-3">
					<div class="row">
						<div class="column medium-12 large-10 medium-centered">
	                        <?php $a = new Area('Main-2'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .content -->
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
