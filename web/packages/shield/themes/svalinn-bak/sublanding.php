<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?>">

    <div class="off-canvas-wrap">
        <div class="inner-wrap">
            <?php Loader::packageElement('theme_header', 'shield'); ?>

            <!-- Start the masthead container -->
            <div class="container masthead landing">
                <div class="intro">
                    <div class="contain-to-grid">
                        <div class="row collapse">
                            <div class="column small-12 medium-6 large-8">
                                <h1>World Class<br/>Working Dogs.</h1>
                                <p class="hide-for-medium-down">Svalinn K9s are incredible force multipliers<br/>that add capabilities that can't be duplicated.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery">
                    <div class="img"><img src="<?php echo SHIELD_IMAGES_URL; ?>masthead/professional-01.jpg" /></div>
                </div>
            </div>

            <!-- Start the masthead container -->
            <div class="container feature">
                <div class="contain-to-grid">
                    <div class="row">
                        <div class="column medium-8">
                            <h2>New Standards in K9 Performance.</h2>
                            <p>At Svalinn, our training curriculum is built upon a deep understanding and appreciation of the special relationship between man and dog. This foundation allows us to breed, train and deliver the world's best and most stable protection and working Belgian Malinois, Dutch Shepherds and German Shepherds.</p>
                            <p><a href="">Learn About The Dogs &raquo;</a></p>
                        </div>
                        <div class="seal show-for-medium-up"><img src="<?php echo SHIELD_IMAGES_URL; ?>k9-textured-seal.png"/></div>
                    </div>
                </div>
                <div class="dash"></div>
            </div>

            <!-- Start the main container -->
            <div class="container main" role="main">
                <!-- headline -->
                <div class="row section headline">
                    <div class="column medium-10 medium-centered">
                        <blockquote>
                            <p class="text-center">In 2005 we set out to advance the art and ability of the military working dog. Simply put, we succeeded.</p>
                        </blockquote>
                        <p class="text-center">
                            The Svalinn K9 program has developed breeding, tactical conditioning and training techniques that have
                            proven far superior to conventional working dog kennels. Svalinn K9s have proven themselves in multi-force
                            tactical teams in some of the harshest environments in the world — environments in which other K9s and
                            K9 teams have failed.</p>
                        <p class="text-center"><a href="" class="btn-green-inverse">Learn More About Training</a></p>
                    </div>
                </div>
            </div>

            <!-- Start the Footer Container -->
            <?php Loader::packageElement('theme_footer', 'shield'); ?>

            <!-- Off Canvas Menu -->
            <?php
            // TODO: distiguish between professional and private here....
            $bt = BlockType::getByHandle('autonav');
            $bt->controller->orderBy = 'display_asc';
            $bt->controller->displayPages = 'top';
            $bt->controller->displaySubPages = 'all';
            $bt->controller->displaySubPageLevels = 'all';
            //$bt->controller->displaySubPageLevelsNum = 1;
            $bt->render('templates/svalinn_footernav');
            ?>
            <!--<aside class="right-off-canvas-menu">
                <ul class="primary-nav off-canvas-list">
                    <li class="has-dropdown">
                        <a href="#">About</a>
                        <ul class="dropdown">
                            <li><a href="">Overview</a></li>
                            <li><a href="">Philosophy/Approach</a></li>
                            <li><a href="">Testimonials</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">Svalinn Difference</a>
                        <ul class="dropdown">
                            <li><a href="">Our Dogs</a></li>
                            <li><a href="">Training</a></li>
                            <li><a href="">Guarantee</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="#">K9s</a>
                    </li>
                    <li>
                        <a href="#">K9 Teams</a>
                    </li>
                    <li>
                        <a href="#">Advise / Assist</a>
                    </li>
                    <li>
                        <a href="#">Sci Tech</a>
                    </li>

                </ul>
                <ul class="utility-nav off-canvas-list">
                    <li><a class="btn btn-blue" href="">Contact</a></li>
                    <li><a class="btn btn-blue" href="">Private Client</a></li>
                    <li><a class="btn btn-blue" href="">Professional</a></li>
                </ul>
            </aside>
            <a class="exit-off-canvas"></a>-->

        </div>
    </div>

<?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>