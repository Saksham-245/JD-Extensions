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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_jdtoursshowcase', JPATH_SITE);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/media/com_jdtoursshowcase/js/form.js');

$user    = JFactory::getUser();
$canEdit = JdtoursshowcaseHelpersJdtoursshowcase::canUserEdit($this->item, $user);


?>

<div class="tour-edit front-end-edit">
	<?php if (!$canEdit) : ?>
		<h3>
			<?php throw new Exception(JText::_('COM_JDTOURSSHOWCASE_ERROR_MESSAGE_NOT_AUTHORISED'), 403); ?>
		</h3>
	<?php else : ?>
		<?php if (!empty($this->item->id)): ?>
			<h1><?php echo JText::sprintf('COM_JDTOURSSHOWCASE_EDIT_ITEM_TITLE', $this->item->id); ?></h1>
		<?php else: ?>
			<h1><?php echo JText::_('COM_JDTOURSSHOWCASE_ADD_ITEM_TITLE'); ?></h1>
		<?php endif; ?>

		<form id="form-tour"
			  action="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&task=tour.save'); ?>"
			  method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
			
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<?php echo $this->form->renderField('title'); ?>

	<?php echo $this->form->renderField('tour_type'); ?>

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

				<?php echo $this->form->getInput('created_by'); ?>
				<?php echo $this->form->getInput('modified_by'); ?>
	<?php echo $this->form->renderField('tour_image'); ?>

	<?php echo $this->form->renderField('price'); ?>

	<?php echo $this->form->renderField('discount_value'); ?>

	<?php echo $this->form->renderField('duration'); ?>

	<?php echo $this->form->renderField('destination'); ?>

	<?php echo $this->form->renderField('gallery'); ?>

	<?php echo $this->form->renderField('tour_description'); ?>

	<?php echo $this->form->renderField('facilities_description'); ?>

	<?php echo $this->form->renderField('facilities_features'); ?>

	<?php echo $this->form->renderField('schedule_title'); ?>

	<?php echo $this->form->renderField('schedule_description'); ?>

	<?php echo $this->form->renderField('hits'); ?>

			<div class="control-group">
				<div class="controls">

					<?php if ($this->canSave): ?>
						<button type="submit" class="validate btn btn-primary">
							<?php echo JText::_('JSUBMIT'); ?>
						</button>
					<?php endif; ?>
					<a class="btn"
					   href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&task=tourform.cancel'); ?>"
					   title="<?php echo JText::_('JCANCEL'); ?>">
						<?php echo JText::_('JCANCEL'); ?>
					</a>
				</div>
			</div>

			<input type="hidden" name="option" value="com_jdtoursshowcase"/>
			<input type="hidden" name="task"
				   value="tourform.save"/>
			<?php echo JHtml::_('form.token'); ?>
		</form>
	<?php endif; ?>
</div>
