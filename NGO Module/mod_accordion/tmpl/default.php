<?php
// No direct access
defined('_JEXEC') or die;
$items_accordions = $params->get('items_accordion', []);
?>
<div class="jd-accordion accordion mt-5" id="accordionExample">
<?php $i=1; foreach($items_accordions as $items_accordion) { ?>
  <div class="accordion-box">
    <div class="accordion-header" id="headingOne">
      <h4 class="heading-title-two mb-0">
        <button class="btn btn-link <?php echo ($i != 1) ? 'collapsed' : ''?>" type="button" data-toggle="collapse" data-target="#One<?php echo $module->id.$i;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo  $items_accordion->accordion_panel_title;?>
        </button>
      </h4>
    </div>

	<?php if(!empty($items_accordion->accordion_panel_description)) {?>	
		<div id="One<?php echo $module->id.$i;?>" class="collapse <?php echo ($i==1) ? 'show' : ''?>" aria-labelledby="headingOne" data-parent="#accordionExample">
    <?php if(!empty($items_accordion->accordion_panel_description)) {?> 
      <div class="accordion-body">
			 <?php echo  $items_accordion->accordion_panel_description;?>
		  </div>
    <?php } ?>  
		</div>
	<?php } ?>  
  </div>
	
<?php $i++; } ?>
