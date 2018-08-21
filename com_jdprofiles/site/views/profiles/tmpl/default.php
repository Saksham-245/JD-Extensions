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
   
   JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
   JHtml::_('bootstrap.tooltip');
   JHtml::_('behavior.multiselect');
   JHtml::_('formbehavior.chosen', 'select');
   
   $user       = JFactory::getUser();
   $userId     = $user->get('id');
   $listOrder  = $this->state->get('list.ordering');
   $listDirn   = $this->state->get('list.direction');
   $canCreate  = $user->authorise('core.create', 'com_jdprofiles') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'profileform.xml');
   $canEdit    = $user->authorise('core.edit', 'com_jdprofiles') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'profileform.xml');
   $canCheckin = $user->authorise('core.manage', 'com_jdprofiles');
   $canChange  = $user->authorise('core.edit.state', 'com_jdprofiles');
   $canDelete  = $user->authorise('core.delete', 'com_jdprofiles');
   echo  $this->params->get('layout');
   ?>

  <section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-hover-layout">
        <div class="row">
          <div class="col-12">
          <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
   name="adminForm" id="adminForm">
            <div class="row jd-team-carousel-hover">
            <?php foreach ($this->items as $i => $item) : ?>
            
                <!-- Team Item wrapper start -->
                <div class="jd-team-columns col col-12 col-md-6 col-lg-3 d-flex">
                    <div class="card-team jd-team-items">
                        <img src="<?php echo  $item->image;?>" alt="<?php echo  $item->name;?>" class="team-mamber-image">
                        <h5 class="team-member-name team-member-name-overlay"><?php echo  $item->name;?></h5>
                        <!-- Team Member Name Overlay end-->
                        <div class="card-team-overlay">
                        <div class="team-member-content-wrapper">
                            <h5 class="team-member-name"><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>"><?php echo  $item->name;?></a></h5>
                            <p class="team-member-designation">
                            <small><?php echo  $item->designation;?></small>
                            </p>
                            <p class="team-member-bio">T<?php echo  $item->sbio;?>.</p>
                        </div>
                        <!-- Team Member Content Wrapper End -->
                        <div class="social-profile-wrapper">
                            <ul class="social-profile circle">
                            <?php  $socials=  json_decode($item->social);?>
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
                        <!-- Card Image overlay End -->
                    </div>
                    </div>
                <!-- Team Item wrapper end -->
                <?php endforeach; ?>
            </div>
            <?php echo $this->pagination->getListFooter(); ?>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>
          </div>
        </div>
      </div>
      <!-- End Jd Team Showcase wrapper -->
    </div>
  </section>