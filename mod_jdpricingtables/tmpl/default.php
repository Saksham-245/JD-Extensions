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
						<h2 class=""><?php echo $pricingtable->title; ?></h2>
					<?php } ?>
					<?php if(!empty($pricingtable->subtitle))  { ?>
						<p><?php echo $pricingtable->subtitle; ?></p>
					<?php } ?>
				  </div>
				<?php } ?> 
				<?php if(!empty($pricingtable->description)){?>
				  <div class="card-body">
						<?php echo $pricingtable->description; ?>
						<ul>
							<li>Access to all templates</li>
							<li>Access to all templates</li>
							<li>Access to all templates</li>
						</ul>
				  </div>
				<?php }	 ?>
			<?php if(!empty($pricingtable->pricing) or  !empty($pricingtable->period) or !empty($pricingtable->button_text) or !empty($pricingtable->bottom_line)){?>
				  <div class="card-footer">
					  <?php if(!empty($pricingtable->pricing) and !empty($pricingtable->period) ){?>
						<div class="price" style="<?php if($pricingtable->pricingColor) {echo 'color: ' . $pricingtable->pricingColor;}?>"><?php echo $pricingtable->pricing; ?>
						  <small><?php echo $pricingtable->period; ?></small>
						</div>
					  <?php } ?>
					  
						<?php if(!empty($pricingtable->button_text)) {?>
							<a href="<?php echo ($pricingtable->button_link) ? $pricingtable->button_link : '#'  ?>" class="btn btn-block"><?php echo $pricingtable->button_text; ?></a>
						<?php } ?>
						
						<?php if(!empty($pricingtable->bottom_line)) {?>
							<p class="bottom-line">
							  <?php echo $pricingtable->bottom_line; ?>
							</p>
						<?php } ?>
				  </div>
			<?php } ?>
			</div>
		  </div>
	  <?php } ?>
	</div>
</div>