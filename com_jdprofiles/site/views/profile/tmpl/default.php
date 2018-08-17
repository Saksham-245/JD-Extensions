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
                        <li>
                          <a href="#">
                            <i class="fab fa-facebook-f"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-instagram"></i>
                          </a>
                        </li>
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
            <div class="row team-skill-details text-center">
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="team-counter">
                  <i class="fas fa-code fa-3x"></i>
                  <h2 class="team-count-number">700</h2>
                  <p class="team-count-text">Our Customer</p>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="team-counter">
                  <i class="fas fa-smile-wink fa-3x"></i>
                  <h2 class="team-count-number">600</h2>
                  <p class="team-count-text">Happy Clients</p>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="team-counter">
                  <i class="fas fa-project-diagram fa-3x"></i>
                  <h2 class="team-count-number">500</h2>
                  <p class="team-count-text">Project Complete</p>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="team-counter">
                  <i class="fas fa-coffee fa-3x"></i>
                  <h2 class="team-count-number">159</h2>
                  <p class="team-count-text">Coffee With Clients</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
