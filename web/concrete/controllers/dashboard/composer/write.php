<?
defined('C5_EXECUTE') or die("Access Denied.");
Loader::model('collection_types');
class DashboardComposerWriteController extends Controller {

	public $helpers = array('form', 'html');
	
	public function save() {
		if ($this->isPost()) {
			if (intval($this->post('entryID')) > 0) {
				$entry = ComposerPage::getByID($this->post('entryID'), 'RECENT');
			}
			
			if (!is_object($entry)) {
				$this->error->add(t('Invalid page.'));
			} else {
				$ct = CollectionType::getByID($entry->getCollectionTypeID());
			}
		
			$valt = Loader::helper('validation/token');
			$vtex = Loader::helper('validation/strings');
			
			if (!$valt->validate('composer')) {
				$this->error->add($valt->getErrorMessage());
			}
			
			if ($this->post("ccm-submit-publish")) {
				if (!$vtex->notempty($this->post('cName'))) {
					$this->error->add(t('You must provide a name for your page before you can publish it.'));
				}
				if (!$entry->isValidComposerDraft()) {
					$this->error->add(t('This is not a valid composer draft'));
				}
				
				if ($ct->getCollectionTypeComposerPublishMethod() == 'CHOOSE' || $ct->getCollectionTypeComposerPublishMethod() == 'PAGE_TYPE') { 
					$parent = Page::getByID($this->post('cPublishParentID'));
					if (!is_object($parent) || $parent->isError()) {
						$this->error->add(t('Invalid parent page.'));
					} else {
						$cp = new Permissions($parent);
						if (!$cp->canAddSubCollection($ct)) {
							$this->error->add(t('You do not have permissions to add this page type in that location.'));
						}
					}
				} else if ($ct->getCollectionTypeComposerPublishMethod() == 'PARENT') {
					$parent = Page::getByID($ct->getCollectionTypeComposerPublishPageParentID());
				}
			} else if ($this->post('ccm-submit-discard') && !$this->error->has()) {
				if ($entry->isValidComposerDraft()) {
					$entry->delete();
					$this->redirect('/dashboard/composer/drafts', 'draft_discarded');
				}
			}
			
			if (!$this->error->has()) {
				
				$data = array('cName' => $this->post('cName'), 'cDescription' => $this->post('cDescription'));
				$entry->update($data);
				$this->saveData($entry);
				if ($this->post('ccm-submit-publish')) {
					$entry->move($parent);
					$v = CollectionVersion::get($entry, 'RECENT');
					$v->approve();
					$entry->markComposerPageAsPublished();
					$this->redirect('?cID=' . $entry->getCollectionID());
				} else if ($this->post('autosave')) { 
					// this is done by javascript. we refresh silently and send a json success back
					$json = Loader::helper('json');
					$obj = new stdClass;
					$dh = Loader::helper('date');
					$obj->error = false;
					$obj->time = $dh->getLocalDateTime('now','g:i a');
					$obj->timestamp =date('m/d/Y g:i a');
					print $json->encode($obj);
					exit;
				} else {
					$this->redirect('/dashboard/composer/write', 'edit', $entry->getCollectionID(), 'saved');
				}
			} else if (is_object($entry)) {
				$this->edit($entry->getCollectionID());
			}
			
		} else {
			$this->redirect('/dashboard/composer');	
		}
	}
	
	public function edit($cID = false, $mode = false) {
		
		switch($mode) {
			case 'saved':
				$this->set('message', t('Draft saved successfully.'));
				break;
		}
		
		if (intval($cID) > 0) {
			$entry = ComposerPage::getByID($cID, 'RECENT');
		}
		
		if (!is_object($entry)) {
			$this->redirect("/dashboard/composer");
		} else {
			$ct = CollectionType::getByID($entry->getCollectionTypeID());
			$this->set('entry', $entry);
			$this->set("ct", $ct);
			$this->set('name', $entry->getCollectionName());
			$this->set('description', $entry->getCollectionDescription());
			$this->set('contentitems', $ct->getComposerContentItems());
		}
	}
	
	protected function saveData($p) {
		$ct = CollectionType::getByID($p->getCollectionTypeID());
		$blocks = $p->getComposerBlocks();
		
		// now we grab the instance on the created page
		foreach($blocks as $b) {
			$req = $b->getController()->post();
			$b2 = Block::getByID($b->getBlockID(), $p, $b->getAreaHandle());
			$b2->update($req);
		}
				
		Loader::model("attribute/categories/collection");
		$aks = $ct->getComposerAttributeKeys();
		foreach($aks as $cak) {
			$cak->saveAttributeForm($p);				
		}	
	}
	
	public function on_before_render() {
		$this->set('error', $this->error);
	}
	
	public function on_start() {
		$this->error = Loader::helper('validation/error');
		$this->set('disableThirdLevelNav', true);
	}
	
	protected function setCollectionType($ctID) {
		if (intval($ctID) > 0) {
			$ct = CollectionType::getByID($ctID);
			if (is_object($ct)) {
				if (!$ct->isCollectionTypeIncludedInComposer()) {
					unset($ct);
				}
			}			
		}
		if (is_object($ct)) {
			$this->set('ct', $ct);
			$this->set('contentitems', $ct->getComposerContentItems());
		}
		return $ct;
	}

	public function view($ctID = false) {
		$ct = $this->setCollectionType($ctID);		
		if (!is_object($ct)) {
			$ctArray = CollectionType::getComposerPageTypes();
			if (count($ctArray) == 1) {
				$ct = $ctArray[0];
				$this->redirect('/dashboard/composer/write', $ct->getCollectionTypeID());
				exit;
			}
			$this->set('ctArray', $ctArray);
			//$this->redirect('/dashboard/composer');
		} else {
			// create a new page of this type
			$entry = ComposerPage::createDraft($ct);
			$this->redirect('/dashboard/composer/write', 'edit', $entry->getCollectionID());
		}
	}
	
}