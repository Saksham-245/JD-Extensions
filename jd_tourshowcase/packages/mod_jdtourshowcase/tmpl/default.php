<?php
defined('_JEXEC') or die;
// Licensed under the GPL v3  
echo "<pre>";

?>
<div class="row">
	<?php foreach ($tours as $i => $item) :  ?>
      <div class="col-lg-4 d-flex">
         <div class="card">
         <a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>">	<img src="<?php echo $item->tour_image; ?>" alt="top-destinations" class="card-img-top img-fluid"></a>
            <div class="card-body text-center">
                  <a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>">
                     <h5 class="card-title">
                        <?php echo ($item->title); ?>
                     </h5>
                  </a>
                  <p class="card-text"><b><?php echo $item->price; ?></b> <del>$2600</del><br>
                     <?php if(!empty($item->price_postfix)) { ?>
                        <span class="text-muted"><?php echo $item->price_postfix; ?></span>
                     <?php } ?>
                  </p>
                  <p class="card-text">
                        <?php $features = json_decode($item->feature); foreach($features as $feature){ ?>
                           <i class="<?php echo $feature->icon_class; ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $feature->tool_tip; ?>" aria-hidden="true"></i>
                        <?php } ?>
                  </p>		
                  <hr>
                  <a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>" class="top-destinations-see-more">
                     <b>See More <i class="fa fa-angle-right" aria-hidden="true"></i></b>
                  </a>
            </div>
         </div>
      </div>
   <?php endforeach; ?>
</div>  