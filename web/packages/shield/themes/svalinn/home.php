<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie6 lt-ie7 lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie7  lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie9 oldie"> <![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js"><!--<![endif]-->
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
<link rel="stylesheet" href="/packages/shield/css/homepage.css" />
<script type="text/javascript" src="/packages/shield/js/jquery.easing.js"></script>
<script type="text/javascript" src="/packages/shield/js/jquery.viewport.js"></script>
<script type="text/javascript" src="/packages/shield/js/homepage.js"></script>
<script type="text/javascript" src="/packages/shield/js/homepage.js"></script>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> home">
	<!--[if lte IE 8]>
        <div data-alert class="alert-box warning chromeframe">
Your browser is out of date! It looks like you're using an old version of Internet Explorer.<br/>For the best experience, <a href="http://browsehappy.com/">please update your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a>.
		</div>
    <![endif]-->
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="main-wrap">
				<!-- BEGIN HEADER -->
	            <?php Loader::packageElement('theme_header', 'shield', array(
                    'navigationSettings' => array(
                        'displayPages'   => 'top',
                        'displaySubPages' => 'all',
                        'displaySubPageLevels' => 'custom',
                        'displaySubPageLevelsNum' => 1
                    )
	            )); ?>
				<!-- END HEADER   -->
				<div class="scroll-down down-only">
				    <a href="#" class="down" data-int="1"><img src="/packages/shield/img/home/arrow-down.png"/></a><a href="#" class="up" data-int="1"><img src="/packages/shield/img/home/arrow-up.png"/></a>
			    </div>
				<!-- BEGIN .articles -->
				<div class="articles">
					<article data-int="0" class="full article-0">
						<div class="bg-image" style="background-image: url(/packages/shield/img/home/home-1.jpg);background-position:50%;"></div>
						<div class="container">
							<div class="text-center-tight full">
								<div class="inner">
									<div class="intro">
										<h1 class="text-center">Bred to Love. <br class="medium-down"/>Trained to Protect.</h1>
										<p class="text-center">Simply put, Svalinn breeds, raises and trains world-class protection dogs. With a focus on the dual role as both friend and protector, our dogs possess an unparalleled level of sociability and vigilance. Located in Jackson, Wyoming, we likely are training your perfect protection companion right now.</p>
										<p class="show-for-medium-only text-center"><a href="#" class="down" data-int="1"><img src="/packages/shield/img/home/arrow-down.png"/></a></p>
									</div>
								</div>
							</div>
						</div>
					</article>
					<article data-int="1" class="full">
						<div class="bg-image" style="background-image: url(/packages/shield/img/home/home-2.jpg);background-position:0 50%;"></div>
						<div class="container">
							<div class="text-center-tight full">
								<div class="inner">
									<div class="block">
										<h2>Best Friend</h2>
										<p>The bond between humans and canines is one of the most powerful in the world. Our curriculum is built upon our understanding and appreciation of the special relationship between man and dog.</p>
										<p class="show-for-medium-only text-center"><a href="#" class="down" data-int="2"><img src="/packages/shield/img/home/arrow-down.png"/></a></p>
									</div>
								</div>
							</div>
						</div>
					</article>
					<article data-int="2" class="full">
						<div class="bg-image" style="background-image: url(/packages/shield/img/home/home-3.jpg);background-position:100% 50%;"></div>
						<div class="container">
							<div class="text-center-tight full">
								<div class="inner">
									<div class="block right">
										<h2>Best Protection.</h2>
										<p>Our focus is developing loving and faithful dogs that are also exceptional deterrents to any threat, and instant protectors should you or your family ever be in imminent danger.</p>
										<p class="show-for-medium-only text-center"><a href="#" class="down" data-int="3"><img src="/packages/shield/img/home/arrow-down.png"/></a></p>
									</div>
								</div>
							</div>
						</div>
					</article>
					<article  data-int="3" class="full">
						<div class="bg-image" style="background-image: url(/packages/shield/img/home/home-4.jpg);background-position:0 50%;"></div>
						<div class="container">
							<div class="text-center-tight full">
								<div class="inner">
									<div class="block">
										<h2>Best Option.</h2>
										<p>It’s our unique training and breeding techniques—along with our own real-world security expertise—that allows us to raise Svalinn dogs to the highest standards possible.</p>
										<p class="show-for-medium-only text-center"><a href="#" class="down" data-int="4"><img src="/packages/shield/img/home/arrow-down.png"/></a></p>
									</div>
								</div>
							</div>
						</div>
					</article>
					<blockquote data-int="4" class="full">
						<div class="bg-image" style="background-image: url(/packages/shield/img/bg/quote.jpg);background-position:0 50%;"></div>
						<div class="container">
							<div class="text-center-tight full">
								<div class="inner">
									<div class="quote-gallery">
										
										<div id="slider" class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0">
											
											<a href="#" class="cycle-prev">PREV</a>
										<a href="#" class="cycle-next">NEXT</a>
										  <div class="slide">
										      <div class="quote">
											      <?php $a = new Area('Quote-1'); $a->display($c); ?>
										      </div>
										  </div>
										  <div class="slide">
										  	<div class="quote">
											      <blockquote>2 Sabuk and I have been a team for a little over 5 months. &nbsp;I could not have imagined in the beginning how much freedom and peace of mind he would give me, or how much I would simply enjoy his presence. &nbsp;I no longer wonder before I go to sleep at night what I would do if I awoke to find someone in my house. &nbsp; I look forward to long hikes with my hiking buddy by my side rather than questioning if I should hike alone…and I always have someone excited to see me.</blockquote>
<p>- Suzanne, Owner of Sabuk -</p>
											    <?php $a = new Area('Quote-2'); $a->display($c); ?>
										    </div>
										  </div>
										  <div class="slide">
										    <div class="quote">
										    	<blockquote>3 Sabuk and I have been a team for a little over 5 months. &nbsp;I could not have imagined in the beginning how much freedom and peace of mind he would give me, or how much I would simply enjoy his presence. &nbsp;I no longer wonder before I go to sleep at night what I would do if I awoke to find someone in my house. &nbsp; I look forward to long hikes with my hiking buddy by my side rather than questioning if I should hike alone…and I always have someone excited to see me.</blockquote>
<p>- Suzanne, Owner of Sabuk -</p>
											    <?php $a = new Area('Quote-3'); $a->display($c); ?>
										    </div>
										  </div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					    <div class="dummy"></div>
					</blockquote>
				</div>
				<!-- END .articles -->
				<!-- BEGIN .footer -->
	            <?php Loader::packageElement('theme_footer', 'shield'); ?>
				<!-- END .footer -->
			</div><!-- END .main-wrap -->
			
			<!-- BEGIN .right-off-canvas-menu -->
            <?php Loader::packageElement('responsive_sidebar', 'shield', array(
                'navigationSettings' => array(
                    'displayPages'   => 'all',
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
