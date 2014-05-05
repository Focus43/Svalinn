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
            <?php Loader::packageElement('blue_masthead', 'shield', array('pageObj' => Page::getCurrentPage())); ?>
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
				<div class="row section">
					<div class="small-12 medium-8 columns">
                        <?php $a = new Area('Main-2'); $a->display($c); ?>
					</div>
					<div class="small-12 medium-4 columns">
						<div class="vertical-middle">
							<!--<br/><br/><br/><br/>
							<blockquote class="caption">The dual role as both friend and protector.</blockquote>-->
                            <?php $a = new Area('Main-3'); $a->display($c); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column medium-12 large-10 medium-centered">
						<!--<p>Our training curriculum is built upon a deep understanding and appreciation of the special relationship between man and dog. This foundation allows us to deliver the world’s best and most stable protection dogs. Consistent training geared towards a dual role as both friend and protector gives our dogs a level of sociability and vigilance unparalleled in the industry. Our methodology and techniques are based on our experience in non-permissive environments, real-world threats and defined performance criteria. It’s a distinction that makes all the difference.</p>
						<p>Another key Svalinn difference is the genetic quality of our animals. Svalinn can trace the bloodlines of our three breeds back 80 years. From a health, temperament and characteristics standpoint, being able to follow our dogs’ lineage is a boon to both us a breeders and our clients as handlers. As well as being incredibly safe and reliable around children (which we will get into later), all Svalinn canines also come socialized to other animals, not just other dogs, as we know that clients have a wide range of pets and animals in their lives.</p>
						<hr class="divide o-gray nomargin-top" />
						<a href="/privateclient/the-svalinn-difference" class="btn btn-bordered btn-md blue cta on-lite uppercase align-center">More about our Dogs</a>-->
                        <?php $a = new Area('Main-4'); $a->display($c); ?>
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
