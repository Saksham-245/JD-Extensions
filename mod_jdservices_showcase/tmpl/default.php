<?php
defined('_JEXEC') or die;
$services = $params->get('services', []);
$services = modJDServicesShowcaseHelper::formatGrid($services);
$showcase_height = $params->get('showcase_height', 'auto');
?>
<div style="height: <?php echo $showcase_height; ?>" class="row jd-services-showcase mb-4">
   <?php foreach ($services as $serviceCol) { ?>
      <div class="col-12 flex-column col-lg-<?php echo 12 / count($services); ?> <?php echo count($serviceCol) > 1 ? 'pb-lg-4' : ''; ?>">
         <?php foreach ($serviceCol as $service) { ?>
            <a class="d-flex mb-4 align-items-stretch jd-services-showcase-link <?php echo count($serviceCol) > 1 ? 'h-50' : 'h-100'; ?>" href="<?php echo JRoute::_("index.php?Itemid=" . $service->link); ?>" title="<?php echo $service->title; ?>">
               <div class="card w-100 border-0 rounded-0 jdss-item" style="background-image:url(<?php echo JURI::root() . $service->thumbnail; ?>)">
                  <div class="card-body d-flex align-items-center justify-content-center">
                     <div class="jdss-item-opacity"></div>
                     <div class="jdss-item-content">
                        <div class="text-center">
                           <h5 class="text-light"><?php echo $service->title; ?></h5>
                           <h6 class="text-light"><small><?php echo $service->subtitle; ?></small></h6>
                        </div>
                     </div>
                     <div class="align-items-center justify-content-center jdss-item-overlay bg-light text-primary">
                        <div class="text-center">
                           <h5><?php echo $service->title; ?></h5>
                           <h6><small><?php echo $service->subtitle; ?></small></h6>
                           <p><?php echo $service->description; ?></p></p>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         <?php } ?>
      </div>
   <?php } ?>
</div>