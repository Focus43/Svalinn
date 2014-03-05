<!DOCTYPE HTML>
<html lang="<?php echo LANGUAGE; ?>" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 // 
?>
</head>

<body class="antialiased professional">

    <div class="container">
        <div class="row">
            <div id="cContainer" class="span12">
                
                <?php Loader::packageElement('theme_header', 'shield'); ?>
                
                <div id="subheader">
                    <div class="darkblue clearfix">
                        <h1 class="pull-left"><?php echo Page::getCurrentPage()->getCollectionName(); ?> <small class="visible-desktop"><?php echo Page::getCurrentPage()->getCollectionDescription(); ?></small></h1>
                        <div class="socialize pull-right">
                            <fb:like send="true" layout="button_count" width="120" show_faces="false" font="segoe ui"></fb:like>
                        </div>
                    </div>
<!--                    --><?php
//                        $bt = BlockType::getByHandle('autonav');
//                        $bt->controller->orderBy = 'display_asc';
//                        $bt->controller->displayPages = 'top';
//                        $bt->controller->displaySubPages = 'relevant_breadcrumb';
//                        $bt->controller->displaySubPageLevels = 'all';
//                        $bt->render('templates/srk9_breadcrumb');
//                    ?>
                </div>
                
                <div id="cPrimary">
                    <div class="row-fluid">
                        <div class="span9">
                            <?php $a = new Area('Main Content'); $a->display($c); ?>
                        </div>
                    </div>
                </div>
                
                <?php Loader::packageElement('theme_footer', 'shield', array('c' => $c)); ?>
                
            </div>
        </div>
    </div>
    
    <?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>