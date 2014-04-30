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
						<h1 class="text-center">Contact</h1>
						<p class="lead uppercase text-center">Want to know more?</p>
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
					<div class="small-12 medium-3 columns">
						<br/><br/>
						<h3 class="sans">Svalinn</h3>
						<p>P.O. BOX 7497<br>JACKSON, WY 83002</p>
						<p>(307) 200-1223</p>
					</div>
					<div class="small-12 medium-9 columns">
						<p class="lead">If you feel like discussing any of our dogs and would rather not fill in the contact us form, please feel free to call us in Jackson, Wyoming . We are open from 9am-5pm Monday through Saturday. Please leave us a message telling us when best to call you back so that we may answer your questions.</p>
						<form class="contact-form">
							<div class="row">
							    <div class="large-6 columns">
							      <label>Name
							        <input type="text" placeholder="Your Name">
							      </label>
							    </div>
							    <div class="large-6 columns">
							      <label>Email
							        <input type="text" placeholder="Email Address">
							      </label>
							    </div>
							</div>
							<div class="row">
							    <div class="large-6 columns">
							      <label>Phone
							        <input type="text" placeholder="Phone Number">
							      </label>
							    </div>
							    <div class="large-6 columns">
							      <label>City
							        <input type="text" placeholder="Your City">
							      </label>
							    </div>
							</div>
							<div class="row">
							    <div class="large-6 columns">
							      <label>Type of Client
							        <select>
							          <option value="Family">Family</option>
							          <option value="Professional">Professional</option>
							          <option value="Executive">Executive</option>
							          <option value="Individual">Individual</option>
							        </select>
							      </label>
							    </div>
							    <div class="large-6 columns">
							      <label>Other Pets
							        <select>
							          <option value="Yes">Yes</option>
							          <option value="No">No</option>
							        </select>
							      </label>
							    </div>
							</div>
							<div class="row">
							    <div class="large-12 columns">
							      <label>Tell Us Little About Yourself
							        <textarea placeholder="About You / Questions"></textarea>
							      </label>
							    </div>
							</div>
							<div class="row">
							    <div class="large-12 columns">
							        <input type="submit" class="button btn btn-lg btn-contact btn-arrow uppercase push-right" value="Send">
							    </div>
							</div>
							
						</form>
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
