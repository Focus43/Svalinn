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
            <?php /* Loader::packageElement('theme_header', 'shield', array(
                'navigationSettings' => array(
                    'displayPages'   => 'second_level',
                    'displaySubPages' => 'all',
                    'displaySubPageLevels' => 'custom',
                    'displaySubPageLevelsNum' => 1
                )
            )); */ ?>
			<header class="container header bg-white">
			    <nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
			        <section class="left name">
			            <a href="/" title="Svalinn" rel="home">
			                <img src="<?php echo SHIELD_IMAGES_URL; ?>logo-svalinn-black.svg"/>
			            </a>
			        </section>
			        <section class="top-bar-section primary-nav-section show-for-large-up">
			            <?php /*
			                $blockTypeNav = BlockType::getByHandle('autonav');
			                $blockTypeNav->controller->orderBy = 'display_asc';
			                foreach((array) $navigationSettings AS $key => $value){
			                    $blockTypeNav->controller->{$key} = $value;
			                }
			                $blockTypeNav->render('templates/header_nav');
			            */ ?>
			        </section>
			        <!-- HIDE TILL WE HAVE ADDITIONAL PAGES
			        <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>
			        -->
			    </nav>
			</header>
            <!-- END HEADER   -->

            <!-- BEGIN .masthead -->
            <?php /* Loader::packageElement('blue_masthead', 'shield', array(
                'pageObj'               => Page::getCurrentPage(),
                'mastheadEditableArea'  => true,
                'c'                     => $c // gross... but has to be injected
            )); */ ?>
            <article class="container masthead bg-wave-blue">
			    <div class="row">
			        <div class="column medium-10 medium-centered intro">
				        <div class="text-center svalinn-knot"><img src="/packages/shield/img/knot-wave-white.png" /></div>
			            <h1 class="text-center">
			                <?php echo Page::getCurrentPage()->getAttribute('meta_title'); ?>
			            </h1>
			            <p class="lead uppercase text-center">
			                <?php echo Page::getCurrentPage()->getAttribute('meta_description'); ?>
			            </p>
			        </div>
			        <div class="column medium-10 medium-centered secondary-intro">
			            <?php $a = new Area('Masthead'); $a->display($c); ?>
			        </div>
			    </div>
			</article>
            <!-- END .masthead -->

            <!-- BEGIN .submast -->
            <article class="container bg-knot-gray-lg">
                <div class="row">
                    <div class="column medium-12 large-10 medium-centered"></div>
                </div>
            </article>
            <!-- END .submast -->

            <!-- BEGIN .content -->
            <article class="container main bg-gray">
                <div class="row">
                    <div class="column medium-12">
                        <div class="row">
                            <div class="column medium-12">
                                <?php $a = new Area('Main-2'); $a->display($c); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column medium-7 medium-centered">
                                <hr class="divide o-gray btn-divide">
								<a href="mail:jeff@svalinn.com" target="_self" class="btn btn-bordered btn-md green cta on-lite uppercase align-center">
    Contact Svalinn</a>
                            </div>
                        <!-- END CONTENTS -->
                        
                    </div>
                </div>
            </article>
            <!-- END .content -->
            <!-- BEGIN .services (level static) -->
            <article class="container main-sub">
                <div class="row">
                    <div class="column medium-12">
		            	<h3>PROFESSIONAL SERVICES</h3>
		            	<div class="list-table">
			            	<ul class="inline-list">
			            		<li>K9</li>
			            		<li class="divide">&nbsp;</li>
			            		<li>K9 Teams</li>
			            		<li class="divide hide-for-small-only hide-exception">&nbsp;</li>
			            		<li>Science &amp; Tech</li>
			            		<li class="divide hide-for-small-only">&nbsp;</li>
			            		<li>Advise &amp; Assist</li>
			            	</ul>
		            	</div>
					</div>
                </div>
            </article>
            <!-- END .services -->
            <!-- IMAGE -->
            <div class="container img-span text-center">
            	<img src="/packages/shield/img/professional/wide-landing-footer.jpg" class="full-width" />
            </div>
            <!-- END IMAGE -->


            <!-- BEGIN .footer -->
            <?php //Loader::packageElement('theme_footer', 'shield'); ?>
            <footer class="container footer" role="contentinfo">
			    <div class="row">
			        <div class="column medium-4 large-5 message">
			            <p>For more information about Svalinn <br class="show-for-large-up"/>and our services please get in touch.</p>
			        </div>
			        <div class="column medium-8 large-7 contact">
			            <a href="mailto:jeff@svalinn.com" class="btn btn-lg btn-contact btn-arrow uppercase">Email Us</a>
			            <div class="or fwsb">OR</div>
			            <a href="tel:1-202-355-5895" class="btn btn-lg btn-disabled uppercase">202.355.5895</a>
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