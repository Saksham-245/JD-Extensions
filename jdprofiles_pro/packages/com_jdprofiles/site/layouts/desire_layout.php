<?php 
$items = $displayData->get('items');
$params = $displayData->get('params');
$pagination = $displayData->get('pagination');
?>
<div class="container py-5 test">
	<div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-hover-layout">
		<div class="row">
			<div class="col-12">
				<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
					<div class="row jd-team-carousel-hover">
						<?php foreach ($items as $i => $item) : ?>

						<!-- Team Item wrapper start -->
						<div class="col-12 col-md-6 col-lg-3 d-flex mb-4">
							<div class="our-team border">
								<div class="pic">
									<img src="<?php echo  $item->image;?>" alt="<?php echo  $item->name;?>" class="team-mamber-image">
									<?php if($params->get('show_socialsIcon')) { ?>
									<?php if(!empty($item->social)) {?>
									<ul class="social <?php echo $params->get('IconStyle');?>">
										<?php  $socials=  json_decode($item->social);?>
										<?php  foreach($socials as $social){?>
										<li>
											<a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>">
												<i class="<?php echo $social->icon?>"></i>
											</a>
										</li>
										<?php } ?>
									</ul>
									<?php } ?>
									<?php }  ?>
								</div>
								<div class="team-content">
									<?php if($params->get('display_name')) { ?>
									<h5 class="team-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>">
											<?php echo  $item->name;?></a></h5>
									<?php }  ?>
									<?php if($params->get('display_designation')) { ?>
									<span class="post">
										<?php echo  $item->designation;?></span>
									<?php } ?>
								</div>
							</div>
						</div>
						<!-- Team Item wrapper end -->
						<?php endforeach; ?>
					</div>
					<?php echo $pagination->getListFooter(); ?>
					<input type="hidden" name="task" value="" />
					<input type="hidden" name="boxchecked" value="0" />
					<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
					<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>
		</div>
	</div>
	<!-- End Jd Team Showcase wrapper -->
</div>