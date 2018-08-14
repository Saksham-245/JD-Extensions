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

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_NAME'); ?></th>
			<td><?php echo $this->item->name; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_ALIAS'); ?></th>
			<td><?php echo $this->item->alias; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_EMAIL'); ?></th>
			<td><?php echo $this->item->email; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_PHONE'); ?></th>
			<td><?php echo $this->item->phone; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_DESIGNATION'); ?></th>
			<td><?php echo $this->item->designation; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_IMAGE'); ?></th>
			<td><?php echo $this->item->image; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_SBIO'); ?></th>
			<td><?php echo nl2br($this->item->sbio); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_LBIO'); ?></th>
			<td><?php echo nl2br($this->item->lbio); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_TEAM'); ?></th>
			<td><?php echo $this->item->team; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_LOCATION'); ?></th>
			<td><?php echo $this->item->location; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_SOCIAL'); ?></th>
			<td><?php echo $this->item->social; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_SKILLS'); ?></th>
			<td><?php echo $this->item->skills; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDPROFILES_FORM_LBL_PROFILE_DETAILS'); ?></th>
			<td><?php echo nl2br($this->item->details); ?></td>
		</tr>

	</table>

</div>

