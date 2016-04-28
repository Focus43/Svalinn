<?php /** @var $dogObj ShieldDog */ ?>

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
    'pageObj'       => Page::getCurrentPage(),
    'customTitle'   => $dogObj->getName(),
    'customDescr'   => $dogObj->getShortDescription()
)); ?>
<!-- END .masthead -->

<!-- BEGIN .content -->
<article class="container main bg-gray dog-details">
    <div class="row">
        <div class="small-12 medium-4 columns dog-item  hide-for-print">
            <?php Loader::packageElement('partials/dog_detail', 'shield', array(
                'dogObj'      => $dogObj,
                'imageHelper' => $imageHelper
            )); ?>
            <div class="row">
                <div class="small-12 columns">
                    <a href="<?php echo $this->url('/our_dogs'); ?>" class="btn btn-full gray" style="background:#aaa;">See Other Dogs</a><br/>
                    <!--<a href="/privateclient/contact/" class="btn btn-lg" style="background:#aaa;">Contact Us</a>-->
                    <form method="post" action="<?php echo ShopifiablePackage::STORE_URL; ?>cart/add">
                        <input type="hidden" name="id" value="<?php echo $variantID; ?>" />
                        <button type="submit" class="btn btn-lg btn-full">Reserve <?php echo $dogObj->getName(); ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="small-12 medium-7 columns">
            <div class="dog-desc">
            	<div class="print-col-1">
	            	<div class="bio">
		                <?php echo $dogObj->getLongDescription(); ?>
	            	</div>
	            	<div class="stats print-only">
						<h3>Dog Information</h3>
						<p><span class="label">Level:</span><span class="value"><?php echo $dogObj->getProtectionHandle(true); ?> Protection</span></p>
						<p><span class="label">Breed:</span><span class="value"><?php echo $dogObj->getBreedHandle(true); ?></span></p>
						<p><span class="label">Sex:</span><span class="value"><?php echo $dogObj->getSex(); ?> </span></p>
						<p><span class="label">D.O.B:</span><span class="value"><?php echo $dogObj->getBirthdate('M d, Y'); ?></span></p>
						<p><span class="label">Height:</span><span class="value"><?php echo $dogObj->getHeight(); ?> inches</span></p>
						<p><span class="label">Weight:</span><span class="value"><?php echo $dogObj->getWeight(); ?> lbs</span></p>
					</div>
            	</div>
                <hr />
                <div class="print-col-2">
	                <div class="gallery">
	                    <ul>
	                        <?php
	                        $imageHelper = Loader::helper('image');
	                        $fs = FileSet::getByID($dogObj->mediaSetID);
	                        $fileList = new FileList();
	                        $fileList->filterBySet($fs);
	                        $fileList->filterByType(FileType::T_IMAGE);
	                        $files = $fileList->get(100,0); //limit it to 100 pictures
	                        $print_count = 0;
	                        foreach($files as $f) {
	                        	$print_count = $print_count+1;
	                        	if( $print_count <= 3 ){
		                        	$img_class = 'show-for-print';
	                        	}else{
		                        	$img_class = 'hide-for-print';
	                        	}
	                            // getThumbnail($fileObj, maxWidth, maxHeight, {crop?true|false})
	                            echo '<li class="'.$img_class.' count-'.$print_count.'"><img src="'.$imageHelper->getThumbnail($f, 750, 1000, false)->src.'" /></li>';
	                        }
	                        ?>
	                    </ul>
	                </div>
                </div>
            </div>
        </div>
    </div>
</article>
<!-- END .content -->


<!-- BEGIN .footer -->
<?php //Loader::packageElement('theme_footer', 'shield'); ?>
<!-- END .footer -->
