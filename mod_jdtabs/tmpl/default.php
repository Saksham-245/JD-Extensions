<?php
defined('_JEXEC') or die;
$items = $params->get('items', []);
$items = (array) $items;
$active = TRUE;
?>
<nav>
   <div class="nav nav-tabs" id="nav-tab-<?php echo $module->id; ?>" role="tablist">
      <?php foreach ($items as $index => $item) { ?>
         <a class="nav-item nav-link<?php
         echo $active ? ' active' : '';
         $active = FALSE;
         ?>" id="nav-<?php echo $module->id; ?>-<?php echo $index; ?>-tab" data-toggle="tab" href="#nav-<?php echo $module->id; ?>-<?php echo $index; ?>" role="tab" aria-controls="nav-<?php echo $module->id; ?>-<?php echo $index; ?>" aria-selected="true"><?php echo $item->title; ?></a>
         <?php } ?>
   </div>
</nav>
<?php $active = TRUE; ?>
<div class="tab-content" id="nav-tab<?php echo $module->id; ?>Content">
   <?php foreach ($items as $index => $item) { ?>
      <div class="tab-pane fade show<?php
      echo $active ? ' active' : '';
      $active = FALSE;
      ?>" id="nav-<?php echo $module->id; ?>-<?php echo $index; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $module->id; ?>-<?php echo $index; ?>-tab">
         <?php echo $item->content; ?>
      </div>
   <?php } ?>
</div>