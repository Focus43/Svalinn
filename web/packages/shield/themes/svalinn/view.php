<?php
if( !($this->controller instanceof ShieldPageController) ){
    $ctrlr = new ShieldPageController;
    $ctrlr->includeAssets( $this->controller );
}
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js"><!--<![endif]-->
<head>
    <?php
    Loader::packageElement('html_head', 'shield');
    Loader::element('header_required'); // REQUIRED BY C5 //
    ?>
</head>

<body class="antialiased<?php echo $bodyClasses; ?> default privateclient">
<div class="off-canvas-wrap">
    <div class="inner-wrap">
        <div class="main-wrap">
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

            <!-- BEGIN .content -->
            <article class="container main">
                <div class="row" style="max-width:100%;">
                    <?php print $innerContent; ?>
                </div>
            </article>
            <!-- END .content -->
            <!-- BEGIN .footer -->
            <?php Loader::packageElement('theme_footer', 'shield'); ?>
            <!-- END .footer -->
        </div><!-- END .main-wrap -->
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
<?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>
