<?php
/**
 
 * @package    JD Profile 
 * @author     Joomdev
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;
?>
<div class="container py-5">
  <div class="jd-team-showcase-wrapper team-details-single">
	<div class="row">
	  <div class="col-12">
		<div class="row pb-4">
		  <div class="col-12 col-md-3 team-mamber-image-wrapper">
			<img src="<?php echo $this->item->image; ?>" alt="<?php echo $this->item->name; ?>" class="img-fluid">
		  </div>
		  <div class="col-12 col-md-9">
			<div class="card-team jd-team-items">
			  <div class="card-team-body">
				<div class="team-member-content-wrapper">
				<?php if($this->params->get('display_name',1)) { ?>
					<h3 class="title-heading m-0"><?php echo $this->item->name; ?></h3>
				<?php } ?>
				<?php if($this->params->get('display_designation',1)) { ?>
					<?php if(!empty($this->item->designation)){ ?>
						<p class="team-member-designation">
								<?php echo $this->item->designation; ?>
						</p>
					<?php }  ?>
				<?php }  ?>
					<?php if(!empty($this->item->sbio)) {?>
						<p class="team-member-bio"><?php echo $this->item->sbio; ?></p>
					<?php } ?>
				<?php if($this->params->get('show_Contact',1)) { ?>
				  <ul class="list-unstyled contact-info">
						<?php if(!empty($this->item->phone)) { ?>	
								<li>
									<i class="fas fa-phone fa-rotate-90 mr-2"></i><?php echo $this->item->phone; ?>
								</li>
					
						<?php } ?>
						<?php if(!empty($this->item->email)) { ?>	
							<li>
								<i class="fas fa-envelope mr-2"></i> <?php echo $this->item->email; ?>
							</li>
						<?php  } ?>
						<?php if(!empty($this->item->location)) { ?>	
							<li>
								<i class="fas fa-map-marker-alt mr-2"></i><?php echo $this->item->location; ?>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
				</div>

				<?php if($this->params->get('show_socialsIcon',1)) { ?>
					<?php if(!empty($this->item->social)) { ?>
							<div class="social-profile-wrapper">
								<ul class="social-profile <?php echo $this->params->get('IconStyle');  ?> list-unstyled ">
									<?php  $socials=  json_decode($this->item->social);?>
										<?php  foreach($socials as $social){?>
												<li>
														<a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
															<i class="<?php echo $social->icon?>"></i>
														</a>
												</li>
										<?php } ?>
								</ul>
							</div>
						<?php } ?> 
					<?php } ?>

				<!-- Social Profile Wrapper End -->
			  </div>
			</div>
		  </div>
		</div>
		<div class="row pb-5">
		  <div class="col-12">
				<?php if(!empty($this->item->details)) {?>
					<div class="team-single-details-text">
						<?php echo $this->item->details; ?>
					</div>
				<?php } ?>	
		  </div>
		</div>
				<?php if($this->params->get('show_skills')) { ?>
					<div class="col-12 col-sm-12 col-lg-12">
						<?php if(!empty($this->item->skills)) { ?>
								<div class="col-12 col-sm-12 col-lg-12">
									<?php  $skills=  json_decode($this->item->skills);?>
									<?php  foreach($skills as $skill){?>
										<?php if($skill->skill_rating >= 0 AND $skill->skill_rating <= 100) { ?>
												<div class="progress mb-3">
													
													<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $skill->skill_rating; ?>%" aria-valuenow="<?php echo $skill->skill_rating; ?>" aria-valuemin="0" aria-valuemax="100">
													<?php echo $skill->skill; ?> 
													<?php echo $skill->skill_rating; ?>%</div>
												</div>
										<?php } ?>
									<?php } ?>
								</div>
						<?php } ?>
					</div>
				<?php }  ?>
		</div>
	  </div>
	</div>
  </div>
</div>