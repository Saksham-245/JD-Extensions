<?php
defined('_JEXEC') or die;
$pricingtables = $params->get('pricingtables', []);
?>
<div class="row">
   <?php foreach ($pricingtables as $pricingtable) { ?>
      <div class="col-12 col-lg-4 d-lg-flex mb-5 mb-lg-0">
         <div class="panel panel-primary border">
            <div class="panel-header-img">
               <img class="mb-0 img-fluid" alt="<?php echo $pricingtable->title; ?>" src="<?php echo JURI::root() . $pricingtable->thumbnail; ?>">
            </div>
            <div class="panel-body p-4">
               <div class="the-price d-flex justify-content-center">
                  <div class="button rounded-circle text-center">
                     <span class="subscript"><?php echo $pricingtable->pricing; ?>
                        <br>
                        <small><?php echo $pricingtable->unit; ?></small>
                     </span>
                  </div>
               </div>
               <div class="description-box text-center mt-5">
                  <div class="description header">
                     <h4 class="mt-0 mb-4"><?php echo $pricingtable->title; ?></h4>
                  </div>
                  <div class="description-body">
                     <?php foreach (explode(',', $pricingtable->details) as $detail) { ?>
                        <p class="card-text"><?php echo $detail; ?></p>
                     <?php } ?>
                  </div>
               </div>
               <div class="panel-footer d-flex justify-content-center mt-5">
                  <a class="btn btn-secondary btn-lg rounded-0" data-ribbon="" href="<?php echo $pricingtable->link; ?>" role="button"><?php echo $pricingtable->link_text; ?></a>
               </div>
            </div>
         </div>
      </div>
   <?php } ?>
</div>