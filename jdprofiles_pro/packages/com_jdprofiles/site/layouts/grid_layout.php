<?php 
$items = $displayData->get('items');
$params = $displayData->get('params');
?>
<div class="container py-5">
	<div class="jd-team-showcase-wrapper jd-grid-layout-view jd-grid-simple-layout">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<!-- Team Item wrapper start -->
					<?php foreach($items as $i => $item) { ?>
					<div class="jd-team-columns col-12 col-md-6 col-lg-4">
						<div class="card-team jd-team-items">
							<?php if(!empty($item->image)) { ?>
							<img src="<?php echo $item->image;  ?>" alt="<?php echo $item->name;  ?>" class="card-img-top team-mamber-image">
							<?php }?>
							<?php if($params->get('display_name',1) or $params->get('display_designation',1) ) { ?>
							<div class="card-team-body">
								<div class="team-member-content-wrapper">
									<?php if($params->get('display_name',1)) { ?>
									<h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>">
											<?php  echo $item->name; ?></a></h5>
									<?php } ?>
									<?php if($params->get('display_designation',1)) { ?>
									<p class="team-member-designation">
										<small>
											<?php echo $item->designation;  ?></small>
									</p>
									<?php } ?>
									<?php if(!empty($item->sbio)) { ?>
									<p class="card-img-overlayteam-member-bio">
										<?php echo $item->sbio;  ?>
									</p>
									<?php }?>
								</div>
							</div>
							<?php }?>
							<?php if($params->get('show_socialsIcon')) { ?>
							<?php if(!empty($item->social)) { ?>
							<div class="card-team-footer social-item-wrapper">
								<ul class="social-profile <?php echo $params->get('IconStyle');  ?>">
									<?php  $socials=  json_decode($item->social);?>
									<?php  foreach($socials as $social){?>
									<li>
										<a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>">
											<i class="<?php echo $social->icon?>"></i>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
							<?php } ?>
							<?php } ?>
						</div>
					</div>
					<?php  } ?>
					<!-- Team Item wrapper end -->
				</div>
			</div>
		</div>
	</div>
</div>