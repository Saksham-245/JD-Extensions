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
    $this->params->get('layout');

   ?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
   name="adminForm" id="adminForm">
   <?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
   <table class="table table-striped" id="profileList">
      <tbody>
	  <?php foreach ($this->items as $i => $item) : ?>
	  <?php $canEdit = $user->authorise('core.edit', 'com_jdprofiles'); ?>
         <tr>
			<th scope="team-mamber-image-wrapper">
				<img src="<?php echo $item->image; ?>" alt="" width="7%">
			</th>
			<td class="team-member-name">
				<span><a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>"><?php echo $item->name; ?></a></span>
			</td>
			<td class="team-member-designation"><i class="fas fa-stamp"></i><?php echo $item->designation; ?></td>
			<td class="team-member-address"><i class="fas fa-envelope"></i> <?php echo $item->email; ?></td>
			<td class="team-member-email"><i class="fas fa-phone"></i> <?php echo $item->phone; ?></td>
        </tr>
		<?php endforeach; ?>
      <tbody>
      </tbody>
   </table>

   <?php echo $this->pagination->getListFooter(); ?>

   <input type="hidden" name="task" value=""/>
   <input type="hidden" name="boxchecked" value="0"/>
   <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
   <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
   <?php echo JHtml::_('form.token'); ?>
</form>