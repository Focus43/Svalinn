<? defined('C5_EXECUTE') or die(_("Access Denied."));
$navItems = $controller->getNavItems(true);

if ($bt->controller->dog) {
    $dogNi = new stdClass();
    $dogNi->url = "/dogs-for-sale/profile/" . $bt->controller->dog->getDogID() . "/";
    $dogNi->target = "self";
    $dogNi->name = $bt->controller->dog->getName();
    $dogNi->isCurrent = true;

    // set current last nav item to not current
    $lastNi = $navItems[count($navItems)-1];
    $lastNi->isCurrent = false;
    // add dog to nav items array
    array_push($navItems, $dogNi);
}

$navCount = count($navItems);

if ( $navCount > 0 ) {

    echo '<ul class="breadcrumb">';

    for ($i = 0; $i < $navCount; $i++) {
        $ni = $navItems[$i];
        if ( $ni->isCurrent ) {
            echo '<li class="active">';
            echo $ni->name;
        } else {
            echo '<li>';
            echo '<a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a>';
        }

        if ( $i < $navCount - 1 ) {
            echo '<span class="divider">/</span>';
        }

        echo '</li>';
    }


    echo '</ul>';

}
