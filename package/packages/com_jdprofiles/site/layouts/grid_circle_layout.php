<?php  echo  'I am here grid_circle_layout';
//print_r($displayData); 
$items = $displayData->get('items');
$params = $displayData->get('params');

?>
<section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-grid-layout-view jd-grid-circle-layout">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <!-- Team Item wrapper start -->
              <?php foreach($items as $i => $item) { ?>
                  <div class="jd-team-columns col-12 col-md-6 col-lg-<?php echo  $params->get('grid_coloumns'); ?>">
                    <div class="card-team jd-team-items">
                      <div class="team-mamber-image-wrapper">
                        <img src="<?php echo $item->image;  ?>" alt="" class="card-img-top team-mamber-image">
                      </div>
                      <?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
                        <div class="card-team-body">
                          <div class="team-member-content-wrapper">
                            <?php if($params->get('display_name')) { ?>
                              <h5 class="card-img-overlayteam-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>"><?php  echo $item->name; ?></a></h5>
                            <?php } ?>
                            <?php if($params->get('display_designation')) { ?>
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
                      <?php if($params->get('show_socialsIcon')) { ?>
                        <?php if(!empty($item->social)) { ?>
                            <div class="card-team-footer social-item-wrapper">
                              <ul class="social-item <?php echo $params->get('IconStyle'); ?>">
                                <?php  $socials=  json_decode($item->social);?>
                                  <?php  foreach($socials as $social){?>
                                      <li>
                                          <a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
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