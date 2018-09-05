<?php  
$items = $displayData->get('items');
$params = $displayData->get('params');

?>
<div class="container py-5">
	<div class="jd-team-showcase-wrapper jd-list-layout-view jd-list-simple-layout">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<?php foreach($items as $i => $item) { ?>
					<!-- Team Item wrapper start -->
					<div class="jd-team-columns col-12">
						<div class="card-team jd-team-items">
							<div class="team-mamber-image-wrapper">
								<img src="<?php echo $item->image; ?>" alt="<?php  echo $item->name; ?>" class="team-mamber-image">
							</div>
							<?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
							<div class="card-team-body">
								<div class="team-member-content-wrapper">
									<?php if($params->get('display_name')) { ?>
									<h5 class="team-member-name">
										<a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>">
											<?php  echo $item->name; ?>
										</a>
									</h5>
									<?php } ?>
									<?php if($params->get('display_designation')) { ?>
									<?php if(!empty($item->designation)) { ?>
									<p class="team-member-designation">
										<small>
											<?php  echo $item->designation; ?>
										</small>
									</p>
									<?php } ?>
									<?php } ?>
									<?php if(!empty($item->sbio)) { ?>
									<p class="team-member-bio">
										<?php echo $item->sbio;  ?>
									</p>
									<?php } ?>
									<ul class="list-unstyled contact-info">
										<?php if($params->get('show_Contact')) { ?>
										<li>
											<i class="fas fa-phone"></i>
											<?php  echo $item->phone; ?>
										</li>
										<li>
											<?php } ?>
											<?php if(!empty($item->email)) { ?>
											<i class="fas fa-envelope"></i>
											<?php  echo $item->email; ?>
										</li>
										<?php } ?>
										<?php if(!empty($item->location)) { ?>
										<li>
											<i class="fas fa-map-marker-alt"></i>
											<?php  echo $item->location; ?>
										</li>
										<?php } ?>
									</ul>
								</div>
								<?php } ?>
								<?php if($params->get('show_socialsIcon')) { ?>
								<?php if(!empty($item->social)) { ?>
								<div class="social-item-wrapper">
									<ul class="social-item <?php echo $params->get('IconStyle');  ?>">
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
								<!-- Social item Wrapper End -->
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- Team Item wrapper End -->
				</div>
			</div>
		</div>
	</div>
</div>