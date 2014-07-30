<!-- BEGIN HEADER -->
<?php Loader::packageElement('theme_header', 'shield', array(
    'navigationSettings' => array(
        'displayPages'   => 'top'
    )
)); ?>
<!-- END HEADER   -->

<!-- BEGIN .masthead -->
<?php Loader::packageElement('blue_masthead', 'shield', array('pageObj' => Page::getCurrentPage())); ?>
<!-- END .masthead -->

<article class="container main">
    <div class="row" style="max-width:100%;">
        <?php if( !is_object($productObj) ){ // Product not found/API error... ?>

            <h2>Oh no!</h2>
            <p>Seems like the product you&#39;re looking for either couldn&#39;t be found, or is no longer available.</p>
            <p><a href="<?php echo View::url('/store'); ?>">Head back to the store...</a></p>

        <?php }else{ /** @var $productObj stdClass : Product found... */ ?>

            <div class="column medium-5">
                <div class="product-image-main">
                    <img src="<?php echo ShopifiableImage::getOrCreate($productObj->image->src); ?>" />
                </div>
                <div class="product-image-opts clearfix">
                    <?php if( is_array($productObj->images) ){ foreach($productObj->images AS $imageObj): ?>
                        <a class="img-alt" data-src="<?php echo $imageObj->src; ?>">
                            <img src="<?php echo ShopifiableImage::getOrCreate($imageObj->src); ?>" />
                        </a>
                    <?php endforeach; } ?>
                </div>
            </div>

            <div class="column medium-7">
                <form class="product-detail" method="post" action="<?php echo ShopifiablePackage::STORE_URL; ?>cart/add">
                    <h3><?php echo $productObj->title; ?></h3>
                    <h4>Price: $<?php echo $productObj->variants[0]->price; ?></h4>
                    <p><?php echo $productObj->body_html; ?></p>
                    <?php $options = array(); if(!empty($productObj->variants)){ foreach($productObj->variants as $variantObj){
                        $options[$variantObj->id] = $variantObj->title;
                    }}; echo $formHelper->select('id', $options); ?>
                    <input type="hidden" name="return_to" value="back" />
                    <button type="submit" class="btn btn-lg">Add To Cart</button>
                </form>
            </div>

        <?php } ?>
    </div>
</article>

<article class="container product-detail-back">
    <div class="row">
        <div class="column medium-11 medium-centered">
            <a href="<?php echo $this->url('/store'); ?>">Back To All Svalinn Products</a>
        </div>
    </div>
</article>

