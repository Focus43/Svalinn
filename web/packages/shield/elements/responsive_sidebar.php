<aside class="right-off-canvas-menu">
    <?php
        $blockTypeNav = BlockType::getByHandle('autonav');
        $blockTypeNav->controller->orderBy = 'display_asc';
        foreach((array) $navigationSettings AS $key => $value){
            $blockTypeNav->controller->{$key} = $value;
        }
        $blockTypeNav->render('templates/sidebar_nav');
    ?>
</aside>
<a class="exit-off-canvas"></a>