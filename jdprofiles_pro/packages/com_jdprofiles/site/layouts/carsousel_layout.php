<?php 
$items = $displayData->get('items');
$params = $displayData->get('params');
?>
<div class="container py-5">
	<div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-simple-layout">
		<div class="row">
			<div class="col-12">
				<div class="row jd-team-carousel">
					<!-- Team Item wrapper start -->
					<?php foreach($items as $i => $item) { ?>
					<div class="jd-team-columns col">
						<div class="card-team jd-team-items">
							<img src="<?php echo $item->image; ?>" alt="<?php  echo $item->name; ?>" class="card-img-top team-mamber-image">
							<?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
							<div class="card-team-body">
								<div class="team-member-content-wrapper">
									<?php if($params->get('display_name')) { ?>
									<h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>">
											<?php  echo $item->name; ?></a></h5>
									<?php } ?>
									<?php if($params->get('display_designation')) { ?>
									<?php if(!empty($item->designation)) { ?>
									<p class="team-member-designation">
										<small>
											<?php echo $item->designation; ?></small>
									</p>
									<?php } ?>
									<?php } ?>
									<?php if(!empty($item->sbio)) { ?>
									<p class="card-img-overlayteam-member-bio">
										<?php echo $item->sbio; ?>
									</p>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
							<?php if($params->get('show_socialsIcon')) { ?>
							<div class="card-team-footer social-item-wrapper">
								<ul class="social-item  <?php if($params->get('social_icons')==" c"){ echo $params->get('IconStyle');
									} ?>">
									<?php if(!empty($item->social)) { ?>
									<?php  $socials=  json_decode($item->social);?>
									<?php  foreach($socials as $social){?>
									<li>
										<a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>">
											<i class="<?php echo $social->icon?>"></i>
										</a>
									</li>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php  } ?>
					<!-- Team Item wrapper end -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Jd Team Showcase wrapper -->
</div>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	(function ($) {
		// Slick Js start
		var intislickSlider = function () {
			$('.jd-team-carousel, .jd-team-carousel-hover').slick({
				arrows: <?php if($params->get('DisplayArrow')){ echo "true"; }else{ echo 'false'; } ?>,
				dots: <?php if($params->get('DisplayBullit')){ echo "true"; }else{ echo 'false'; } ?>,
				infinite: true,
				speed: 300,
				slidesToShow: 4,
				adaptiveHeight: true,
				responsive: [{
						breakpoint: 1200,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							arrows: false
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false
						}
					}
				]
			});
		}
		// end slick slider
		// Events
		var docReady = function () {
			intislickSlider();
		};
		$(docReady);
	})(jQuery);
</script>