<?php /** @var $productObj stdClass */ ?>
<div class="pr-node" data-id="<?php echo $productObj->id; ?>" data-tags="<?php echo $productObj->tags; ?>">
    <form method="post" action="http://svalinn.myshopify.com/cart/add">
        <h3><?php echo $productObj->title; ?></h3>
        <img src="<?php echo $productObj->image->src; ?>" />
        <p class="descr"><?php echo $productObj->body_html; ?></p>

        <?php $options = array(); if(!empty($productObj->variants)){ foreach($productObj->variants as $variantObj){
            $options[$variantObj->id] = $variantObj->title;
        }}; echo $formHelper->select('id', $options); ?>

        <input type="hidden" name="return_to" value="back" />

        <a href="<?php echo $this->action('product', $productObj->id); ?>" class="btn green">More</a>
        <button type="submit" class="btn">Add To Cart</button>
    </form>
</div>

