<?php defined('C5_EXECUTE') or die("Access Denied.");
	$formHelper	  = Loader::helper('form');
	$pageSelector = Loader::helper('form/page_selector');
?>

	<style type="text/css">
	   #btBlogPageList h4 {padding:.6em 0;}
	   #btBlogPageList .toggleable {display:none;}
	   #parentPageIDContainer.toggleable {<?php echo ($this->controller->displayBeneath == BlogPageListBlockController::DISPLAY_PAGES_BENEATH_CUSTOM) ? 'display:block;' : ''; ?>}
	</style>

	<div id="btBlogPageList" class="ccm-ui">
		<h4>Number of Pages to Display</h4>
		<?php echo $formHelper->text('numToShow', $this->controller->numToShow, array('placeholder' => 10)); ?>
		
		<h4>Where?</h4>
		<?php echo $formHelper->radio('displayBeneath', BlogPageListBlockController::DISPLAY_PAGES_BENEATH_CURRENT, $this->controller->displayBeneath, array('data-toggle' => 'displayer')); ?>&nbsp; Beneath Current Page &nbsp;&nbsp;
		<?php echo $formHelper->radio('displayBeneath', BlogPageListBlockController::DISPLAY_PAGES_BENEATH_CUSTOM, $this->controller->displayBeneath, array('data-toggle' => 'displayer')); ?>&nbsp; Beneath Custom Page
		<div id="parentPageIDContainer" class="toggleable" data-toggle-target="displayer" data-toggle-on="<?php echo BlogPageListBlockController::DISPLAY_PAGES_BENEATH_CUSTOM; ?>">
		    <?php echo $pageSelector->selectPage('parentPageID', $this->controller->parentPageID); ?>
		</div>
	</div>

    <script type="text/javascript">
        $(function(){
            $('[data-toggle]', '#btBlogPageList').on('change', function(){
                var $this = $(this),
                    $targ = $('[data-toggle-target="' + $this.attr('data-toggle') + '"]'),
                    _val  = $this.val();
                $targ.toggle( $targ.attr('data-toggle-on') == _val );
            });
        });
    </script>
