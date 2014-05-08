<?php /** @var $dogObj ShieldDog */ ?>

<div class="off-canvas-wrap">
    <div class="inner-wrap">
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
                    </div>
                </div>
                <?php /*foreach ($galleryFiles as $file) {
                    $fv = $file->getApprovedVersion();
                    $desc = $fv->getDescription();
                    ?>
                    <img src="<?php echo $image->getThumbnail($file, 600, 400, false)->src; ?>" class="thumbnail" style="margin: 0 auto">
                    <span class="caption"><?php echo $desc ?></span>

                <?php }*/ ?>
            </div>
            <div class="small-12 medium-7 columns">
                <div class="dog-desc">
					<?php echo $dogObj->getLongDescription(); ?>
				</div>
				<div class="reserve">
					<hr class="divide o-gray"/>
					<p>Reserve <?php echo $dogObj->getName(); ?> For $<?php echo $dogObj->getPrice(true); ?></p>
					<a href="#" class="btn btn-bordered btn-md blue on-lite uppercase align-center">Make A Deposit</a>
				</div>
            </div>
        </div>
    </article>
    <!-- END .content -->


    <!-- BEGIN .footer -->
    <?php Loader::packageElement('theme_footer', 'shield'); ?>
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