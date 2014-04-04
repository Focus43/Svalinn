<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Dogs'), t(''), false, false ); ?>
	<div id="clinicaWrap">
		<div class="ccm-pane-body">
			<?php Loader::packageElement('dashboard/dogs/form_add_edit', 'svalinn', array('dogObj' => $dogObj)); ?>
		</div>
		<div class="ccm-pane-footer"></div>
	</div>
	
<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false); ?>