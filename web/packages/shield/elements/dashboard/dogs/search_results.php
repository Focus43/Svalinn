<?php $columns = ShieldDogColumnSet::getCurrent();
	$imageHelper = Loader::helper('image');
?>

<div id="ccm-<?php echo $searchInstance; ?>-search-results">
	<div class="ccm-pane-body">
		<div class="clearfix">
			<div class="pull-left">
				<select id="actionMenu" class="span3" disabled="disabled" data-action-delete="<?php echo 'dashboard/dogs/delete'; ?>">
					<option value="">** With Selected</option>
					<option value="delete">Delete Dog</option>
				</select>
			</div>
		</div>
		
		<table id="svalinnSearchTable" border="0" cellspacing="0" cellpadding="0" class="group-left ccm-results-list">
			<thead>
				<tr>
					<th><input id="checkAllBoxes" type="checkbox" /></th>
					<th>Profile Photo</th>
					<?php foreach($columns->getColumns() as $col) { ?>
		                <?php if ($col->isColumnSortable()) { ?>
		                	<th class="<?php echo $listObject->getSearchResultsClass($col->getColumnKey())?>"><a href="<?php echo $listObject->getSortByURL($col->getColumnKey(), $col->getColumnDefaultSortDirection(), (SRK_TOOLS_URL . 'dashboard/dogs/search_results'), array())?>"><?php echo $col->getColumnName()?></a></th>
		                <?php } else { ?>
		                	<th><?php echo $col->getColumnName() ?></th>
		                <?php } ?>
	                <?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listResults AS $dog): ?>
					<tr>
						<td><input type="checkbox" name="dogID[]" value="<?php echo $dog->getDogID(); ?>" /></td>
						<td>
							<?php if($dog->getPictureFileObj()->getFileID() >= 1): ?>
								<img class="thumbnail" src="<?php echo $imageHelper->getThumbnail($dog->getPictureFileObj(), 75, 65, true)->src; ?>" />
							<?php else: ?>
								<span class="thumbnail" style="display:block;width:75px;height:55px;background:#f1f1f1;font-size:11px;text-align:center;padding-top:10px;">None</span>
							<?php endif; ?>
						</td>
						<?php foreach($columns->getColumns() AS $colObj){ ?>
							<td class="<?php echo strtolower($colObj->getColumnName()); ?>"><?php echo $colObj->getColumnValue($dog); ?></td>
						<?php } ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		<!-- # of results -->
		<?php $listObject->displaySummary(); ?>
	</div>
	
	<!-- paging stuff -->
	<div class="ccm-pane-footer">
		<?php $listObject->displayPagingV2((SHIELD_TOOLS_URL . 'dashboard/dogs/search_results'), array()) ?>
	</div>
</div>
