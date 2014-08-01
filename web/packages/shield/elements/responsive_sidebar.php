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
        <li><a class="btn btn-blue" href="/privateclient">Private Client</a></li>
        <li><a class="btn btn-blue" href="/professional">Professional</a></li>
        <li><a class="btn btn-blue" href="/store">Store</a></li>
        <li><a class="btn btn-blue" href="mailto:info@svalinn.com">Contact</a></li>
    </ul>
</aside>
<a class="exit-off-canvas"></a>