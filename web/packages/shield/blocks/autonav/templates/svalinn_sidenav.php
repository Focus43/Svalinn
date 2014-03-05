<? defined('C5_EXECUTE') or die(_("Access Denied."));
$navItems = $controller->getNavItems(true);
$navCount = count($navItems);

if ( $navCount > 0 ) {

    echo '<div class="well sidenav"><ul class="nav nav-list">';

    for ($i = 0; $i < $navCount; $i++) {

        $ni = $navItems[$i];

        if ( $ni->isCurrent ) {
            echo '<li class="active">';
        } else {
            echo '<li>';
        }
        echo '<a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';

    }

    echo '</ul></div>';

}
