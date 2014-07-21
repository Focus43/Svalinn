<?php if( !is_object($productObj) ){ // Product not found/API error... ?>

    <h2>Oh no!</h2>
    <p>Seems like the product you&#39;re looking for either couldn&#39;t be found, or is no longer available.</p>
    <p><a href="<?php echo View::url('/store'); ?>">Head back to the store...</a></p>

<?php }else{ /** @var $productObj stdClass : Product found... */ ?>

    <div class="column medium-5">
        <div class="product-image-main">
            <img src="<?php echo $productObj->image->src; ?>" />
        </div>
        <div class="product-image-opts clearfix">
            <?php if( is_array($productObj->images) ){ foreach($productObj->images AS $imageObj): ?>
                <a class="img-alt" data-src="<?php echo $imageObj->src; ?>">
                    <img src="<?php echo $imageObj->src; ?>" />
                </a>
            <?php endforeach; } ?>
        </div>
    </div>

    <div class="column medium-7">
        <form class="product-detail" method="post" action="http://svalinn.myshopify.com/cart/add">
            <h3><?php echo $productObj->title; ?></h3>
            <p><?php echo $productObj->body_html; ?></p>
            <?php $options = array(); if(!empty($productObj->variants)){ foreach($productObj->variants as $variantObj){
                $options[$variantObj->id] = $variantObj->title;
            }}; echo $formHelper->select('id', $options); ?>
            <input type="hidden" name="return_to" value="back" />
            <button type="submit" class="btn btn-lg">Add To Cart</button>
        </form>
    </div>

<?php }
