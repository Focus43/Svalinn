<aside class="right-off-canvas-menu">
    <?php
        $blockTypeNav = BlockType::getByHandle('autonav');
        $blockTypeNav->controller->orderBy = 'display_asc';
        foreach((array) $navigationSettings AS $key => $value){
            $blockTypeNav->controller->{$key} = $value;
        }
        $blockTypeNav->render('templates/sidebar_nav');
    ?>

    <ul class="utility-nav off-canvas-list">
        <li><a class="btn btn-blue" href="">Contact</a></li>
        <li><a class="btn btn-blue" href="">Private Client</a></li>
        <li><a class="btn btn-blue" href="">Professional</a></li>
    </ul>
</aside>
<a class="exit-off-canvas"></a>