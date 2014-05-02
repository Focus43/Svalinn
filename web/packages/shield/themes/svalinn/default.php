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
			<article class="container masthead bg-wave-blue">
				<div class="row">
					<div class="column medium-10 medium-centered intro">
						<h1 class="text-center">
                            <?php echo Page::getCurrentPage()->getAttribute('meta_title'); ?>
						</h1>
						<p class="lead uppercase text-center">
                            <?php echo Page::getCurrentPage()->getAttribute('meta_description'); ?>
						</p>
					</div>
				</div>
				<div class="celtic-knot"></div>
			</article>
			<!-- END .masthead -->
			
			<!-- BEGIN .submast -->
			<article class="container tab-nav bg-knot-gray-lg">
				<div class="row">
					<div class="column medium-10 medium-centered"></div>
				</div>
			</article>
			<!-- END .submast -->
			
			<!-- BEGIN .content -->
			<article class="container main bg-gray">
				<div class="row">
					<div class="column medium-12 large-10 medium-centered">
						<?php $a = new Area('Main'); $a->display($c); ?>
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
