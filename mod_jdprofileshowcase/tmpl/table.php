<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>
<div class="container py-5">
  <div class="jd-team-showcase-wrapper jd-table-layout-view jd-table-simple-layout">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <!-- Team Item wrapper start -->
          <div class="jd-team-table col-12">
            <table class="table table-striped">
              <tbody>
              <?php foreach($profiles as $profile) { ?>
                    <tr>
                    <th scope="team-mamber-image-wrapper">
                        <img src="<?php  echo $profile->image; ?>" alt="<?php  echo $profile->name; ?>">
                    </th>
                    <?php if($params->get('display_name')) { ?>
                      <td class="team-member-name"><span><?php  echo $profile->name; ?></span></td>
                    <?php } ?>  

                    <?php if($params->get('display_designation')) { ?>
                       <td class="team-member-designation"><i class="fas fa-stamp"></i> <?php  echo $profile->designation; ?></td>
                    <?php } ?>

                    <td class="team-member-address"><i class="fas fa-envelope"></i> <?php  echo $profile->email; ?> </td>
                    <?php if($params->get('show_Contact')) { ?>
                      <td class="team-member-email"><i class="fas fa-phone"></i> <?php  echo $profile->phone; ?></td>
                    <?php } ?>
                    </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- Team Item wrapper end -->
        </div>
      </div>
    </div>
  </div>
</div>