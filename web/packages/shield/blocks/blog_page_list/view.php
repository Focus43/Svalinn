<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

    <?php if( !empty($pageResults) ){ foreach($pageResults AS $pageObj): /** @var $pageObj Page */ ?>
        <div class="blogListEntry">
            <a href="<?php echo $this->url( $pageObj->getCollectionPath() ); ?>">
                <h3><?php echo $pageObj->getCollectionName(); ?></h3>
            </a>
            <ul class="unstyled entryCategories clearfix">
                <li><span>Posted by <?php echo UserInfo::getByID($pageObj->getCollectionUserID())->getAttribute('name'); ?> In</span></li>
                <?php $categories = $pageObj->getAttribute('blog_categories');
                    if(!empty($categories)): foreach( $categories AS $selectOptObj ){ ?>
                        <li><span class="label label-info"><?php echo $selectOptObj; ?></span></li>
                <?php } else: ?>
                    <li><span class="label">None</span></li>
                <?php endif; ?>
            </ul>
            
            <?php echo $pageObj->getAttribute('blog_description'); ?>
        </div>        
    <?php endforeach; }
