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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user       = JFactory::getUser();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_jdtoursshowcase') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'tourform.xml');
$canEdit    = $user->authorise('core.edit', 'com_jdtoursshowcase') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'tourform.xml');
$canCheckin = $user->authorise('core.manage', 'com_jdtoursshowcase');
$canChange  = $user->authorise('core.edit.state', 'com_jdtoursshowcase');
$canDelete  = $user->authorise('core.delete', 'com_jdtoursshowcase');
$db = JFactory::getDbo();


?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
      name="adminForm" id="adminForm">

	<?php // echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
	<table class="table table-striped" id="tourList">
		<tfoot>
		<tr>
			<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
				<?php //echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
		</tfoot>
		<tbody>
		<div class="row">
		<?php foreach ($this->items as $i => $item) :  ?>
			<div class="col-lg-4 d-flex">
				<div class="card">
				<a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>">	<img src="<?php echo $item->tour_image; ?>" alt="top-destinations" class="card-img-top img-fluid"></a>
					<div class="card-body text-center">
							<a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>">
								<h5 class="card-title"></h5>
									<?php echo $this->escape($item->title); ?>
								</h5>
							</a>
							
							<p class="card-text"><b>
							$<?php
								if($item->show_discount){
									if($item->discount_type=="percentage"){
										echo "<br>";	
										echo '%'.$item->percentage;
										echo "<br>";	
										$percentage =  (($item->price*$item->percentage)/100);
										echo '$'.$price =  ($item->price - $percentage);
										
									}elseif($item->discount_type=="fixed_amount"){
										echo "<br>";	
										echo 'Flat '.$item->fixed_amount.' Off';
										echo "<br>";
										$fixed_amount = $item->fixed_amount;
										echo '$'.$price = ($item->price - $fixed_amount);
									}
								}
							?>
							</b> <?php  if($item->show_discount){ ?>   <del>$<?php echo  $item->price; ?></del><br> <?php }  ?>
							</b> <?php  if(!$item->show_discount){ ?>  $<?php echo  $item->price; ?><br> <?php }  ?>
								<?php if(!empty($item->price_postfix)) { ?>
									<span class="text-muted"><?php echo $item->price_postfix; ?></span>
									<span class="text-muted"><?php echo $item->tour_type; ?></span>
								<?php } ?>
							</p>
							<p class="card-text">
									<?php $features = json_decode($item->feature); foreach($features as $feature){ ?>
										<i class="<?php echo $feature->icon_class; ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $feature->tool_tip; ?>" aria-hidden="true"></i>
									<?php } ?>
							</p>		
							<hr>
							<a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&view=tour&id='.(int) $item->id); ?>" class="top-destinations-see-more">
								<b>See More <i class="fa fa-angle-right" aria-hidden="true"></i></b>
							</a>
					</div>
				</div>
			</div>
		
				<?php $canEdit = $user->authorise('core.edit', 'com_jdtoursshowcase'); ?>

				<?php if (!$canEdit && $user->authorise('core.edit.own', 'com_jdtoursshowcase')): ?>
					<?php $canEdit = JFactory::getUser()->id == $item->created_by; ?>
				<?php endif; ?>

		<?php endforeach; ?>
		<div class="col-12">
			 <?php //echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?> <?php echo $this->pagination->getListFooter(); ?>
		</div>
		</tbody>
		</div>
	</table>

	<?php if ($canCreate) : ?>
		<a href="<?php echo JRoute::_('index.php?option=com_jdtoursshowcase&task=tourform.edit&id=0', false, 0); ?>"
		   class="btn btn-success btn-small"><i
				class="icon-plus"></i>
			<?php echo JText::_('COM_JDTOURSSHOWCASE_ADD_ITEM'); ?></a>
	<?php endif; ?>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>





<?php if($canDelete) : ?>
<script type="text/javascript">

	jQuery(document).ready(function () {
		jQuery('.delete-button').click(deleteItem);
	});

	function deleteItem() {

		if (!confirm("<?php echo JText::_('COM_JDTOURSSHOWCASE_DELETE_MESSAGE'); ?>")) {
			return false;
		}
	}
</script>
<?php endif; ?>
