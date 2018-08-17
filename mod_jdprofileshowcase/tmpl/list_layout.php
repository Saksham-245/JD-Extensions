<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>
<section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-list-layout-view jd-list-simple-layout">
        <div class="row">
          <div class="col-12">
            <div class="row">
            <?php foreach($profiles as $profile) { ?>
              <!-- Team Item wrapper start -->
              <div class="jd-team-columns col-12">
                <div class="card-team jd-team-items">
                  <div class="team-mamber-image-wrapper">
                    <img src="<?php echo $profile->image; ?>" alt="<?php  echo $profile->name; ?>" class="team-mamber-image">
                  </div>
                  <?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
                    <div class="card-team-body">
                      <div class="team-member-content-wrapper">
                        <?php if($params->get('display_name')) { ?>
                          <h5 class="team-member-name"><?php  echo $profile->name; ?></h5>
                        <?php } ?>
                        <?php if($params->get('display_designation')) { ?>
                          <p class="team-member-designation">
                            <small><?php  echo $profile->designation; ?></small>
                          </p>
                        <?php } ?>
                        <p class="team-member-bio"><?php echo $profile->sbio;  ?></p>
                        <ul class="list-unstyled contact-info">
                          <?php if($params->get('show_Contact')) { ?>
                            <li>
                              <i class="fas fa-phone"></i>  <?php  echo $profile->phone; ?></li>
                            <li>
                          <?php } ?>
                            <i class="fas fa-envelope"></i> <?php  echo $profile->email; ?></li>
                          <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <?php  echo $profile->location; ?></li>
                        </ul>
                      </div>
                    <?php } ?> 
                    <?php if($params->get('show_socialsIcon')) { ?>
                        <div class="social-profile-wrapper">
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
                    <!-- Social Profile Wrapper End -->
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


<script>
(function ($) {
    // Slick Js start
    var intislickSlider = function () {
        $('.jd-team-carousel, .jd-team-carousel-hover').slick({
            arrows: true,
            dots: true,
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
