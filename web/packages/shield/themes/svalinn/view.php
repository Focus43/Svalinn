<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie6 lt-ie7 lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie7  lt-ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie8 lt-ie9 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js ie9 oldie"> <![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="<?php echo LANGUAGE; ?>" class="no-js"><!--<![endif]-->
<head>
<?php
Loader::packageElement('html_head', 'shield');
Loader::element('header_required'); // REQUIRED BY C5 //
?>
<link rel="stylesheet" href="http://fisherphx.net/svalinn.css" />
</head>

<body class="antialiased<?php echo $bodyClasses; ?>">

    <?php print $innerContent; ?>

<?php Loader::element('footer_required'); // REQUIRED BY C5 // ?>
</body>
</html>