<?php defined('C5_EXECUTE') or die(_("Access Denied."));

/** @var $productList stdClass [products => array(...)] */
/** @var $collectionList stdClass [collections => array(...)] */
?>

<div class="column medium-12 large-12">
    <ul class="collection-list">
        <li class="<?php echo (!isset($activeCollectionID)) ? 'active' : ''; ?>">
            <a href="<?php echo View::url($this->controller->getCollectionObject()->getCollectionPath()); ?>">All</a>
        </li>
        <?php foreach($collectionList->smart_collections AS $collectionObj){ ?>
            <li class="<?php echo ($collectionObj->id == $activeCollectionID) ? 'active' : ''; ?>">
                <a href="<?php echo $this->action('collection', $collectionObj->id); ?>"><?php echo $collectionObj->title; ?></a>
            </li>
        <?php } ?>
    </ul>

    <div id="shopifiable-grid" class="clearfix">
        <?php
        foreach($productList->products AS $productObj){
            Loader::packageElement('product', 'shopifiable', array(
                'productObj' => $productObj,
                'formHelper' => $formHelper // passed from controller
            ));
        }
        ?>
    </div>
</div>