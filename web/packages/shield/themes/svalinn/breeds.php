<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> breeds">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
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
			<article class="container main-intro bg-white">
				<div class="row">
					<div class="column medium-10 medium-centered">
						<?php $a = new Area('Main'); $a->display($c); ?>
					</div>
				</div>
			</article>
			<!-- END .intro -->
			
			<!-- BEGIN .submast -->
			<article class="container tab-nav bg-knot-gray-lg">
				<div class="row title">
					<div class="column medium-10 medium-centered">
						<h3>EXPLORE THE BREEDS</h3>
					</div>
				</div>
				<div class="row">
					<div class="column medium-10 medium-centered">
						<dl class="tabs centered" data-tab>
							<dd class="active"><a href="#level1">German Shepherd</a></dd>
							<dd><a href="#level2">Dutch Shepherd</a></dd>
							<dd><a href="#level3">Belgian Malinois</a></dd>
						</dl>
					</div>
				</div>
			</article>
			<!-- END .submast -->
			
			<!-- BEGIN .content -->
			<article class="container main bg-gray">
				<div class="row">
					<div class="column medium-12 large-10 medium-centered">
						<div class="tabs-content">
							<div class="content active" id="level1">
								<div class="row">
									<div class="column medium-6 left-col">
                                        <?php $a = new Area('Level 1-Left'); $a->display($c); ?>
									</div>
									<div class="column medium-6 right-col">
										<div class="boxed">
											<div class="box">
                                                <?php $a = new Area('Level 1-Right'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
                                        <?php $a = new Area('Level 1-Bottom'); $a->display($c); ?>
									</div>
								</div>
							</div>
							
							<div class="content" id="level2">
								<div class="row">
									<div class="column medium-6 left-col">
	                                    <?php $a = new Area('Level 2-Left'); $a->display($c); ?>
									</div>
									<div class="column medium-6 right-col">
										<div class="boxed">
											<div class="box">
	                                            <?php $a = new Area('Level 2-Right'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
                                        <?php $a = new Area('Level 2-Bottom'); $a->display($c); ?>
									</div>
								</div>							
							</div>
							<div class="content" id="level3">
								<div class="row">
									<div class="column medium-6 left-col">
                                        <?php $a = new Area('Level 3-Left'); $a->display($c); ?>
									</div>
									<div class="column medium-6 right-col">
										<div class="boxed">
											<div class="box">
                                                <?php $a = new Area('Level 3-Right'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
                                        <?php $a = new Area('Level 3-Bottom'); $a->display($c); ?>
									</div>
								</div>
							</div>
						</div>
                        <?php $a = new Area('Main-2'); $a->display($c); ?>
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
