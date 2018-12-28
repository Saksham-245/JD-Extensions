<?php
defined('_JEXEC') or die;
$services = $params->get('services', []);
 
$LinkOn = $params->get('LinkOn');
$showReadMore = $params->get('showReadMore');
$showReadMoreText = $params->get('showReadMoreText');
 

?>
<div class="jd-services">
	<div class="row">
		<?php foreach ($services as $service) {  ?>
			<div class="col-lg-4">
				<?php if($service->switch=="2"){?>
					<?php if($LinkOn =="fullBox") { ?> <a href="<?php echo $url = JRoute::_('index.php?Itemid=' . $service->link); ?>"><?php } ?>
						<div class="features-box-icon-wrapper">	

							<?php if(!empty ($service->title) or !empty($service->description)){ ?>
								<div class="features-box-content">
									<?php if(!empty($service->title)){ ?>
										<h4 class="title">
											<?php if($LinkOn    =="title" or $LinkOn  =="titleAndMedia") { ?>
												<a href="<?php echo $url = JRoute::_('index.php?Itemid=' . $service->link); ?>">
											<?php } ?>
													<?php echo $service->title; ?>
											<?php if($LinkOn    =="title" or $LinkOn  =="titleAndMedia") { ?>
												</a>
											<?php } ?> 
										</h4>
									<?php } ?>
									<?php if(!empty($service->title)){ ?>
										<p><?php echo $service->subtitle ?></p>
									<?php } ?>
									<?php if(!empty($service->description)){ ?>
										<p class="short-description"><?php echo $service->description; ?></p>
									<?php } ?>
									<?php if(($showReadMore)){ ?>
										<?php if(!empty($showReadMoreText)){ ?>
											<p class="mb-0"><?php echo $showReadMoreText; ?></p>
										<?php } ?>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php if($LinkOn  =="fullBox") { ?></a> <?php } ?> 
				</div>
			<?php } ?>

			<?php if($service->switch=="1"){?>
					<div class="our-popular-services mb-4">
						<div class="row">
							<?php foreach ($services as $service) {  $items = modJDServicesShowcaseHelper::get_post($service->article_id,'DESC','id'); $images = json_decode($items['images']); // print_r($images);?>
									
									<div class="booking-section booking-section-hotel card mb-4">
										<div class="card-img-top card-img-container">
										<img src="<?php echo $images->image_intro; ?>" alt="<?php echo $images->image_fulltext_alt; ?>" class="img-fluid">
										<div class="booking-section-overlay">
												<a href="#" class="booking-hover-icon">
													<img src="images/hover-booking-icon.png" alt="">
												</a>
										</div>
										</div>
										<div class="fbs-content card-body text-center">
												<h5 class="card-title text-center"><?php echo $items['title']; ?></h5>
												<p class="card-text text-center"><?php echo $items['intro']; ?></p>
												<a href="#" class="booking-section-see-more"><b>See More <i class="fa fa-angle-right" aria-hidden="true"></i></b></a>
										</div>
									</div>
									
								<?php } ?>	
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
		<?php } ?>




		
    