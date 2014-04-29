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
			<header class="container header bg-white">
				<nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
				    <section class="left name"><a href="/" title="Svalinn" rel="home">
					    <img src="/packages/shield/img/logo-svalinn.svg"/>
				    </a></section>
				    <section class="top-bar-section primary-nav-section show-for-large-up">
				    	<ul class="left" role="navigation">
				    		<li><a href="#">About</a></li>
							<li class="has-dropdown not-click">
								<a href="#">Svalinn Difference</a>
								<ul class="dropdown">
									<li><a href="">Training</a></li>
									<li><a href="">Guarantee</a></li>
									<li><a href="">Breed Specifications</a></li>
								</ul>
							</li>
							<li class="has-dropdown not-click">
								<a href="#">Protection</a>
								<ul class="dropdown">
									<li><a href="">Family</a></li>
									<li><a href="">Individual</a></li>
									<li><a href="">Executive</a></li>
								</ul>
							</li>
							<li><a href="#">Purchase Process</a></li>
							<li><a href="#">Our Dogs</a></li>
							<li><a href="#">Contact</a></li>
				    	</ul>
				    	
				    </section>
				    <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>	
				</nav>
			</header>
			<!-- END HEADER   -->
			
			<!-- BEGIN .masthead -->
			<article class="container masthead bg-wave-blue">
				<div class="row">
					<div class="column medium-10 medium-centered intro">
						<h1 class="text-center">Training</h1>
						<p class="lead uppercase text-center">Working Dog Skill Levels</p>
					</div>
				</div>
				<div class="celtic-knot"></div>
			</article>
			<!-- END .masthead -->
			
			<!-- BEGIN .submast -->
			<article class="container tab-nav bg-knot-gray-lg">
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
			<article class="container main bg-gray">
				<div class="row">
					<div class="column medium-10 large-8 medium-centered">
						<p class="text-center lead">Svalinn K9s come in three breeds and three levels of training. Our German Shepherds, Dutch Shepherds and Belgian Malinois range from $30,000 to $85,000 depending on the selected training level.</p>
					</div>
				</div>
				<div class="row">
					<div class="column medium-12 large-10 medium-centered">
						<div class="tabs-content">
							<div class="content active" id="level1">
								<div class="row">
									<div class="column medium-6">
										<ul>
											<li>Will protect against up to two attackers</li>
											<li>Fully obedient</li>
											<li>Socialized to children and other pets</li>
											<li>House trained</li>
										</ul>
									</div>
									<div class="column medium-6">
										<div class="boxed">
											<div class="box">
												<h3>Includes</h3>
												<p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="content" id="level2">
								<div class="column medium-6">
									<ul>
										<li>All level I attributes +</li>
										<li>Deeper vigilance training</li>
										<li>Ability to conduct home searches</li>
										<li>Vehicle deployment and protection</li>
										<li>Adaptive response to multiple attackers</li>
										<li>Socialized to airplanes and helicopters</li>
										<li>Weapons recognition and tactical response</li>
									</ul>
								</div>
								<div class="column medium-6">
									<div class="boxed">
										<div class="box">
											<h3>Includes</h3>
											<p>Two three-day training packages at our facility in Jackson Hole, Wyoming — one session upon purchase and a follow-up session during the first year of ownership.</p>
										</div>
									</div>
								</div>							
							</div>
							<div class="content" id="level3">
								<div class="column medium-6">
										<ul>
											<li>All level II attributes +</li>
											<li>Ultimate vigilance</li>
											<li>Tracking</li>
											<li>Understands the effects of weapons, tactics and group dynamics</li>
											<li>Deep experience, complete stability in all environments</li>
										</ul>
									</div>
									<div class="column medium-6">
										<div class="boxed">
											<div class="box">
												<h3>Includes</h3>
												<p>Two three-day training sessions at our facility in Jacskon Hole, Wyoming or your place of choosing. The first session takes place upon purchase and the second on or about the one-year mark of ownership.
</p>
											</div>
										</div>
									</div>
							</div>
						</div>
						<hr class="divide o-gray nomargin-top" />
						<hr class="divide o-gray nomargin-top" />
						<a href="/privateclient/the-svalinn-difference" class="btn btn-bordered btn-md blue cta on-lite uppercase align-center">More about our Dogs</a>
					</div>
				</div>
			</article>
			<!-- END .content -->
			
			
			<!-- BEGIN .footer -->
			<footer class="container footer" role="contentinfo">
				<div class="row">
					<div class="column medium-4 large-5 message">
						<p>For more information about Svalinn <br class="show-for-large-up"/>and our services please get in touch.</p>
					</div>
					<div class="column medium-8 large-7 contact">
						<a href="mailto:info@svalinn.com" class="btn btn-lg btn-contact btn-arrow uppercase">Email Us</a>
						<div class="or fwsb">OR</div>
						<a href="tel:1-307-200-1223" class="btn btn-lg btn-disabled uppercase">307.200.1223</a>
					</div>
				</div>
				<div class="row copyright">
					<div class="column small-12">
						<p class="text-center">Copyright &copy; 2014 Svalinn • All Rights Reserved</p>
					</div>
				</div>
			</footer>
			<!-- END .footer -->
			
			<!-- BEGIN .right-off-canvas-menu -->
		    <aside class="right-off-canvas-menu">
		    	<ul class="primary-nav off-canvas-list">
			    	<li class="has-dropdown">
		    			<a href="#">About</a>
		    			<ul class="dropdown">
							<li><a href="">Overview</a></li>
							<li><a href="">Philosophy/Approach</a></li>
						</ul>
		    		</li>
					<li class="has-dropdown">
						<a href="#">Svalinn Difference</a>
						<ul class="dropdown">
							<li><a href="">Training</a></li>
							<li><a href="">Guarantee</a></li>
							<li><a href="">Breed Specifications</a></li>
						</ul>
						
					</li>
					<li class="has-dropdown">
						<a href="#">Protection</a>
							<ul class="dropdown">
								<li><a href="">Family</a></li>
								<li><a href="">Individual</a></li>
								<li><a href="">Executive</a></li>
							</ul>
					</li>
					<li><a href="#">Purchase Process</a></li>
					<li><a href="#">Our Dogs</a></li>
					<li><a href="#">Contact</a></li>
			    	</ul>
		    	</ul>
		    	<ul class="utility-nav off-canvas-list">
		    		<li><a class="btn btn-blue" href="">Contact</a></li>
			    	<li><a class="btn btn-blue" href="">Private Client</a></li>
					<li><a class="btn btn-blue" href="">Professional</a></li>
		    	</ul>
		    </aside>
			<a class="exit-off-canvas"></a>
			<!-- END .right-off-canvas-menu -->
			
			
			
		</div><!-- END .inner-wrap -->
	</div><!-- END .off-canvas-wrap -->
<?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>
