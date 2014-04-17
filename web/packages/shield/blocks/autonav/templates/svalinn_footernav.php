<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$navItems = $controller->getNavItems();
// get rid of  level
$navCount = count($navItems);

if ( $navCount > 0 ) {

    $startNum = 0;
    for ( $i = 0; $i < $navCount; $i++ ) {
        $ni = $navItems[$i];

        if ( $ni->level <= 1 ) {
            $startNum ++;
        } else {

            if ( $i == $startNum ) { echo '<aside class="right-off-canvas-menu"><ul class="primary-nav off-canvas-list">'; }

            if ( $i == $startNum && $ni->hasSubmenu ) {
                echo '<li class="has-dropdown"><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a><ul class="dropdown">';
            } else if ($i != $startNum && $ni->hasSubmenu) {
                echo '</ul></li><li class="has-dropdown"><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a><ul class="dropdown">';
            } else {
                echo '<li><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
            }
        }

        if ( $i == $navCount-1 ) { echo '</ul></li></ul></aside>'; }
    }

    echo '<a class="exit-off-canvas"></a>';

}