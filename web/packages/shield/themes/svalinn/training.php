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
<link rel="stylesheet" href="http://fisherphx.net/svalinn.css" />
</head>

<body class="antialiased<?php echo $bodyClasses; ?> training">
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
				
				<!-- BEGIN .masthead -->
	            <?php Loader::packageElement('blue_masthead', 'shield', array(
	                'pageObj' => Page::getCurrentPage()
	            )); ?>
				<!-- END .masthead -->
				
				<!-- BEGIN .intro -->
				
				<!-- END .intro -->
				<!-- BEGIN .content -->
				<article class="container main">
					<div class="row section-1">
						<div class="column medium-10 medium-centered">
							<?php $a = new Area('Main'); $a->display($c); ?>
						</div>
					</div>
					<div class="row section-2">
						<div class="column medium-12">
							<div class="row collapse outdent-both hide-for-small-only">
								<div class="column medium-12">
									<dl class="tabs centered" data-tab>
										<dd class="active"><a href="#level1">Level I</a></dd>
										<dd><a href="#level2">Level II</a></dd>
										<dd><a href="#level3">Level III</a></dd>
									</dl>
								</div>
							</div>
							<div class="row outdent-both">
								<div class="column medium-12">
									<div class="tabs-content">
										<div id="level1" class="content active">
											<?php $a = new Area('Level 1-Left'); $a->display($c); ?>
											<?php /* $a = new Area('Level 1-Right'); $a->display($c); */ ?>
										</div>
										<div id="level2" class="content">
											<?php $a = new Area('Level 2-Left'); $a->display($c); ?>
											<?php /* $a = new Area('Level 2-Right'); $a->display($c); */ ?>
										</div>
										<div id="level3" class="content">
										<div class="row">
										<div class="column medium-12">
											<?php $a = new Area('Level 3-Left'); $a->display($c); ?>
											<?php /* $a = new Area('Level 3-Right'); $a->display($c); */ ?>										
										</div>
									</div>
								</div>
							</div>						
						</div>
					</div>
					<div class="row section-3 outdent-both">
						<div class="column medium-12">
							<?php $a = new Area('Main-2'); $a->display($c); ?>
						</div>
					</div>
				</article>
				<!-- END .content -->
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
