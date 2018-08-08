<?php
// No direct access
defined('_JEXEC') or die;
$skillsets = $params->get('skillsets', []); 
$numberPosition = $params->get('numberPosition','above'); 
$symbolPosition = $params->get('symbolPosition','default'); 
$numberColor = $params->get('numberColor',''); 
$titleColor = $params->get('titleColor',''); 
$symbolColor = $params->get('symbolColor',''); 
$symbolSize = $params->get('symbolSize',20); 
$titleSize = $params->get('titleSize',20); 
$numberSize = $params->get('numberSize',20); 
$customColors = $params->get('customColors'); 
$customSize = $params->get('customSize');

?>
<div class="row counter-sub-container bg-white rounded shadow-lg py-3">
    <?php foreach($skillsets as $skillset) : ?>
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="counter-wrapper d-lg-flex justify-content-lg-center align-items-lg-center p-3 text-center">
                <div class="counter-icon d-lg-flex align-items-lg-center text-primary pt-lg-2 pr-lg-3 mb-2 mb-lg-0">
                    <?php if(!empty($skillset->skillset_icon_icon)) { ?>
						<i class="<?php  echo $skillset->skillset_icon_icon; ?>"></i>
					<?php }?> 
                </div>
				<?php if(!empty($skillset->skillset_title) or !empty($skillset->skillset_number)) { ?>
					<div class="counter-text-container text-center text-lg-left">
						
						<?php if($numberPosition=='above'){ ?>
							<?php if(!empty($skillset->skillset_number)) { ?>
								<p class="counter-number text-primary d-flex justify-content-center justify-content-lg-start">
									<span class="count"><?php echo $skillset->skillset_number; ?></span>
									<?php 
										if(($skillset->skillset_enable_symbol)) { ?>
											<span><<?php if($symbolPosition == 'sub') { echo 'sub';} elseif($symbolPosition == 'sup') { echo "sup"; }  ?> class="symbol">+<?php if($symbolPosition == 'sub') { echo '</sub>';} elseif($symbolPosition == 'sup') { echo "</sup>"; } ?>
											</span>
									<?php } ?>
								</p>
							<?php } ?>
						<?php } ?>
						
						<?php if(!empty($skillset->skillset_title)) { ?>
							<p class="counter-title"><?php echo $skillset->skillset_title; ?></p>
						<?php }?>
						
						<?php if($numberPosition=='below'){ ?>
							<?php if(!empty($skillset->skillset_number)) { ?>
								<p class="counter-number text-primary d-flex justify-content-center justify-content-lg-start">
									<span class="count"><?php echo $skillset->skillset_number; ?></span>
									<?php 
										if(($skillset->skillset_enable_symbol)) { ?>
											<span><<?php if($symbolPosition == 'sub') { echo 'sub';} elseif($symbolPosition == 'sup') { echo "sup"; } else { echo 'span';}   ?> class="symbol">+<?php if($symbolPosition == 'sub') { echo '</sub>';} elseif($symbolPosition == 'sup') { echo "</sup>"; } else { '</span>'; } ?>
											</span>
									<?php } ?>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
            </div>
        </div>
    <?php endforeach; ?> 
</div>