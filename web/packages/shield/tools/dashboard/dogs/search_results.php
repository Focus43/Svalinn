<?php defined('C5_EXECUTE') or die("Access Denied.");

	$permissions = new Permissions( Page::getByPath('/dashboard/shield/dogs') );
	
	if( $permissions->canViewPage() ){
		$controller  = Loader::controller('/dashboard/shield/dogs/search');
		$listObject  = $controller->dogListObj();
		$listResults = $listObject->getPage();
		
		Loader::packageElement('dashboard/dogs/search_results', 'shield', array(
			'searchInstance'	=> $searchInstance,
			'listObject'		=> $listObject,
			'listResults'		=> $listResults,
			'pagination'		=> $pagination
		));
	}