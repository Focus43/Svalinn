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
						<h1 class="text-center">Bred to Love.</h1>
						<p class="lead uppercase text-center">Trained to Protect.</p>
					</div>
					<div class="column medium-8 medium-centered">
						<div class="dog"><img src="/packages/shield/img/celtic-dog-blue.png"/></div>
						<h2 class="subtitle text-center">The bond between humans and canines is one <br class="show-for-large-up"/>of the most powerful in the natural world.</h2>
						<p class="text-center">Svalinn's training is geared towards honoring the classic partnership between man and dog that has been forged over thousands of years. With focus on a dual role as both friend and protector gives our dogs a level of sociability and vigilance unparalleled in the industry.</p>
					</div>
				</div>
				<div class="celtic-knot"></div>
			</article>
			<!-- END .masthead -->
			
			<!-- BEGIN .submast -->
			<article class="container bg-knot-gray-lg">
				<div class="row">
					<div class="column medium-10 medium-centered"></div>
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
								<h3>Best Friend</h3>
								<p>The bond between humans and canines is one of the most powerful in the natural world. We can now comprehend the depths and abilities of these wonderful creatures in a working environment.</p>
							</div>
							<div class="column medium-4">
								<h3>Best Protection</h3>
								<p>Svalinn K9s start their training at just 5 weeks old. Training geared towards a dual role as both friend and protector gives our dogs a level of sociability and vigilance unparalleled in the industry.</p>
							</div>
							<div class="column medium-4">
								<h3>Best Option</h3>
								<p>Personal safety starts with you. Which is why every Svalinn K9 includes real-world safety training for its handler. Our personal security experts will guide you on with techniques for your dog.</p>
							</div>
						</div>
						<div class="row">
							<div class="column medium-12">
								<a href="/privateclient/the-svalinn-difference" class="btn btn-bordered btn-md blue cta on-lite uppercase align-center">More about our Dogs</a>
							</div>
						</div>
						<div class="row tab-group">
							<div class="column medium-10 medium-centered">
								<dl class="tabs vertical" data-tab>
									<dd class="active"><a href="#panel1a">The Svalinn Name</a></dd>
									<dd><a href="#panel2a">Company History</a></dd>
									<dd><a href="#panel3a">History of Working Dogs</a></dd>
									<dd><a href="#panel4a">Philosophy &amp; Approach</a></dd>
								</dl>
								<div class="tabs-content vertical">
								
									<div class="content active" id="panel1a">
										<h3>The Svalinn Name</h3>
										<p>In Norse mythology Svalinn is the name of the legendary shield given by the gods to protect the steeds pulling the sun across the sky and Midgard (Earth) from the sun’s full power. Svalinn is a timeless symbol of strength and ardent vigilance. It’s a name that appropriately portrays the ever-present companionship and protection that our highly trained dogs provide.</p>
									</div>
									<div class="content" id="panel2a">
										<h3>Company History</h3>
										<p>Svalinn is based out of Jackson Hole, WY but the company’s story starts in east Africa. It was 2005 and Jeff and Kim Green, the founders of Svalinn, were living in Kenya. The couple was just blessed with twin boys and with work requiring frequent travel for Jeff; the Greens wanted a personal protection solution for their family. Svalinn’s first dogs were "Briggs" and "Banshee”, two Dutch Shepherds. Jeff trained these two “dutchies” himself after realizing there was no one in the industry providing what he was looking for: a vigilant and able protection dog with the stability and sociability to be around the babies.</p>
										<p><a href="" class="link">Learn More</a></p>
									</div>
									<div class="content" id="panel3a">
										<h3>History of Working Dogs</h3>
										<p>The bond between humans and canines is one of the most powerful in the natural world. The ancient Egyptians as well as the Greeks, Persians and Romans all used dogs for protection, hunting, herding and many other tasks. Even after all these millennia of living and working alongside dogs, we are just now starting to comprehend the depths and abilities of these wonderful creatures. The breeding of working dogs started by identifying and selecting the most intelligent, hardy, and alert dogs and breeding them together for specific uses.</p>
										<p><a href="" class="link">Learn More</a></p>
									</div>
									<div class="content" id="panel4a">
										<h3>Philosophy &amp; Approach</h3>
										<p>Svalinn breeds, raises and trains all of our dogs in-house. While some breeders are interested in only looks and kennel club guidelines, we breed for intelligence, capability and stability.  Many so-called “protection” dogs are trained around protection sports and competitions such as Schutzhund. At Svalinn, we aren’t interested in sports or games. We have trained every dog since they were 5-week-old puppies. Svalinn dogs train six days a week in stability, socialization, obedience, and protection.</p>
										<p><a href="" class="link">Learn More</a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row testimonials">
							<div class="column medium-10 medium-centered">
								<h3 class="text-center">From Our Clients</h3>
								<blockquote>
									<p class="text-center">As a Diplomatic family living in a country where kidnapping, car jacking and home invasions are an active threat, our family literally sleeps better at night now.<br><span>P.M and L.M - Overseas</span></p>
								</blockquote>
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
