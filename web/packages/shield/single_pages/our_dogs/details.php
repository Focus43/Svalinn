<?php /** @var $dogObj ShieldDog */ ?>

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
                    <a href="<?php echo $this->url('/our_dogs'); ?>" class="btn btn-full gray" style="background:#aaa;">See Other Dogs</a><br/>
                    <a href="/privateclient/contact/" class="btn btn-lg" style="background:#aaa;">Contact Us</a>
                    <!--<p>Reserve <?php echo $dogObj->getName(); ?> For $<?php echo $dogObj->getPrice(true); ?></p>-->
                </div>
            </div>
        </div>
        <div class="small-12 medium-7 columns">
            <div class="dog-desc">
                <?php echo $dogObj->getLongDescription(); ?>
                <hr />
                <div class="gallery">
                    <ul>
                        <?php
                        $imageHelper = Loader::helper('image');
                        $fs = FileSet::getByID($dogObj->mediaSetID);
                        $fileList = new FileList();
                        $fileList->filterBySet($fs);
                        $fileList->filterByType(FileType::T_IMAGE);
                        $files = $fileList->get(100,0); //limit it to 100 pictures
                        foreach($files as $f) {
                            // getThumbnail($fileObj, maxWidth, maxHeight, {crop?true|false})
                            echo '<li><img src="'.$imageHelper->getThumbnail($f, 750, 600, true)->src.'" /></li>';
                        }
                        ?>
                    </ul>
                </div>
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