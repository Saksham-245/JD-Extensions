<?php 
defined('_JEXEC') or die;
// Licensed under the GPL v3
$items = $displayData->get('items');
$params = $displayData->get('params');
$pagination = $displayData->get('pagination');
?>
<!-- Table Layout Start -->
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
	<table class="table table-striped" id="itemList">
		<tbody>
			<?php foreach ($items as $i => $item) : ?>
			<tr>
				<th scope="team-mamber-image-wrapper">
					<img src="<?php echo $item->image; ?>" alt="" width="7%">
				</th>
				<?php if($params->get('display_name',1)) { ?>
					<td class="team-member-name">
						<span>
							<a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $item->id); ?>">
								<?php echo $item->name; ?>
							</a>
						</span>
					</td>
				<?php } ?>

				<?php if($params->get('display_designation',1)) { ?>
					<td class="team-member-designation"><i class="fas fa-stamp"></i>
						<?php echo $item->designation; ?>
					</td>
				<?php } ?>
				<?php if($params->get('show_Contact',1)) { ?>
					<td class="team-member-address"><i class="fas fa-envelope"></i>
						<?php echo $item->email; ?>
					</td>
					<td class="team-member-email"><i class="fas fa-phone"></i>
						<?php echo $item->phone; ?>
					</td>
				<?php } ?>
			</tr>
			<?php endforeach; ?>
		<tbody>
	</table>
	<?php echo $pagination->getListFooter(); ?>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>
<!-- Table Layout End -->