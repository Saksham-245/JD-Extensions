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
                    <td class="team-member-name">
                        <span><?php  echo $profile->name; ?></span>
                    </td>
                    <td class="team-member-designation"><i class="fas fa-stamp"></i> <?php  echo $profile->designation; ?></td>
                    <td class="team-member-address"><i class="fas fa-envelope"></i> <?php  echo $profile->email; ?> </td>
                    <td class="team-member-email"><i class="fas fa-phone"></i> <?php  echo $profile->phone; ?></td>
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