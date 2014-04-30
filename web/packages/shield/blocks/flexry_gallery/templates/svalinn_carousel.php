<?php defined('C5_EXECUTE') or die("Access Denied.");
/** @var BlockTemplateHelper $templateHelper */
/** @var FlexryFileList $fileListObj */
$selectorID = sprintf('svalinnCarousel-%s', $this->controller->bID);
$imageList  = $fileListObj->get();
$reversed   = array_reverse($imageList);
?>

<ul class="example-orbit" data-orbit>
    <?php foreach($reversed AS $index => $flexryFile): /** @var FlexryFile $flexryFile */ ?>
        <li class="<?php echo $index === 0 ? ' active' : ''; ?>">
            <img src="<?php echo $flexryFile->fullImgSrc(); ?>" alt="Slide <?php echo $index+1; ?>" />
        </li>
    <?php endforeach; ?>
</ul>