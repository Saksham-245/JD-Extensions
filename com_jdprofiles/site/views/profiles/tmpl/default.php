<?php
   /**
    * @version    CVS: 1.0.0
    * @package    Com_JdProfiles
    * @author     Team Joomdev <info@joomdev.com>
    * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
    * @license    GNU General Public License version 2 or later; see LICENSE.txt
    */
   // No direct access
   defined('_JEXEC') or die;
   
   JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
   JHtml::_('bootstrap.tooltip');
   JHtml::_('behavior.multiselect');
   JHtml::_('formbehavior.chosen', 'select');
   
   $user       = JFactory::getUser();
   $userId     = $user->get('id');
   $listOrder  = $this->state->get('list.ordering');
   $listDirn   = $this->state->get('list.direction');
   $canCreate  = $user->authorise('core.create', 'com_jditems') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'itemform.xml');
   $canEdit    = $user->authorise('core.edit', 'com_jditems') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'itemform.xml');
   $canCheckin = $user->authorise('core.manage', 'com_jditems');
   $canChange  = $user->authorise('core.edit.state', 'com_jditems');
   $canDelete  = $user->authorise('core.delete', 'com_jditems');
   $this->params->get('layout');
   ?>
   <!-- carousel-hover-layout start -->
<?php if($this->params->get('layout') == 'carsousel') {?>
   <section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-simple-layout">
        <div class="row">
          <div class="col-12">
            <div class="row jd-team-carousel">
              <!-- Team Item wrapper start -->
              <?php foreach($this->items as $i => $item) { ?>
                  <div class="jd-team-columns col">
                    <div class="card-team jd-team-items">
                      <img src="<?php echo $item->image;  ?>" alt="" class="card-img-top team-mamber-image">
                      <?php if($this->params->get('display_name') or $this->params->get('display_designation') ) { ?>
                        <div class="card-team-body">
                          <div class="team-member-content-wrapper">
                            <?php if($this->params->get('display_name')) { ?>
                              <h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jditems&view=item&id='.(int) $item->id); ?>"><?php  echo $item->name; ?></a></h5>
                            <?php } ?>
                            <?php if($this->params->get('display_designation')) { ?>
                              <?php if(!empty($item->designation)) { ?>  
                                <p class="team-member-designation">
                                  <small><?php echo $item->designation;  ?></small>
                                </p>
                              <?php } ?>
                            <?php } ?>
                            <?php if(!empty($item->sbio)) { ?>    
                              <p class="card-img-overlayteam-member-bio"><?php echo $item->sbio;  ?></p>
                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                      <?php if($this->params->get('show_socialsIcon')) { ?>
                        <div class="card-team-footer social-item-wrapper">
                          <ul class="social-item  <?php if($this->params->get('social_icons')=="c"){ echo $this->params->get('IconStyle'); } ?>">
                            <?php if(!empty($item->social)) { ?>
                              <?php  $socials=  json_decode($item->social);?>
                                <?php  foreach($socials as $social){?>
                                    <li>
                                        <a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
                                          <i class="<?php echo $social->icon?>"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>      
                          </ul>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
              <?php  } ?>
              <!-- Team Item wrapper end -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Jd Team Showcase wrapper -->
    </div>
  </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
(function ($) {
    // Slick Js start
    var intislickSlider = function () {
        $('.jd-team-carousel, .jd-team-carousel-hover').slick({
            arrows: <?php if($this->params->get('DisplayArrow')){ echo "true"; }else{ echo 'false'; } ?>,
            dots: <?php if($this->params->get('DisplayBullit')){ echo "true"; }else{ echo 'false'; } ?>,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    }
    // end slick slider
    // Events
    var docReady = function () {
        intislickSlider();
    };
    $(docReady);
})(jQuery);
  </script>
<?php }?>

<!-- carousel-hover-layout end -->
<?php if($this->params->get('layout') == 'table') {?>
 <!-- Table Layout Start -->
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
   name="adminForm" id="adminForm">
   <?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
   <table class="table table-striped" id="itemList">
      <tbody>
	  <?php foreach ($this->items as $i => $item) : ?>
	  <?php $canEdit = $user->authorise('core.edit', 'com_jditems'); ?>
         <tr>
			<th scope="team-mamber-image-wrapper">
				<img src="<?php echo $item->image; ?>" alt="" width="7%">
         </th>
         <?php if($this->params->get('display_name')) { ?>
            <td class="team-member-name">
               <span><a href="<?php echo JRoute::_('index.php?option=com_jditems&view=item&id='.(int) $item->id); ?>"><?php echo $item->name; ?></a></span>
            </td>
         <?php } ?>

         <?php if($this->params->get('display_designation')) { ?>
			   <td class="team-member-designation"><i class="fas fa-stamp"></i><?php echo $item->designation; ?></td>
         <?php } ?>
         <?php if($this->params->get('show_Contact')) { ?>
            <td class="team-member-address"><i class="fas fa-envelope"></i> <?php echo $item->email; ?></td>
            <td class="team-member-email"><i class="fas fa-phone"></i> <?php echo $item->phone; ?></td>
         <?php } ?>
        </tr>
		<?php endforeach; ?>
      <tbody>
      </tbody>
   </table>

   <?php echo $this->pagination->getListFooter(); ?>

   <input type="hidden" name="task" value=""/>
   <input type="hidden" name="boxchecked" value="0"/>
   <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
   <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
   <?php echo JHtml::_('form.token'); ?>
</form>
 <!-- Table Layout Start -->
<?php } ?>


<?php if($this->params->get('layout') == 'list') {?>
 <!-- list_layout Start -->
 <section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-list-layout-view jd-list-simple-layout">
        <div class="row">
          <div class="col-12">
            <div class="row">
            <?php foreach($this->items as $i => $item) { ?>
              <!-- Team Item wrapper start -->
              <div class="jd-team-columns col-12">
                <div class="card-team jd-team-items">
                  <div class="team-mamber-image-wrapper">
                    <img src="<?php echo $item->image; ?>" alt="<?php  echo $item->name; ?>" class="team-mamber-image">
                  </div>
                  <?php if($this->params->get('display_name') or $this->params->get('display_designation') ) { ?>
                    <div class="card-team-body">
                      <div class="team-member-content-wrapper">
                        <?php if($this->params->get('display_name')) { ?>
                          <h5 class="team-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jditems&view=item&id='.(int) $item->id); ?>"><?php  echo $item->name; ?></a></h5>
                        <?php } ?>
                        <?php if($this->params->get('display_designation')) { ?>
                          <?php if(!empty($item->designation)) { ?>
                            <p class="team-member-designation">
                              <small><?php  echo $item->designation; ?></small>
                            </p>
                          <?php } ?>
                        <?php } ?>
                        <?php if(!empty($item->sbio)) { ?>
                          <p class="team-member-bio"><?php echo $item->sbio;  ?></p>
                        <?php } ?>    
                        <ul class="list-unstyled contact-info">
                          <?php if($this->params->get('show_Contact')) { ?>
                            <li>
                              <i class="fas fa-phone"></i>  <?php  echo $item->phone; ?></li>
                            <li>
                          <?php } ?>
                          <?php if(!empty($item->email)) { ?>
                            <i class="fas fa-envelope"></i> <?php  echo $item->email; ?></li>
                          <?php } ?>
                          <?php if(!empty($item->location)) { ?>
                          <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <?php  echo $item->location; ?></li>
                          <?php } ?>    
                        </ul>
                      </div>
                    <?php } ?> 
                    <?php if($this->params->get('show_socialsIcon')) { ?>
                        <?php if(!empty($item->social)) { ?>
                            <div class="social-item-wrapper">
                              <ul class="social-item <?php echo $this->params->get('IconStyle');  ?>">
                                <?php  $socials=  json_decode($item->social);?>
                                  <?php  foreach($socials as $social){?>
                                      <li>
                                          <a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
                                            <i class="<?php echo $social->icon?>"></i>
                                          </a>
                                      </li>
                                  <?php } ?>
                              </ul>
                            </div>
                          <?php } ?> 
                        <?php } ?>
                    <!-- Social item Wrapper End -->
                  </div>
                </div>
              </div>
            <?php } ?>
              <!-- Team Item wrapper end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- list_layout end -->
   <?php } ?>

<?php if($this->params->get('layout') == 'grid') {?>
   <!-- grid_layout Start -->
   <section>
   <div class="container py-5">
   <div class="jd-team-showcase-wrapper jd-grid-layout-view jd-grid-simple-layout">
      <div class="row">
         <div class="col-12">
         <div class="row">
            <!-- Team Item wrapper start -->
            <?php foreach($this->items as $i => $item) { ?>
               <div class="jd-team-columns col-12 col-md-6 col-lg-4">
               <div class="card-team jd-team-items">
                  <?php if(!empty($item->image)) { ?>
                     <img src="<?php echo $item->image;  ?>" alt="<?php echo $item->name;  ?>" class="card-img-top team-mamber-image">
                  <?php }?>  
                  <?php if($this->params->get('display_name') or $this->params->get('display_designation') ) { ?>
                     <div class="card-team-body">
                     <div class="team-member-content-wrapper">
                           <?php if($this->params->get('display_name')) { ?>
                           <h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jditems&view=item&id='.(int) $item->id); ?>"><?php  echo $item->name; ?></a></h5>
                           <?php } ?>
                           <?php if($this->params->get('display_designation')) { ?>
                           <p class="team-member-designation">
                              <small><?php echo $item->designation;  ?></small>
                           </p>
                           <?php } ?>
                           <?php if(!empty($item->sbio)) { ?>
                              <p class="card-img-overlayteam-member-bio"><?php echo $item->sbio;  ?></p>
                           <?php }?>
                     </div>
                     </div>
                  <?php }?>
                  <?php if($this->params->get('show_socialsIcon')) { ?>
                     <?php if(!empty($item->social)) { ?>
                           <div class="card-team-footer social-item-wrapper">
                           <ul class="social-item <?php echo $this->params->get('IconStyle');  ?>">
                              <?php  $socials=  json_decode($item->social);?>
                                 <?php  foreach($socials as $social){?>
                                    <li>
                                       <a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
                                          <i class="<?php echo $social->icon?>"></i>
                                       </a>
                                    </li>
                                 <?php } ?>
                           </ul>
                           </div>
                        <?php } ?> 
                     <?php } ?>
                  </div>
               </div>
            <?php  } ?>
            <!-- Team Item wrapper end -->
         </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- grid_layout end -->
<?php } ?>

<?php if($this->params->get('layout') == 'grid_circle') {?>
   <section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-grid-layout-view jd-grid-circle-layout">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <!-- Team Item wrapper start -->
              <?php foreach($this->items as $i => $item) { ?>
                  <div class="jd-team-columns col-12 col-md-6 col-lg-<?php echo  $this->params->get('grid_coloumns'); ?>">
                    <div class="card-team jd-team-items">
                      <div class="team-mamber-image-wrapper">
                        <img src="<?php echo $item->image;  ?>" alt="" class="card-img-top team-mamber-image">
                      </div>
                      <?php if($this->params->get('display_name') or $this->params->get('display_designation') ) { ?>
                        <div class="card-team-body">
                          <div class="team-member-content-wrapper">
                            <?php if($this->params->get('display_name')) { ?>
                              <h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jditems&view=item&id='.(int) $item->id); ?>"><?php  echo $item->name; ?></a></h5>
                            <?php } ?>
                            <?php if($this->params->get('display_designation')) { ?>
                              <?php if(!empty($item->designation)) { ?>  
                                <p class="team-member-designation">
                                  <small><?php echo $item->designation;  ?></small>
                                </p>
                              <?php } ?>
                            <?php } ?>
                            <?php if(!empty($item->sbio)) { ?>    
                              <p class="card-img-overlayteam-member-bio"><?php echo $item->sbio;  ?></p>
                            <?php } ?>
                          </div>
                        </div>
                      <?php }?>
                      <?php if($this->params->get('show_socialsIcon')) { ?>
                        <?php if(!empty($item->social)) { ?>
                            <div class="card-team-footer social-item-wrapper">
                              <ul class="social-item <?php echo $this->params->get('IconStyle'); ?>">
                                <?php  $socials=  json_decode($item->social);?>
                                  <?php  foreach($socials as $social){?>
                                      <li>
                                          <a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
                                            <i class="<?php echo $social->icon?>"></i>
                                          </a>
                                      </li>
                                  <?php } ?>
                              </ul>
                            </div>
                          <?php } ?> 
                        <?php } ?>
                    </div>
                  </div>
              <?php  } ?>
              <!-- Team Item wrapper end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php }  ?>

<?php if($this->params->get('layout') == 'desire') {?>
   <section>
    <div class="container py-5 test">
      <div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-hover-layout">
        <div class="row">
          <div class="col-12">
          <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
   name="adminForm" id="adminForm">
            <div class="row jd-team-carousel-hover">
            <?php foreach ($this->items as $i => $item) : ?>
            
                <!-- Team Item wrapper start -->
					<div class="col-12 col-md-6 col-lg-3 d-flex mb-4">
						<div class="our-team border">
							<div class="pic">
                <img src="<?php echo  $item->image;?>" alt="<?php echo  $item->name;?>" class="team-mamber-image">
                <?php if($this->params->get('show_socialsIcon')) { ?>
                  <?php if(!empty($item->social)) {?>
                    <ul class="social <?php echo $this->params->get('IconStyle');?>">
                      <?php  $socials=  json_decode($item->social);?>
                      <?php  foreach($socials as $social){?>
                        <li>
                          <a href="<?php echo $social->link?>" target="<?php if($this->params->get('new_tab')){echo '1'; } ?>" >
                          <i class="<?php echo $social->icon?>"></i>
                          </a>
                        </li>
                      <?php } ?>       
                      </ul>
                    <?php } ?>      
                  <?php }  ?>
							</div>
							<div class="team-content">
                <?php if($this->params->get('display_name')) { ?>
                    <h5 class="team-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>"><?php echo  $item->name;?></a></h5>
                <?php }  ?>
                <?php if($this->params->get('display_designation')) { ?>
                  <span class="post"><?php echo  $item->designation;?></span>
                <?php } ?>
							</div>
						</div>
					</div>
                <!-- Team Item wrapper end -->
                <?php endforeach; ?>
            </div>
            <?php echo $this->pagination->getListFooter(); ?>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>
          </div>
        </div>
      </div>
      <!-- End Jd Team Showcase wrapper -->
    </div>
  </section>

<?php } ?>
