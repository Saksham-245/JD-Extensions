<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdprofiles
 * @author     Team Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;
?>

<section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper team-details-single">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-3 team-mamber-image-wrapper">
                <img src="<?php echo $this->item->image; ?>" alt="" class="img-fluid">
              </div>
              <div class="col-12 col-md-9">
                <div class="card-team jd-team-items">
                  <div class="card-team-body">
                    <div class="team-member-content-wrapper">
                      <h5 class="team-member-name"><?php echo $this->item->name; ?></h5>
                      <?php if(!empty($this->item->designation)){ ?>
                        <p class="team-member-designation">
                            <?php echo $this->item->designation; ?>
                        </p>
                      <?php }  ?>
                      <?php if(!empty($this->item->sbio)){ ?>
                        <p class="team-member-bio"><?php echo $this->item->sbio; ?></p>
                      <?php } ?>    
                      <ul class="list-unstyled contact-info">
                      <?php if(!empty($this->item->phone)){ ?>
                        <li>
                          <i class="fas fa-phone"></i><?php echo $this->item->phone; ?></li>
                        <li>
                      <?php } ?>  
                        <?php if(!empty($this->item->email)){ ?>
                          <i class="fas fa-envelope"></i> <?php echo $this->item->email; ?></li>
                        <?php } ?>  

                        <?php if(!empty($this->item->location)){ ?>
                          <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $this->item->location; ?>
                          </li>
                        <?php } ?>    
                      </ul>
                    </div>
                    <?php if(!empty($this->item->social)) { ?>
                      <div class="social-profile-wrapper">
                        <ul class="social-profile circle">
                          <?php  $socials=  json_decode($this->item->social);?>
                              <?php  foreach($socials as $social){?>
                                  <li>
                                      <a href="<?php echo $social->link?>">
                                      <i class="<?php echo $social->icon?>"></i>
                                      </a>
                                  </li>
                            <?php } ?>       
                        </ul>
                      </div>
                    <?php } ?>           
                    <!-- Social Profile Wrapper End -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="team-single-details-text">
                  <p><?php echo $this->item->details; ?></p>
                </div>
              </div>
            </div>
              <?php if(!empty($this->item->skills)) { ?>
                    <div class="col-12 col-sm-12 col-lg-12">
                      <?php  $skills=  json_decode($this->item->skills);?>
                      <?php  foreach($skills as $skill){?>
                        <?php if($skill->skill_rating >= 0 AND $skill->skill_rating <= 100) { ?>
                            <div class="progress mb-3">
                              <p><?php echo $skill->skill; ?></p>
                              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $skill->skill_rating; ?>%" aria-valuenow="<?php echo $skill->skill_rating; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $skill->skill_rating; ?>%</div>
                            </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
