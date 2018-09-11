<?php
defined('_JEXEC') or die;
$pricingtables = $params->get('pricingtables', []);
$itemsInRow = $params->get('itemsInRow');
?>

<div class="container">
	<div class="row">
	  <?php foreach ($pricingtables as $pricingtable) { ?>
		  <div class="col-12 col-md-6 col-lg-<?php echo $itemsInRow;  ?> pricing-card <?php if($pricingtable->hightlight) {echo 'hightlight';}?>">
			<div class="card card-normal">
				<?php if(!empty($pricingtable->title) or !empty($pricingtable->subtitle))  { ?>
				  <div class="card-header <?php if(!$pricingtable->headerBacground=="color") {echo 'bg-primary'; } ?>" style="<?php if($pricingtable->headerBacground=="color") {echo 'background: ' . $pricingtable->headerBacground_color;} elseif($pricingtable->headerBacground=="media"){ echo 'background: url('.$pricingtable->headerBacground_upload.') no-repeat;
background-size: cover;';}?>">
					<?php if(!empty($pricingtable->title))  { ?>
						<h3 class=""><?php echo $pricingtable->title; ?></h3>
					<?php } ?>
					<?php if(!empty($pricingtable->subtitle))  { ?>
						<p><?php echo $pricingtable->subtitle; ?></p>
					<?php } ?>
				  </div>
				<?php } ?> 
				<?php if(!empty($pricingtable->description)){?>
				  <div class="card-body">
						<?php echo $pricingtable->description; ?>
				  </div>
				<?php }	 ?>
			<?php if(!empty($pricingtable->pricing) or  !empty($pricingtable->period) or !empty($pricingtable->button_text) or !empty($pricingtable->bottom_line)){?>
				  <div class="card-footer">
					  <?php if(!empty($pricingtable->pricing) and !empty($pricingtable->period) ){?>
						<h3 class="mb-3" style="<?php if($pricingtable->pricingColor) {echo 'color: ' . $pricingtable->pricingColor;}?>"><?php echo $pricingtable->pricing; ?>
						  <small><?php echo $pricingtable->period; ?></small>
						</h3>
					  <?php } ?>
					  
						<?php if(!empty($pricingtable->button_text)) {?>
							<a href="<?php echo ($pricingtable->button_link) ? $pricingtable->button_link : '#'  ?>" class="btn btn-outline-primary btn-block"><?php echo $pricingtable->button_text; ?></a>
						<?php } ?>
						
						<?php if(!empty($pricingtable->bottom_line)) {?>
							<p>
							  <small class=""><?php echo $pricingtable->bottom_line; ?></small>
							</p>
						<?php } ?>
				  </div>
			<?php } ?>
			</div>
		  </div>
	  <?php } ?>
	</div>
</div>