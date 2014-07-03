<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> training">
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
						<div class="column medium-10 medium-centered">
							<?php $a = new Area('Main'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .intro -->
				
				<!-- BEGIN .submast -->
				<article class="container tab-nav">
					<div class="row">
						<div class="column medium-10 medium-centered">
							<dl class="tabs centered" data-tab>
								<dd class="active"><a href="#level1">Level I</a></dd>
								<dd><a href="#level2">Level II</a></dd>
								<dd><a href="#level3">Level III</a></dd>
							</dl>
						</div>
					</div>
				</article>
				<!-- END .submast -->
				
				<!-- BEGIN .content -->
				<article class="container main main-2">
	                <div class="row">
	                    <div class="column medium-12 large-10 medium-centered">
	                        <div class="tabs-content">
	                            <div class="content active" id="level1">
	                                <div class="row">
	                                    <div class="column medium-6 left-col">
	                                        <!--<ul>
	                                            <li>Will protect against up to two attackers</li>
	                                            <li>Fully obedient</li>
	                                            <li>Socialized to children and other pets</li>
	                                            <li>House trained</li>
	                                        </ul>-->
	                                        <?php $a = new Area('Level 1-Left'); $a->display($c); ?>
	                                    </div>
	                                    <div class="column medium-6 right-col">
	                                        <div class="boxed">
	                                            <div class="box">
	                                                <?php $a = new Area('Level 1-Right'); $a->display($c); ?>
	                                                <!--<h3>Includes</h3>
	                                                <p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>-->
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	
	                            <div class="content" id="level2">
	                                <div class="column medium-6 left-col">
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
	                                <div class="column medium-6 right-col">
	                                    <div class="boxed">
	                                        <div class="box">
	                                            <!--<h3>Includes</h3>
	                                            <p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>-->
	                                            <?php $a = new Area('Level 2-Right'); $a->display($c); ?>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="content" id="level3">
	                                <div class="column medium-6 left-col">
	                                    <!--<ul>
	                                        <li>All level II attributes +</li>
	                                        <li>Ultimate vigilance</li>
	                                        <li>Tracking</li>
	                                        <li>Understands the effects of weapons, tactics and group dynamics</li>
	                                        <li>Deep experience, complete stability in all environments</li>
	                                    </ul>-->
	                                    <?php $a = new Area('Level 3-Left'); $a->display($c); ?>
	                                </div>
	                                <div class="column medium-6 right-col">
	                                    <div class="boxed">
	                                        <div class="box">
	                                            <?php $a = new Area('Level 3-Right'); $a->display($c); ?>
	                                            <!--<h3>Includes</h3>
	                                            <p>Two three-day training sessions at our facility in Jacskon Hole, Wyoming or your place of choosing. The first session takes place upon purchase and the second on or about the one-year mark of ownership.</p>-->
	                                        </div>
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
