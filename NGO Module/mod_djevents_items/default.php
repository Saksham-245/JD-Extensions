<?php
/**
 * @package DJ-Events
 * @copyright Copyright (C) DJ-Extensions.com, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 */

// no direct access
defined('_JEXEC') or die ('Restricted access');

$cols = (int)$params->get('columns', 1);
$width = intval(12 / $cols);
?>

<div class="row">
	<?php foreach ($items as $key => $item) { ?>
		<?php if($params->get('time', 1)) {	
				$start = JFactory::getDate($item->start);
				$end = JFactory::getDate($item->end);
				$year	=	 date_format($start,'Y');
				$month	=	 date_format($start,'M');
				$day	=	 date_format($start,'d');
				$start_t	=	 date_format($start,'h:i');
				$end_t	=	 date_format($end,'h:i');
			} ?>
		<div class="col-12 col-lg-<?php echo $width ?> pt-5">
			<div class="event-wrap">
				<div class="card rounded-0">
						<div class="event-date">
							<?php if($params->get('image', 1) && !empty($item->thumb)) { ?>
								<a href="<?php echo JRoute::_($item->link)?>">	
									<img class="card-img-top rounded-0" src="<?php echo $item->thumb; ?>" alt="<?php echo $item->title; ?>">
								</a>
							<?php } ?>
							<div class="month-day text-center mb-3">
								<div class="month bg-white py-2 px-2" style="width: 80px;"><strong class="font-weight-bold"><?php echo $day;  ?></strong>
										<br><?php echo $month;  ?></div>
								<div class="day bg-primary text-white py-2 px-2" style="width: 80px;"><?php echo $year;  ?></div>

								<?php if($params->get('category', 1)) {$category = $categories[$item->cat_id]; ?>
									<a href="<?php echo JRoute::_(DJEventsHelperRoute::getEventsListRoute().'&cid='.$item->cat_id)?>" class="djev_category" style="<?php echo $category->style ?>">
									<?php if($category->icon_type == 'fa') { ?>
										<span class="<?php echo $category->fa_icon ?>" aria-hidden="true"></span>
									<?php } else if($category->icon_type == 'image') { ?>
										<img src="<?php echo JURI::root(true).'/'.$category->image_icon ?>" alt="" />
									<?php } ?>
										<span><?php echo $item->category_name ?></span>
									</a>
									<?php } ?>
							</div>
						</div>
						<div class="card-body">
							<p class="m-0"><strong class="font-weight-bold">Organized By: </strong><?php $user = JFactory::getUser($item->created_by); echo $user->name; ?></p>
							<?php if($params->get('title', 1)) { ?>
								<h5 class="card-title"><a href="<?php echo JRoute::_($item->link)?>"><?php echo JHtml::_('string.truncate', $item->title, $params->get('title_limit', 50), true, false); ?></a></h5>
							<?php } ?>
						</div>
						<div class="time-zone row m-0">
							<div class="col border-top border-right d-flex justify-content-center">
								<p class="m-0 py-4"><strong class="text-primary">Time :</strong> <span class="font-weight-bold"><?php if($start_t){echo $start_t;  } ?> - <?php if($start_t){echo $end_t;  } ?></span></p>
							</div>
							<?php if($params->get('city', 1) && (!empty($item->city_name) || $item->location)) { ?>
								<div class="col border-top d-flex justify-content-center">
									<p class="m-0 py-4"><strong class="text-primary">Location :</strong>
										<span class="font-weight-bold">
											<?php echo (!empty($item->city_name) ? $item->city_name : $item->location) ?>
										</span>
									</p>
								</div>
							<?php } ?>
							<?php if($params->get('show_link')) { ?>
								<div class="col border-top d-flex justify-content-center">
									<p class="m-0 py-4"><strong class="text-primary">All :</strong>	
									<span class="font-weight-bold">
											<a href="<?php echo JRoute::_(DJEventsHelperRoute::getEventsListRoute()); ?>"><?php echo JText::_('MOD_DJEVENTS_ITEMS_SHOW_ALL') ?></a>
										</p>
									</span>
								</div>
							<?php } ?>	
						</div>
				</div>
				<?php if($params->get('readmore', 1)) { ?>
               <div class="djev_readmore">
                  <a href="<?php echo $item->link ?>" class="btn btn-primary"><?php echo JText::_('MOD_DJEVENTS_ITEMS_READMORE') ?></a>
               </div>
				<?php } ?>
            <?php if($params->get('intro', 1) && !empty($item->intro)) { ?>
               <div class="djev_intro">
                  <?php echo JHtml::_('string.truncate', $item->intro, $params->get('intro_limit', 100), true, true); ?>
               </div>
            <?php } ?>
			</div>
		</div>
	<?php } ?>
</div>