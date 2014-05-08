<div class="off-canvas-wrap">
    <div class="inner-wrap">
    <!-- BEGIN HEADER -->
    <!--<header class="container header bg-white">
        <nav class="primary-nav-container" data-topbar data-options="is_hover: true;">
            <section class="left name"><a href="/" title="Svalinn" rel="home">
                    <img src="/packages/shield/img/logo-svalinn.svg"/>
                </a></section>
            <section class="top-bar-section primary-nav-section show-for-large-up">
                <ul class="left" role="navigation">
                    <li><a href="#">About</a></li>
                    <li class="has-dropdown not-click">
                        <a href="#">Svalinn Difference</a>
                        <ul class="dropdown">
                            <li><a href="">Training</a></li>
                            <li><a href="">Guarantee</a></li>
                            <li><a href="">Breed Specifications</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown not-click">
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

            </section>
            <div class="right-off-canvas-toggle menu-icon show-for-medium-down right"><a href="#"><span></span></a></div>
        </nav>
    </header>-->
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
                    <li class="active"><a href="#">German Shepherd</a></li>
                    <li><a href="#">Dutch Shepherd</a></li>
                    <li><a href="#">Belgian Malinois</a></li>
                    <li class="divider">BY PROTECTION LEVEL</li>
                    <li><a href="#">Level I</a></li>
                    <li><a href="#">Level II</a></li>
                    <li><a href="#">Level III</a></li>
                </ul>
            </div>
            <div class="small-12 medium-9 columns">
                <ul class="small-block-grid-2 medium-block-grid-2 dog-grid">
                    <?php
                        foreach($listResults AS $dogObj){
                            Loader::packageElement('partials/dog_item', 'shield', array(
                                'dogObj'      => $dogObj,
                                'imageHelper' => $imageHelper
                            ));
                        }
                    ?>
                    <!--<li class="dog-item">
                        <div class="row">
		            		<div class="small-12 columns">
		            			<img src="/packages/shield/img/dog-placeholder.jpg"/>
		            		</div>
		            	</div>
                        <div class="row">
                            <div class="small-6 columns name">Mayhem</div>
                            <div class="small-6 columns breed">Belgian Malinois</div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="small-6 columns level">Level III Protection</div>
                            <div class="small-6 columns dob">Born: March 12, 2008</div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <a href="#" class="btn gray">Learn More</a>
                            </div>
                        </div>
                    </li>
                    <li class="dog-item">
                        <div class="row">
		            		<div class="small-12 columns">
		            			<img src="/packages/shield/img/dog-placeholder.jpg"/>
		            		</div>
		            	</div>
                        <div class="row">
                            <div class="small-6 columns name">Mayhem</div>
                            <div class="small-6 columns breed">Belgian Malinois</div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="small-6 columns level">Level III Protection</div>
                            <div class="small-6 columns dob">Born: March 12, 2008</div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <a href="#" class="btn gray">Learn More</a>
                            </div>
                        </div>
                    </li>
                    <li class="dog-item">
                        <div class="row">
		            		<div class="small-12 columns">
		            			<img src="/packages/shield/img/dog-placeholder.jpg"/>
		            		</div>
		            	</div>
                        <div class="row">
                            <div class="small-6 columns name">Mayhem</div>
                            <div class="small-6 columns breed">Belgian Malinois</div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="small-6 columns level">Level III Protection</div>
                            <div class="small-6 columns dob">Born: March 12, 2008</div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <a href="#" class="btn gray">Learn More</a>
                            </div>
                        </div>
                    </li>
                    <li class="dog-item">
                        <div class="row">
		            		<div class="small-12 columns">
		            			<img src="/packages/shield/img/dog-placeholder.jpg"/>
		            		</div>
		            	</div>
                        <div class="row">
                            <div class="small-6 columns name">Mayhem</div>
                            <div class="small-6 columns breed">Belgian Malinois</div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="small-6 columns level">Level III Protection</div>
                            <div class="small-6 columns dob">Born: March 12, 2008</div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <a href="#" class="btn gray">Learn More</a>
                            </div>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>
    </article>
    <!-- END .content -->


    <!-- BEGIN .footer -->
    <?php Loader::packageElement('theme_footer', 'shield'); ?>
    <!-- END .footer -->

    <!-- BEGIN .right-off-canvas-menu -->
    <!--<aside class="right-off-canvas-menu">
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
    <a class="exit-off-canvas"></a>-->
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