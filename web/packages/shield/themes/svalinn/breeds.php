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
									<div class="column medium-6">
										<!--<ul>
											<li>Will protect against up to two attackers</li>
											<li>Fully obedient</li>
											<li>Socialized to children and other pets</li>
											<li>House trained</li>
										</ul>-->
                                        <?php $a = new Area('Level 1-Left'); $a->display($c); ?>
									</div>
									<div class="column medium-6">
										<div class="boxed">
											<div class="box">
                                                <?php $a = new Area('Level 1-Right'); $a->display($c); ?>
												<!--<h3>Includes</h3>
												<p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>-->
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
										<p>The German Shepherd is an iconic animal with a vast and storied history of companionship, working, saving, protecting, and detecting. This breed, a relatively new one, originated in the 1890s in, you guessed it, Germany. German Shepherds are excellent with families and children, highly social and loving, and willing to please. They tend to do well within a family with multiple handlers.  Because of their intelligence and demeanor, German Shepherds are generally recognized as one of the world’s best working dogs. They are generally larger and stouter than the Dutch Shepherd or Belgian Malinois.</p>
									</div>
								</div>
							</div>
							
							<div class="content" id="level2">
								<div class="row">
									<div class="column medium-6">
	                                    <?php $a = new Area('Level 2-Left'); $a->display($c); ?>
										<!--<ul>
											<li>All level I attributes +</li>
											<li>Deeper vigilance training</li>
											<li>Ability to conduct home searches</li>
											<li>Vehicle deployment and protection</li>
											<li>Adaptive response to multiple attackers</li>
											<li>Socialized to airplanes and helicopters</li>
											<li>Weapons recognition and tactical response</li>
										</ul>-->
									</div>
									<div class="column medium-6">
										<div class="boxed">
											<div class="box">
												<!--<h3>Includes</h3>
												<p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>-->
	                                            <?php $a = new Area('Level 2-Right'); $a->display($c); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
										<p>The Dutch Shepherd or “Dutchie” is a medium-sized dog that loves to work. They are very good with families and children and highly protective. They have great senses of humor and are willing to please. The females are generally more social than the males. These dogs are less sensitive than their German counterparts. Dutch Shepherds range in size and stature depending on the individual bloodlines within the breed. We have a number of different sizes to fit almost any lifestyle from open ranches to living on a sailboat. Dutchies are always alert and watchful and have a true shepherding temperament.</p>
									</div>
								</div>							
							</div>
							<div class="content" id="level3">
								<div class="row">
									<div class="column medium-6">
										<!--<ul>
											<li>All level II attributes +</li>
											<li>Ultimate vigilance</li>
											<li>Tracking</li>
											<li>Understands the effects of weapons, tactics and group dynamics</li>
											<li>Deep experience, complete stability in all environments</li>
										</ul>-->
                                        <?php $a = new Area('Level 3-Left'); $a->display($c); ?>
									</div>
									<div class="column medium-6">
										<div class="boxed">
											<div class="box">
                                                <?php $a = new Area('Level 3-Right'); $a->display($c); ?>
												<!--<h3>Includes</h3>
												<p>Two three-day training sessions at our facility in Jacskon Hole, Wyoming or your place of choosing. The first session takes place upon purchase and the second on or about the one-year mark of ownership.</p>-->
											</div>
										</div>
									</div>
								</div>
								<div class="row desc">
									<div class="column medium-12 medium-centered">
										<p>Belgian Malinois are very intelligent and bond with their handler quickly. They are energetic medium-sized dogs that want to go everywhere and do everything with their family. Most Belgian Malinois are better suited for pure working environments or living with a strong single handler. That said, Svalinn’s founder has a highly trained Belgian Malinois that accompanies him everywhere and has flawlessly assimilated into his family with young children. Malinois enjoy being challenged with new tasks and due to their high drive for rewards are among the easier breeds to train.</p>
									</div>
								</div>
							</div>
						</div>
						<!--<hr class="divide o-gray nomargin-top" />
						<hr class="divide o-gray nomargin-top" />
						<a href="/privateclient/the-svalinn-difference" class="btn btn-bordered btn-md blue cta on-lite uppercase align-center">More about our Dogs</a>-->
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
