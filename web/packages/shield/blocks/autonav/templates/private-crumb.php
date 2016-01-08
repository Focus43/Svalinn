<? defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems(true);
echo ' <ul class="breadcrumbs"> ';
for ($i = 0; $i < count($navItems); $i++) {
	$ni = $navItems[$i];

	if($ni->url != '/'){
		if ($ni->isCurrent) {
			echo '<li class="current"><a href="#">'. $ni->name . '</a></li>';
		} else {
			echo '<li><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
		}
	}
}
	echo '</ul>';
