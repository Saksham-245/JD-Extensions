<?php
defined('_JEXEC') or die;
$items = $params->get('items', []);
$items = (array) $items;
$active = TRUE;
?>
<ul id="pills-tab" class="nav nav-pills my-5" role="tablist">
  <?php foreach ($items as $index => $item) { ?>
	  <li class="nav-item" role="tablist">
			 <a class="nav-item nav-link<?php
				 echo $active ? ' active' : '';
				 $active = FALSE;
				 ?>" id="nav-tab-<?php echo $module->id; ?>" data-toggle="tab" href="#nav-<?php echo $module->id; ?>-<?php echo $index; ?>" role="tab" aria-controls="nav-<?php echo $module->id; ?>-<?php echo $index; ?>" aria-selected="true">
				 
				<?php  if(!empty($item->thumbnail)){ ?>
					 <img class="mx-auto d-block" src="<?php echo $item->thumbnail; ?>" alt="memorable">
				 <?php } ?>
				 <?php  if(!empty($item->title)){ ?>
					<?php echo $item->title; ?>
				 <?php  }  ?>
			 </a>
		 </li>
	 <?php } ?>
</ul>
<?php $active = TRUE; ?>
<div class="tab-content" id="nav-tab-<?php echo $module->id; ?>">
   <?php foreach ($items as $index => $item) { ?>
      <div class="tab-pane fade show<?php
      echo $active ? ' active' : '';
      $active = FALSE;
      ?>" id="nav-<?php echo $module->id; ?>-<?php echo $index; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $module->id; ?>-<?php echo $index; ?>-tab">
         <?php echo $item->content; ?>
      </div>
   <?php } ?>
</div>