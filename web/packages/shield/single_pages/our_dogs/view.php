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
    <?php Loader::packageElement('blue_masthead', 'shield', array('pageObj' => Page::getCurrentPage())); ?>
    <!-- END .masthead -->

    <!-- BEGIN .submast -->
    <article class="container bg-knot-gray-lg">
        <div class="row">
            <div class="column medium-10 medium-centered"></div>
        </div>
    </article>
    <!-- END .submast -->

    <!-- BEGIN .content -->
    <article class="container main bg-gray">
        <div class="row">
            <div class="small-12 medium-3 columns">
                <ul class="side-nav">
                    <li class="divider">BY BREED</li>
                    <li class="<?php if($filteredBy === ShieldDog::BREED_GERMAN_SHEPHERD){echo 'active';} ?>">
                        <a href="<?php echo $this->action('breed', ShieldDog::BREED_GERMAN_SHEPHERD); ?>">German Shepherd</a>
                    </li>
                    <li class="<?php if($filteredBy === ShieldDog::BREED_DUTCH_SHEPHERD){echo 'active';} ?>">
                        <a href="<?php echo $this->action('breed', ShieldDog::BREED_DUTCH_SHEPHERD); ?>">Dutch Shepherd</a>
                    </li>
                    <li class="<?php if($filteredBy === ShieldDog::BREED_MALINOIS){echo 'active';} ?>">
                        <a href="<?php echo $this->action('breed', ShieldDog::BREED_MALINOIS); ?>">Belgian Malinois</a>
                    </li>
                    <li class="divider">BY PROTECTION LEVEL</li>
                    <li class="<?php if($filteredBy === ShieldDog::PROTECTION_LEVEL_I){echo 'active';} ?>">
                        <a href="<?php echo $this->action('protection_level', ShieldDog::PROTECTION_LEVEL_I); ?>">Level I</a>
                    </li>
                    <li class="<?php if($filteredBy === ShieldDog::PROTECTION_LEVEL_II){echo 'active';} ?>">
                        <a href="<?php echo $this->action('protection_level', ShieldDog::PROTECTION_LEVEL_II); ?>">Level II</a>
                    </li>
                    <li class="<?php if($filteredBy === ShieldDog::PROTECTION_LEVEL_III){echo 'active';} ?>">
                        <a href="<?php echo $this->action('protection_level', ShieldDog::PROTECTION_LEVEL_III); ?>">Level III</a>
                    </li>
                </ul>
            </div>
            <div class="small-12 medium-9 columns">
                <?php if(!empty($listResults)): ?>
                <ul class="small-block-grid-2 medium-block-grid-2 dog-grid">
                    <?php foreach($listResults AS $dogObj): ?>
                        <li class="dog-item">
                            <?php Loader::packageElement('partials/dog_item', 'shield', array(
                                'dogObj'      => $dogObj,
                                'imageHelper' => $imageHelper
                            )); ?>
                            <div class="row">
                                <div class="small-12 columns">
                                    <a href="<?php echo $this->action('details', $dogObj->getDogID()); ?>" class="btn gray">Learn More</a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                    <h4 class="text-center">No dogs with requested breed/protection level available.</h4>
                <?php endif; ?>
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