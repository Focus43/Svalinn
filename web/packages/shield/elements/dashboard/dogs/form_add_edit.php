<?php Loader::element('editor_config');
	$formHelper = Loader::helper('form');
    $dateHelper = Loader::helper('form/date_time');
	$assetLibrary = Loader::helper('concrete/asset_library');
?>
			
<form method="post" action="<?php echo $this->action('save', $dogObj->getDogID()); ?>">
	<h4>Add Or Update Dog</h4>

	<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="4">Dog Details</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:33%;">Name</td>
						<td style="width:33%;">Breed</td>
						<td colspan="2">Protection Level</td>
					</tr>
					<tr>
						<td><?php echo $formHelper->text('name', $dogObj->getName(), array('class' => 'input-block-level')); ?></td>
                        <td>
                            <?php echo $formHelper->select('breedHandle', ShieldDog::$dogBreeds, $dogObj->getBreedHandle()); ?>
                        </td>
                        <td colspan="2">
                            <?php echo $formHelper->select('protectionHandle', ShieldDog::$protectionLevels, $dogObj->getProtectionHandle()); ?>
                        </td>
					</tr>
					<tr>
						<td>Picture</td>
                        <td>Image Set</td>
						<td>Price</td>
                        <td>Status</td>
					</tr>
					<tr>
                        <?php
                        // TODO: move to controller
                        $fsl = new FileSetList();
                        $listArr = $fsl->get();
                        $fileSetList = array("0" => "Choose an image set...");

                        foreach ($listArr as $set) {
                            $fileSetList[$set->getFileSetID()] = $set->getFileSetName();
                        }

                        ?>
						<td><?php echo $assetLibrary->image('pictureID', 'picID', 'Dog Photo', File::getByID($dogObj->getPicID())); ?></td>
                        <td>
                            <?php echo $formHelper->select('mediaSetID', $fileSetList , $dogObj->getMediaSetID()); ?>
                        </td>
                        <td><?php echo $formHelper->text('price', $dogObj->getPrice(), array('class' => 'input-block-level')); ?></td>
                        <td><?php foreach ( ShieldDog::$reservedOptions as $key=>$option ) {
                                echo $formHelper->radio('reservedStatus', $key, $dogObj->getReservedStatus()) . " " . $option . "<br>";
                            }?>
                        </td>
					</tr>
					<tr>
					    <td style="width:33%;">Youtube Video 1</td>
                        <td style="width:33%;">Youtube Video 2</td>
                        <td colspan="2">Youtube Video 3</td>
					</tr>
					<tr>
                        <td style="width:33%;"><?php echo $formHelper->text('youtubeVideo1', $dogObj->getYoutubeVideo1(), array('class' => 'input-block-level')); ?></td>
                        <td style="width:33%;"><?php echo $formHelper->text('youtubeVideo2', $dogObj->getYoutubeVideo2(), array('class' => 'input-block-level')); ?></td>
                        <td colspan="2"><?php echo $formHelper->text('youtubeVideo3', $dogObj->getYoutubeVideo3(), array('class' => 'input-block-level')); ?></td>
                    </tr>
                    <tr>
                        <td>Height</td>
                        <td>Weight</td>
                        <td>Sex</td>
                        <td>Birthdate</td>
                    </tr>
                    <tr>
                        <td><?php echo $formHelper->text('height', $dogObj->getHeight(), array('class' => 'input-block-level')); ?></td>
                        <td><?php echo $formHelper->text('weight', $dogObj->getHeight(), array('class' => 'input-block-level')); ?></td>
                        <td><?php echo $formHelper->select('sex', ShieldDog::$sexes, $dogObj->getSex(), array('class' => 'input-block-level')); ?></td>
                        <td><?php echo $dateHelper->date('birthdate', $dogObj->getBirthdate()); ?></td>
                    </tr>
					<tr>
						<td colspan="4">Short Description</td>
					</tr>
					<tr class="no-stripe">
						<td colspan="4">
							<div style="background:#fff;">
								<?php Loader::element('editor_controls'); ?>
								<?php echo $formHelper->textarea('shortDescription', $dogObj->getShortDescription(), array('class' => 'ccm-advanced-editor')); ?>
							</div>
						</td>
					</tr>

                    <tr>
                        <td colspan="4">Long Description</td>
                    </tr>
                    <tr class="no-stripe">
                        <td colspan="4">
                            <div style="background:#fff;">
                                <?php Loader::element('editor_controls'); ?>
                                <?php echo $formHelper->textarea('longDescription', $dogObj->getLongDescription(), array('class' => 'ccm-advanced-editor')); ?>
                            </div>
                        </td>
                    </tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="clearfix" style="padding-bottom:0;">
		<button type="submit" class="btn primary pull-right">Save</button>
	</div>
</form>