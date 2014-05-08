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
					<p>Reserve Mayhem For $<?php echo $dogObj->getPrice(true); ?></p>
					<a href="#" class="btn btn-bordered btn-md blue on-lite uppercase align-center">Make A Deposit</a>
				</div>
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