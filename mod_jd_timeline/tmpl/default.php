<?php
// No direct access
defined('_JEXEC') or die;
$items_timelines = $params->get('timeline', []);
$title = $params->get('title');
$subtitle = $params->get('subtitle');
?>
<div class="container">
	<div class="row pt-7">
		<div class="col-12 text-center">
			<h3 class="title-heading"><?php echo  $title; ?></h3>
			<p><?php echo  $subtitle; ?></p>
		</div>
		<div class="col-12 pt-5">
			<ul class="timeline">
				<?php $i=1; foreach($items_timelines as $items_timeline) {?>
					<li class="<?php echo ($i%2==0) ? 'timeline-inverted'  : ''?>">
						<div class="timeline-badge">
							<a><i class="fas fa-circle text-primary" id=""></i></a>
						</div>
						<?php if(!empty($items_timeline->details) or !empty($items_timeline->title) or !empty($items_timeline->description)) { ?>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<?php if(!empty($items_timeline->details)) { ?>
										<p class="text-primary m-0"><strong><?php echo $items_timeline->details; ?></strong></p>
									<?php } ?>
									<?php if(!empty($items_timeline->title)) { ?>
										<h4 class="title-heading-two"><?php echo $items_timeline->title; ?></h4>
									<?php } ?>
								</div>
								<?php if(!empty($items_timeline->description)) { ?>
									<div class="timeline-body">
											<?php echo $items_timeline->description; ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</li>
				<?php $i++; }?>	
				<li class="clearfix float-none"></li>
			</ul>
		</div>
	</div>
</div>
