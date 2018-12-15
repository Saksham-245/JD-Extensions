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

$hits =	(!empty($this->item->hits)) ? $this->item->hits : 0 ;
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
			<th><?php echo JText::_('tour_schedule'); ?></th>
			<td><?php echo $this->item->tour_schedule; ?></td>
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

<?php $features = json_decode($this->item->facilities_features); ?>

	<?php  foreach($features as $feature) {?>
		<i class="<?php echo $feature->icon_class; ?>"></i><span><?php echo $feature->caption; ?></span>
	<?php } ?>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  		<?php $galleis = json_decode($this->item->gallery); ?>
  		
		<?php $i=1; foreach($galleis as $gallery) {?>
			<div class="carousel-item <?php echo ($i==1) ? 'active' : '' ?>">
				<img class="d-block w-100" src="<?php  echo $gallery->gallery_img; ?>" alt="First slide">
			</div>
		<?php $i++; } ?>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

	<?php $items_accordions = json_decode($this->item->tour_schedule); ?>
	<div class="accordion" id="accordionExample">
		<?php $i=1; foreach($items_accordions as $items_accordion) { ?>
		<div class="card">
			<div class="card-header" id="headingOne">
				<h4 class="mb-0">
				<button class="btn btn-link <?php echo ($i != 1) ? 'collapsed' : ''?>" type="button" data-toggle="collapse" data-target="#One<?php echo "accorddin".$i;?>" aria-expanded="true" aria-controls="collapseOne">
					<?php echo  $items_accordion->schedule_title;?>
				</button>
				</h4>
			</div>

			<?php if(!empty($items_accordion->schedule_desc)) {?>	
				<div id="One<?php echo "accorddin".$i;?>" class="collapse <?php echo ($i==1) ? 'show' : ''?>" aria-labelledby="headingOne" data-parent="#accordionExample">
			<?php if(!empty($items_accordion->schedule_desc)) {?> 
				<div class="card-body">
					<?php echo  $items_accordion->schedule_desc;?>
				</div>
			<?php } ?>  
				</div>
			<?php } ?>  
		</div>
			
		<?php $i++; } ?>
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