<?php
defined('_JEXEC') or die;
$items = $params->get('items', []);
$items = (array) $items;
$active = TRUE;
?>
<style type="text/css">
   .jd-testimonial-bullets-<?php echo $module->id; ?> li{
      width: 10px;
      height: 10px;
      border-radius: 10px;
      background: #fff;
      border: 1px solid #000;
   }
   .jd-testimonial-bullets-<?php echo $module->id; ?> li.active{
      background: #000;
   }
</style>
<div id="jdTestimonialCarousel<?php echo $module->id; ?>" class="carousel slide pb-5" data-ride="carousel">
   <?php $active = true; ?>
   <div class="carousel-inner">
      <?php foreach ($items as $index => $item) { ?>
         <div class="carousel-item<?php echo $active ? ' active' : ''; ?>">
            <?php $active = false; ?>
            <div class="text-center">
               <div class="row">
                  <div class="col">
                     <img class="circle" src="<?php echo JURI::root() . $item->thumbnail; ?>" alt="<?php echo $item->author_name; ?>" />
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col">
                     <h4><?php echo $item->author_name; ?></h4>
                     <h4><small><?php echo $item->author_designation; ?></small></h4>
                     <p><?php echo $item->content; ?></p>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
   <ul class="carousel-indicators jd-testimonial-bullets-<?php echo $module->id; ?>">
      <?php
      $slideIndex = 0;
      $active = true;
      foreach ($items as $index => $item) {
         ?>
         <li title="<?php echo $item->author_name; ?>" data-target="#jdTestimonialCarousel<?php echo $module->id; ?>" data-slide-to="<?php
         echo $slideIndex;
         $slideIndex++;
         ?>" class="list-inline-item <?php
             echo $active ? 'active' : '';
             $active = false;
             ?>"></li>
          <?php } ?>
   </ul>
</div>