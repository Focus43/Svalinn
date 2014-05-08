<?php defined('C5_EXECUTE') or die("Access Denied.");

	$permissions = new Permissions( Page::getByPath('/dashboard/shield/dogs') );
    
	// does caller of this URL have access?
	if( $permissions->canViewPage() ){
		if(!empty($_POST['dogID'])){
			foreach($_POST['dogID'] AS $dogID){
				ShieldDog::getByID($dogID)->delete();
			}
		}
		
		echo Loader::helper('json')->encode( (object) array(
			'code'	=> 1,
			'msg'	=> 'Success'
		));
	}