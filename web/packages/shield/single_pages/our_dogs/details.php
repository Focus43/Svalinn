<?php /** @var $dogObj ShieldDog */ ?>

<div class="off-canvas-wrap">
    <div class="inner-wrap">
	    <div class="main-wrap">
		    <!-- BEGIN HEADER -->
		    <?php Loader::packageElement('theme_header', 'shield', array(
		        'navigationSettings' => array(
		            'displayPages' => 'custom',
		            'displayPagesCID' => Page::getByPath('/privateclient')->getCollectionID(),
		            'displaySubPages' => 'all',
		            'displaySubPageLevels' => 'custom',
		            'displaySubPageLevelsNum' => 1
		        )
		    )); ?>
		    <!-- END HEADER   -->
		
		    <!-- BEGIN .masthead -->
		        <?php Loader::packageElement('blue_masthead', 'shield', array(
		            'pageObj'       => Page::getCurrentPage(),
		            'customTitle'   => $dogObj->getName(),
		            'customDescr'   => $dogObj->getShortDescription()
		        )); ?>
		    <!-- END .masthead -->
		
		    <!-- BEGIN .submast -->
		    <article class="container bg-knot-gray-lg">
		        <div class="row">
		            <div class="column medium-10 medium-centered"></div>
		        </div>
		    </article>
		    <!-- END .submast -->
		
		    <!-- BEGIN .content -->
		    <article class="container main bg-gray dog-details">
		        <div class="row">
		            <div class="small-12 medium-4 columns dog-item">
		                <?php Loader::packageElement('partials/dog_item', 'shield', array(
		                    'dogObj'      => $dogObj,
		                    'imageHelper' => $imageHelper
		                )); ?>
						<div class="row">
		                    <div class="small-12 columns">
		                        <a href="<?php echo $this->url('/our_dogs'); ?>" class="btn btn-full gray">See Other Dogs</a>
		                        <a href="/privateclient/contact/" class="btn btn-full blue">Contact Us</a>
		                        <!--<p>Reserve <?php echo $dogObj->getName(); ?> For $<?php echo $dogObj->getPrice(true); ?></p>-->
		                    </div>
		                </div>
		            </div>
		            <div class="small-12 medium-7 columns">
		                <div class="dog-desc">
							<?php echo $dogObj->getLongDescription(); ?>
						</div>
						<div class="reserve">
							<hr class="divide o-gray"/>
							<?php  ?>
							
							<!--
							<?php 
							
								foreach ($galleryFiles as $file) {
				                    $fv = $file->getApprovedVersion();
				                    $desc = $fv->getDescription();
				                    echo '<img src="'.$image->getThumbnail($file, 600, 400, false)->src.'" class="thumbnail" style="margin: 0 auto">';
				
				                }
								echo '------------';
								$fs = FileSet::getByID($dogObj->mediaSetID);
								$fileList = new FileList();
								$fileList->filterBySet($fs);
								$fileList->filterByType(FileType::T_IMAGE);   
								$files = $fileList->get(100,0); //limit it to 100 pictures
								print_r($files);
								?>
							
							-->
						</div>
		            </div>
		        </div>
		    </article>
		    <!-- END .content -->
			<div class="footer-img"></div>
			<div class="testimonials">
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