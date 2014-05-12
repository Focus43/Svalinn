<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> home">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<!-- BEGIN HEADER -->
            <?php Loader::packageElement('theme_header', 'shield', array(
                'navigationSettings' => array(
                    'displayPages'   => 'top'
                )
            )); ?>
			<!-- END HEADER   -->
			
			<!-- BEGIN .upper -->
			<article class="container upper">
				<div class="row">
					<div class="column medium-7 large-6">
						<div class="intro">
							<h1 class="small-only-text-center">A Legacy<br/> of Vigilance.</h1>
							<p class="lead uppercase small-only-text-center">Svalinn. World-Class <br class="show-for-medium-up"/>Protection &amp; Working Dogs.</p>
						</div>
					</div>
					<div class="column medium-5 large-6">
						<!--<iframe class="fitvid" src="http://player.vimeo.com/video/92781493" width="480" height="270" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>-->
						<img src="<?php echo SHIELD_IMAGES_URL; ?>video-placeholder.jpg" style="max-width:100%;" />
					</div>
				</div>
				<div class="row">
					<div class="column medium-10 medium-centered">
						<hr class="divide knots-blue" />
						<p class="lead-sm text-center uppercase">LEARN MORE ABOUT SVALINN FOR</p>
					</div>
				</div>
				<div class="row">
					<div class="column medium-3 small-centered text-center">
						<a href="/privateclient"  class="btn btn-bordered btn-full blue uppercase">Private Client</a>
					</div>
					<!--
					<div class="column medium-3 medium-offset-3 text-center">
						<a href="/privateclient"  class="btn btn-bordered btn-full blue uppercase">Private Client</a>
					</div>
					<div class="column medium-3 end text-center">
						<a href="/professional" class="btn btn-bordered btn-full blue uppercase">Professional</a>
					</div>
					-->
				</div>
				<div class="celtic-knot"></div>
			</article>
			<!-- END .upper -->
			
			
			<!-- BEGIN .lower -->
			<article class="container lower bg-wave-drk-blue">
				<div class="row">
					<div class="column medium-11 medium-centered">
						<p class="text-center knot"><img src="<?php echo SHIELD_IMAGES_URL; ?>knot-wave-blue.png" /></p>
						<!--<h2 class="text-center uppercase">The Svalinn Name</h2>
						<p class="lead-sm text-center">In Norse mythology Svalinn is the name of the legendary shield given by the gods to protect the steeds pulling the sun across the sky and Midgard (Earth) from the sun’s full power. Svalinn is a timeless symbol of strength and ardent vigilance. It’s a name that appropriately portrays the ever-present companionship and protection that our highly trained dogs provide.</p>-->
                        <?php $a = new Area('Main'); $a->display($c); // @todo: classes on parents ?>
					</div>
				</div>
			</article>
			<!-- END .lower -->
			
			
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
