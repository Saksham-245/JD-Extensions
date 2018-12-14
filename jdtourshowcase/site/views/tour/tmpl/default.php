<?php
/**
 * @version    CVS: 1.0
 * @package    Com_Jdtoursshowcase
 * @author     JoomDev <info@gmail.com>
 * @copyright  2018 
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_jdtoursshowcase');

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_jdtoursshowcase'))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}

 $hits =	$this->item->hits;
$hits_one = $hits+1;
	
		JdtoursshowcaseHelpersJdtoursshowcase::hits($hits_one,$this->item->id);

?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_TOUR_TYPE'); ?></th>
			<td><?php echo $this->item->tour_type; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_TOUR_IMAGE'); ?></th>
			<td><?php echo $this->item->tour_image; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_PRICE'); ?></th>
			<td><?php echo $this->item->price; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_DISCOUNT_VALUE'); ?></th>
			<td><?php echo $this->item->discount_value; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_DURATION'); ?></th>
			<td><?php echo $this->item->duration; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_DESTINATION'); ?></th>
			<td><?php echo $this->item->destination; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_GALLERY'); ?></th>
			<td><?php echo $this->item->gallery; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_TOUR_DESCRIPTION'); ?></th>
			<td><?php echo nl2br($this->item->tour_description); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_FACILITIES_DESCRIPTION'); ?></th>
			<td><?php echo nl2br($this->item->facilities_description); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_FACILITIES_FEATURES'); ?></th>
			<td><?php echo $this->item->facilities_features; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_SCHEDULE_TITLE'); ?></th>
			<td><?php echo $this->item->schedule_title; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_SCHEDULE_DESCRIPTION'); ?></th>
			<td><?php echo nl2br($this->item->schedule_description); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_JDTOURSSHOWCASE_FORM_LBL_TOUR_HITS'); ?></th>
			<td><?php echo $hits_one; ?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&task=tour.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_JDTOURSSHOWCASE_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_jdtoursshowcase.tour.'.$this->item->id)) : ?>

	<a class="btn btn-danger" href="#deleteModal" role="button" data-toggle="modal">
		<?php echo JText::_("COM_JDTOURSSHOWCASE_DELETE_ITEM"); ?>
	</a>

	<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo JText::_('COM_JDTOURSSHOWCASE_DELETE_ITEM'); ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo JText::sprintf('COM_JDTOURSSHOWCASE_DELETE_CONFIRM', $this->item->id); ?></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&task=tour.remove&id=' . $this->item->id, false, 2); ?>" class="btn btn-danger">
				<?php echo JText::_('COM_JDTOURSSHOWCASE_DELETE_ITEM'); ?>
			</a>
		</div>
	</div>

<?php endif; ?>