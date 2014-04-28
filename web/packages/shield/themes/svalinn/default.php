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
						<h1 class="text-center">Philosophy &amp; Appoarch</h1>
						<p class="lead uppercase text-center">Breeding, Raising, Training.</p>
					</div>
				</div>
				<div class="celtic-knot"></div>
			</article>
			<!-- END .masthead -->
			
			<!-- BEGIN .submast -->
			<article class="container bg-knot-gray-lg">
				<div class="row">
					<div class="column medium-10 medium-centered">
						<dl class="tabs" data-tab>
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
					<div class="column medium-10 large-7 medium-centered">
						<p class="text-center lead">Svalinn K9s come in three breeds and three levels of training. Our German Shepherds, Dutch Shepherds and Belgian Malinois range from $30,000 to $85,000 depending on the selected training level.</p>
					</div>
				</div>
				<div class="row">
					<div class="column medium-12 large-8 medium-centered">
						<div class="tabs-content">
							<div class="content active" id="level1">
								<div class="row">
									<div class="column medium-7">
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
									<div class="column medium-5">
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
								<h3>Company History</h3>
								<p>Svalinn is based out of Jackson Hole, WY but the company’s story starts in east Africa. It was 2005 and Jeff and Kim Green, the founders of Svalinn, were living in Kenya. The couple was just blessed with twin boys and with work requiring frequent travel for Jeff; the Greens wanted a personal protection solution for their family. Svalinn’s first dogs were "Briggs" and "Banshee”, two Dutch Shepherds. Jeff trained these two “dutchies” himself after realizing there was no one in the industry providing what he was looking for: a vigilant and able protection dog with the stability and sociability to be around the babies.</p>
							</div>
							<div class="content" id="level3">
								<h3>History of Working Dogs</h3>
								<p>The bond between humans and canines is one of the most powerful in the natural world. The ancient Egyptians as well as the Greeks, Persians and Romans all used dogs for protection, hunting, herding and many other tasks. Even after all these millennia of living and working alongside dogs, we are just now starting to comprehend the depths and abilities of these wonderful creatures. The breeding of working dogs started by identifying and selecting the most intelligent, hardy, and alert dogs and breeding them together for specific uses.</p>
							</div>
						</div>
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
