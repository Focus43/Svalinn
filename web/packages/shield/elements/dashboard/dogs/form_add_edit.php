<?php /* @var $dogObj ShieldDog */
Loader::element('editor_config');
$formHelper = Loader::helper('form');
$dateHelper = Loader::helper('form/date_time');
$assetLibrary = Loader::helper('concrete/asset_library');
?>

<style>
    .ccm-ui select {width:100%;}
</style>
			
<form method="post" action="<?php echo $this->action('save', $dogObj->getDogID()); ?>">

    <div class="row-fluid">
        <div class="span12">
            <h4 style="margin-bottom:10px;">Details</h4>
            <table class="table table-bordered">
                <tr>
                    <td style="width:20%;">Name</td>
                    <td style="width:15%;">Breed</td>
                    <td style="width:15%;">Protection</td>
                    <td style="width:15%;">Price</td>
                    <td>Status</td>
                    <td>Site Visibility</td>
                </tr>
                <tr>
                    <td><?php echo $formHelper->text('name', $dogObj->getName(), array('class' => 'input-block-level')); ?></td>
                    <td><?php echo $formHelper->select('breedHandle', ShieldDog::$dogBreeds, $dogObj->getBreedHandle()); ?></td>
                    <td><?php echo $formHelper->select('protectionHandle', ShieldDog::$protectionLevels, $dogObj->getProtectionHandle()); ?></td>
                    <td><?php echo $formHelper->text('price', $dogObj->getPrice(), array('class' => 'input-block-level')); ?></td>
                    <td rowspan="3">
                        <?php echo $formHelper->select('reservedStatus', ShieldDog::$reservedOptions, $dogObj->getReservedStatus()); ?>

                        <div id="reserved-until" style="<?php echo (int)$dogObj->getReservedStatus() !== ShieldDog::RESERVED_YES ? 'display:none;' : ''; ?>">
                            <p style="padding:0.6rem 0 0.2rem;margin:0;">Reserved Until</p>
                            <?php echo $dateHelper->date('reservedUntil', $dogObj->getReservedUntil()); ?>
                        </div>
                    </td>
                    <td rowspan="3"><?php echo $formHelper->select('activeStatus', ShieldDog::$activeStatusList, $dogObj->getActiveStatus()); ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td>Height</td>
                    <td>Weight</td>
                    <td>Sex</td>
                </tr>
                <tr>
                    <td><?php echo $dateHelper->date('birthdate', $dogObj->getBirthdate()); ?></td>
                    <td><?php echo $formHelper->text('height', $dogObj->getHeight(), array('class' => 'input-block-level')); ?></td>
                    <td><?php echo $formHelper->text('weight', $dogObj->getHeight(), array('class' => 'input-block-level')); ?></td>
                    <td><?php echo $formHelper->select('sex', ShieldDog::$sexes, $dogObj->getSex(), array('class' => 'input-block-level')); ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <h4 style="margin-bottom:10px;">Media</h4>
            <table class="table table-bordered">
                <tr>
                    <td>Main Photo</td>
                    <td>Gallery Photo Set</td>
                    <td>Youtube Videos</td>
                </tr>
                <tr>
                    <td><?php echo $assetLibrary->image('pictureID', 'picID', 'Dog Photo', File::getByID($dogObj->getPicID())); ?></td>
                    <td><?php echo $formHelper->select('mediaSetID', DashboardShieldDogsController::getFileSets() , $dogObj->getMediaSetID()); ?></td>
                    <td>
                        <?php echo $formHelper->text('youtubeVideo1', $dogObj->getYoutubeVideo1(), array('class' => 'input-block-level', 'placeholder' => 'Video URL 1')); ?>
                        <?php echo $formHelper->text('youtubeVideo2', $dogObj->getYoutubeVideo2(), array('class' => 'input-block-level', 'placeholder' => 'Video URL 2')); ?>
                        <?php echo $formHelper->text('youtubeVideo3', $dogObj->getYoutubeVideo3(), array('class' => 'input-block-level', 'placeholder' => 'Video URL 3')); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <h4 style="margin-bottom:10px;">Short Description</h4>
            <table class="table table-bordered" style="height:250px;">
                <tr class="no-stripe">
                    <td>
                        <div style="background:#fff;">
                            <?php Loader::element('editor_controls'); ?>
                            <?php echo $formHelper->textarea('shortDescription', $dogObj->getShortDescription(), array('class' => 'ccm-advanced-editor')); ?>
                        </div>
                    </td>
                </tr>
            </table>

            <h4 style="margin-bottom:10px;">Long Description</h4>
            <table class="table table-bordered" style="height:250px;">
                <tr class="no-stripe">
                    <td>
                        <div style="background:#fff;">
                            <?php Loader::element('editor_controls'); ?>
                            <?php echo $formHelper->textarea('longDescription', $dogObj->getLongDescription(), array('class' => 'ccm-advanced-editor')); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
	
	<div class="clearfix" style="padding-bottom:0;">
		<button type="submit" class="btn primary pull-right">Save</button>
	</div>
</form>

<script type="text/javascript">
    $(function(){
        $('[name="reservedStatus"]').on('change', function(){
            $('#reserved-until').toggle( this.value == <?php echo ShieldDog::RESERVED_YES; ?> );
        }).trigger('change'); // trigger immediately upon loading the page
    });
</script>