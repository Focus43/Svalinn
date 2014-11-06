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
        <li><a class="btn btn-blue" href="/our-dogs">Our Dogs</a></li>
         <li><a class="btn btn-blue" href="/contact">Contact</a></li>
        <li><a class="btn btn-blue" href="/store">Store</a></li>
       
    </ul>
</aside>
<a class="exit-off-canvas"></a>