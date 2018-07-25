<?php
defined('_JEXEC') or die;
$items = $params->get('items', []);
$items = (array) $items;
?>
<div class="py-6">
   <div class="row">
      <div style="max-width: 50px" class="col tab-button button-border transform-up mb-5 mb-lg-0 d-lg-flex justify-content-center d-none d-lg-block">
         <div class="nav flex-lg-column justify-content-center nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link mb-lg-2" role="button" data-slide="prev" href="#before-after-slider-<?php echo $module->id; ?>">
               <i class="fa fa-angle-up" aria-hidden="true"></i>
            </a>
            <a class="nav-link" role="button" data-slide="next" href="#before-after-slider-<?php echo $module->id; ?>">
               <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
         </div>
      </div>
      <div class="col">
         <div class="carousel slide" data-ride="carousel" id="before-after-slider-<?php echo $module->id; ?>">
            <div class="carousel-inner">
               <?php $active = true; ?>
               <?php foreach ($items as $item) { ?>
                  <div class="carousel-item<?php
                  echo $active ? ' active' : '';
                  $active = false;
                  ?>">
                     <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 mb-5 mb-md-5 mb-lg-0">
                           <h3 class="mb-4"><?php echo $item->title; ?></h3>
                           <div class="row">
                              <div class="col">
   <?php echo $item->summary; ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                           <div class="twentytwenty-container twentytwenty-container-<?php echo $module->id; ?>">
                              <img width="100%" src="<?php echo JURI::root() . $item->before_image; ?>" />
                              <img width="100%" src="<?php echo JURI::root() . $item->after_image; ?>" />
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
<?php } ?>
            </div>
         </div>
      </div>
   </div>
   <div class="row d-block d-lg-none">
      <div class="col-12 tab-button button-border transform-up mb-5 mb-lg-0 d-lg-flex justify-content-center">
         <div class="nav justify-content-center nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link mb-lg-2 mr-2" role="button" data-slide="prev" href="#before-after-slider-<?php echo $module->id; ?>">
               <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="nav-link" role="button" data-slide="next" href="#before-after-slider-<?php echo $module->id; ?>">
               <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
         </div>
      </div>
   </div>
</div>

<script>
   (function ($) {
      //Twenty Twenty
      var initBeforeAfter = function () {
         var init = function () {
            $(".twentytwenty-container-<?php echo $module->id; ?>").each(function () {
               $(this).twentytwenty({
                  default_offset_pct: 0.7
               });
            });
         };
         $('#before-after-slider-<?php echo $module->id; ?>').on('slid.bs.carousel', function (e) {
            $(window).trigger("resize.twentytwenty");
         });
         init();
      };
      // Events Function
      var docReady = function () {
         initBeforeAfter();
      };
      var winLoad = function () {

      };
      var winScroll = function () {

      };
      var winResize = function () {

      };

      // Call Events Functions	
      docReady();
      $(window).on('load', winLoad);
      $(window).on('scroll', winScroll);
      $(window).on('resize', winResize);
   })(jQuery);
</script>