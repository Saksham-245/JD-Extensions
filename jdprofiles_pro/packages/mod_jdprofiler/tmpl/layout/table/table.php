<?php
defined('_JEXEC') or die;
// Licensed under the GPL v3
//echo "<pre>";
//print_r($profiles);
?>

<style>
.card-img-overlayteam-member-name{
  color:<?php echo  $params->get('NameColor',""); ?>;
}
.team-member-designation{
  color:<?php echo  $params->get('designationColor',""); ?>;
}
.card-img-overlayteam-member-bio{
  color:<?php echo  $params->get('shortBio',""); ?>;
}
 
</style>
<?php if(!empty($profiles)){ ?>
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
                  <?php if(!empty($profile->image)) { ?>
                      <th scope="team-mamber-image-wrapper">
                        <img src="<?php  echo $profile->image; ?>" alt="<?php  echo $profile->name; ?>">
                      </th>
                  <?php } ?>

                  <?php if($params->get('display_name',1)) { ?>
                      <?php if(!empty($profile->name)) { ?>
                        <td class="team-member-name">
                          <span class="name">
                            <?php if($params->get('enable_link',1)) { ?>
                                <a href="<?php echo JRoute::_('index.php?option=com_jdprofiler&view=profile&id='.(int) $profile->id); ?>"><?php  echo $profile->name; ?></a>
                            <?php }else{ ?>
                              <?php  echo $profile->name; ?>
                            <?php } ?>
                          </span>
                        </td>
                      <?php } ?>
                  <?php } ?>  

                  <?php if($params->get('display_designation',1)) { ?>
                      <?php if(!empty($profile->title)) { ?>
                        <td class="team-member-designation"><i class="fas fa-stamp"></i> <?php  echo $profile->title; ?></td>
                      <?php } ?> 
                  <?php } ?>

                  <?php if(!empty($profile->email)) { ?>
                      <td class="team-member-address"><i class="fas fa-envelope"></i> <?php  echo $profile->email; ?> </td>
                  <?php } ?>

                  <?php if($params->get('show_Contact',1)) { ?>
                      <?php if(!empty($profile->phone)) { ?>
                        <td class="team-member-email"><i class="fas fa-phone fa-rotate-90"></i> <?php  echo $profile->phone; ?></td>
                      <?php } ?>
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
<?php  }else{ ?>
   <div class="alert alert-warning">
    <strong>Warning!</strong> There is no profile in the list.
  </div>
<?php } ?>