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
                      <p class="team-member-designation">
					  <?php echo $this->item->designation; ?>
                      </p>
                      <p class="team-member-bio"><?php echo $this->item->sbio; ?></p>
                      <ul class="list-unstyled contact-info">
                        <li>
                          <i class="fas fa-phone"></i><?php echo $this->item->phone; ?></li>
                        <li>
                          <i class="fas fa-envelope"></i> <?php echo $this->item->email; ?></li>
                        <li>
                          <i class="fas fa-map-marker-alt"></i>
                          <?php echo $this->item->location; ?></li>
                      </ul>
                    </div>
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
                    <!-- Social Profile Wrapper End -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="team-single-details-text">
                  <p><?php echo $this->item->lbio; ?></p>
                  
                  <blockquote class="blockquote text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in
                      <cite title="Source Title">Source Title</cite>
                    </footer>
                  </blockquote>
                </div>
              </div>
            </div>
              <div class="col-12 col-sm-12 col-lg-12">
                <?php  $skills=  json_decode($this->item->skills);?>
                <?php  foreach($skills as $skill){?>
                    <div class="progress mb-3">
                    <p><?php echo $skill->skill; ?></p>
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $skill->skill_rating; ?>%" aria-valuenow="<?php echo $skill->skill_rating; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $skill->skill_rating; ?>%</div>
                    </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
