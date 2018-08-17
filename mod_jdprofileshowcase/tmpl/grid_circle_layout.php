<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>
  <section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-grid-layout-view jd-grid-circle-layout">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <!-- Team Item wrapper start -->
              <?php foreach($profiles as $profile) { ?>
                  <div class="jd-team-columns col-12 col-md-6 col-lg-<?php echo  $params->get('grid_coloumns'); ?">
                    <div class="card-team jd-team-items">
                      <div class="team-mamber-image-wrapper">
                        <img src="<?php echo $profile->image;  ?>" alt="" class="card-img-top team-mamber-image">
                      </div>
                      <?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
                        <div class="card-team-body">
                          <div class="team-member-content-wrapper">
                            <?php if($params->get('display_name')) { ?>
                              <h5 class="card-img-overlayteam-member-name"><?php echo $profile->name;  ?></h5>
                            <?php } ?>
                            <?php if($params->get('display_designation')) { ?>
                              <p class="team-member-designation">
                                <small><?php echo $profile->designation;  ?></small>
                              </p>
                            <?php } ?>
                            <p class="card-img-overlayteam-member-bio"><?php echo $profile->sbio;  ?></p>
                          </div>
                        </div>
                      <?php }?>
                      <?php if($params->get('show_socialsIcon')) { ?>
                        <div class="card-team-footer social-profile-wrapper">
                          <ul class="social-profile <?php if($params->get('social_icons')=="c"){ echo $params->get('IconStyle'); } ?>">
                            <li>
                              <a href="#" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                <i class="fab fa-facebook-f"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                <i class="fab fa-linkedin-in"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                <i class="fab fa-google-plus-g"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                <i class="fab fa-instagram"></i>
                              </a>
                            </li>
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
    </div>
  </section>
