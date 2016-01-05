<? defined('C5_EXECUTE') or die("Access Denied."); ?>

	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="main-wrap not-found">
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
				
				
				
				<!-- BEGIN .submast -->
				<article class="container tab-nav bg-knot-gray-lg">
					<div class="row">
						<div class="column medium-10 medium-centered"></div>
					</div>
				</article>
				<!-- END .submast -->
				
				<!-- BEGIN .content -->
				<article class="container main">
					<div class="row lost-dog">
						<div class="medium-12 columns">
							<h1 class="error"><span>404</span><br><?=t('This is not the dog you are looking for')?></h1>
							<p class="error-message"><?=t('No page could be found at this address.')?></p>
							<? if (is_object($c)) { ?>
								<? $a = new Area("Main"); $a->display($c); ?>
							<? } ?>
							<p><a href="<?=DIR_REL?>/"><?=t('Back to Home')?></a>.</p>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>

				


