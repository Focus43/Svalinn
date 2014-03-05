<div class="container-fluid" style="padding:0;">
	<div class="row-fluid">
		<div class="span3">

            <?php
                $bt = BlockType::getByHandle('autonav');
                $bt->controller->orderBy = 'display_asc';
                $bt->controller->displayPages = 'below';
                $bt->controller->displaySubPages = 'none';
                $bt->controller->displaySubPageLevels = 'enough';
                $bt->render('templates/svalinn_sidenav');
            ?>

			<div class="well <?php echo ($this->controller->getTask() == 'profile') ? "dog-sorting" : "" ?>" style="padding:8px 0;">
                <h4 style="padding-left: 15px;">Sort By...</h4>
				<ul id="dogTypeList" class="nav nav-list serifFont">
					<li class="<?php echo !(isset($breedHandle) || isset($protectionHandle)) ? 'active' : ''; ?>"><a href="<?php echo $this->url('dogs_for_sale'); ?>">Alphabetical</a></li>
					<li class="nav-header">By Breed</li>
					<li class="<?php echo ($breedHandle == Dogs::BREED_GERMAN_SHEPHERD) ? 'active' : ''; ?>"><a href="<?php echo $this->action('breed', Dogs::BREED_GERMAN_SHEPHERD); ?>">German Shepherd</a></li>
                    <li class="<?php echo ($breedHandle == Dogs::BREED_DUTCH_SHEPHERD) ? 'active' : ''; ?>"><a href="<?php echo $this->action('breed', Dogs::BREED_DUTCH_SHEPHERD); ?>">Dutch Shepherd</a></li>
					<li class="<?php echo ($breedHandle == Dogs::BREED_MALINOIS) ? 'active' : ''; ?>"><a href="<?php echo $this->action('breed', Dogs::BREED_MALINOIS); ?>">Belgian Malinois</a></li>
                    <li class="nav-header">By Protection Level</li>
                    <li class="<?php echo ($protectionHandle == Dogs::PROTECTION_LEVEL_I) ? 'active' : ''; ?>"><a href="<?php echo $this->action('protection_level', Dogs::PROTECTION_LEVEL_I); ?>">Level I</a></li>
                    <li class="<?php echo ($protectionHandle == Dogs::PROTECTION_LEVEL_II) ? 'active' : ''; ?>"><a href="<?php echo $this->action('protection_level', Dogs::PROTECTION_LEVEL_II); ?>">Level II</a></li>
                    <li class="<?php echo ($protectionHandle == Dogs::PROTECTION_LEVEL_III) ? 'active' : ''; ?>"><a href="<?php echo $this->action('protection_level', Dogs::PROTECTION_LEVEL_III); ?>">Level III</a></li>
				</ul>
			</div>

		</div>
		<div class="span9">
			<?php if($this->controller->getTask() == 'profile'): ?>

                <div id="dogProfile">

    				<?php if($dogObj->getDogID() >= 1): ?>
    					<div class="dog-for-sale clearfix">
    					    <div class="photoHolder pull-left">
    					        <?php if( $dogObj->getPictureFileObj()->getFileID() >= 1 ): ?>
                                    <img class="thumbnail" src="<?php echo $image->getThumbnail($dogObj->getPictureFileObj(), 200, 300, true)->src; ?>" />
                                <?php else: ?>
                                    <span class="thumbnail placeholder">Photo Unavailable</span>
                                <?php endif; ?>
                                <a class="btn btn-success btn-block" href="<?php echo $this->url('about-us/contact'); ?>">Contact</a>
    					    </div>
    						
    						<h3 style="margin-top:0; margin-bottom: 0;"><?php echo "{$dogObj->getName()}, "; ?> <small><?php echo $dogObj->getBreedHandle(true); ?></small>
                                <?php if( $dogObj->getReservedStatus() == Dogs::RESERVED_YES ): ?>
                                    <span class="label label-warning">Reserved</span><br>
                                <?php endif; ?>
                                <?php if( $dogObj->getReservedStatus() == Dogs::RESERVED_SOLD ): ?>
                                    <span class="label label-important">SOLD</span><br>
                                <?php endif; ?>
                            </h3>
    						<p><strong>Protection Level:</strong> <?php echo $dogObj->getProtectionHandle(true); ?>&nbsp;&nbsp;&nbsp;<strong>Price:</strong> <?php echo $dogObj->getPrice(true); ?></p>
    						<?php echo $dogObj->getLongDescription(); ?>
    
    					</div>
                        
                        <hr class="soften">
                        
                        <?php Loader::packageElement('partials/dog_gallery', 'svalinn', array('galleryFiles' => $galleryFiles, 'image' => $image)); ?>
                        
                        <hr class="soften">
                        
                        <!-- videos; if available -->
                        <?php 
                            $youtubeVideos = $dogObj->getYoutubeVideosList();
                            if( !empty($youtubeVideos) ){ foreach($youtubeVideos AS $index => $videoURL): ?>
                                <h3 class="videoHeading"><?php echo $dogObj->getName() . ' Video ' . ($index + 1); ?></h3>
                                <div class="ytVideoContainer">
                                    <iframe class="youtube-player" width="420" height="315" src="http://www.youtube.com/embed/<?php echo $videoURL; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                        <?php endforeach; } ?>
                        
    				<?php else: ?>
    					<div class="alert alert-danger"><h5>This dog is no longer available.</h5></div>
    				<?php endif; ?>
				
				</div>

			<?php else: ?>

				<div class="clearfix">
					<h2 class="pull-left">Our Dogs</h2>
					<div class="pull-right">
						<input id="dogFilter" type="text" value="" style="margin-top:10px;" placeholder="Search by name" />
					</div>
				</div>
				<div id="dogList" class="row-fluid">
					<div class="span6">
						<?php foreach($listColumn1 AS $dogObj): ?>
							<?php Loader::packageElement('partials/dog_quickview', 'svalinn', array('dogObj' => $dogObj, 'image' => $image)); ?>
						<?php endforeach; ?>
					</div>
					<div class="span6">
						<?php foreach($listColumn2 AS $dogObj): ?>
							<?php Loader::packageElement('partials/dog_quickview', 'svalinn', array('dogObj' => $dogObj, 'image' => $image)); ?>
						<?php endforeach; ?>
					</div>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		var $dogList 	= $('#dogList'),
			$dogs 		= $('a.dog-for-sale', $dogList);

		// search filter
		$('#dogFilter').on('keyup', function(){
			var _str = this.value.toLowerCase();
			if( _str.length ){
                $dogList.addClass('applyFilter');
			}else{
                $dogList.removeClass('applyFilter');
			}
			$dogs.each(function(idx, element){
				var $item = $(element);
				$item.toggle( $item.attr('data-name').toLowerCase().indexOf(_str) !== -1 );
			});
		});
	});
</script>
