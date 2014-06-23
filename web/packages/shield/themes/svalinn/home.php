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
			<div class="main-wrap">
				<!-- BEGIN HEADER -->
	            <?php Loader::packageElement('theme_header', 'shield', array(
	                'navigationSettings' => array(
	                    'displayPages'   => 'top'
	                )
	            )); ?>
				<!-- END HEADER   -->
				
				<!-- BEGIN .private-section -->
				<article class="container masthead private-section">
				    <div class="row">
				        <div class="column medium-11 medium-centered intro">
							<div class="intro-inner">
					            <h1>Bred to Love. Trained to Protect.</h1>
								<hr/>
								<div class="intro-content row">
						        	<div class="column medium-10 medium-centered">
							        	<?php $a = new Area('Masthead'); $a->display($c); ?>
							        	<p><a href="btn btn-lg">LEARN MORE ABOUT OUR PRIVATE CLIENT SERVICES</a></p>
										<p><a href="" class="btn social">Follow Svalinn Private Client on facebook</a></p>

						        	</div>
						        </div>
							 </div>
				        </div>
				    </div>
				</article>
				<!-- END .private-section -->
				
				<!-- BEGIN .name-section -->
				<article class="container name-section">
					<div class="row">
						<div class="column medium-7 large-6">
							<div class="intro">
								<h1>THE SVALINN NAME</h1>
								<p>In Norse mythology Svalinn is the name of a legendary shield given by the gods. Svalinn protects Alsvin and Avakar, two steeds that pull the sun across the sky and Earth, from the sun’s full power. Svalinn is a timeless symbol of strength and ardent vigilance. It’s a name that appropriately portrays the ever-present companionship and protection that our highly trained dogs provide.</p>

							</div>
						</div>
				</article>
				<!-- END .name-section -->
				
				<!-- BEGIN .pro-section -->
				<article class="container pro-section">
					<div class="row">
						<div class="column medium-11 medium-centered">
							<h1>A Legacy Of Vigilance.</h1>
								<hr/>
								<p>In addition to personal protection, Svalinn has advanced the art and ability of the military working dog.</p>
								<p><a href="btn btn-lg">LEARN MORE ABOUT OUR PROFESSIONAL SERVICES</a></p>
								<p><a href="" class="btn social">Follow Svalinn Professional on facebook</a></p>
	                        
						</div>
					</div>
				</article>
				<!-- END .pro-section -->
				
				<div class="footer-img">
					<a href=""><img src=""/>Follow Svalinn on Instagram</a>
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
