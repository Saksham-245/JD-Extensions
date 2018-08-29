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

defined ('_JEXEC') or die('Restricted access'); ?>


<?php if (count($this->list) > 0){ ?>
	<div class="row pt-6 pb-1 <?php echo $this->list_class ?>">
		<?php foreach ($this->list as $item) { ?>
						<?php 
						$displayData = array('item' => $item, 'params' => $this->params);
						$layout = new JLayoutFile('com_djevents.event_time', null, array('component'=> 'com_djevents'));
							//echo $layout->render($displayData); 
						$start = JFactory::getDate($item->start);
						$end = JFactory::getDate($item->end);
						$year	=	 date_format($start,'Y');
						$month	=	 date_format($start,'M');
						$day	=	 date_format($start,'d');
						$start_t	=	 date_format($start,'h:i');
						$end_t	=	 date_format($end,'h:i');
						?>

			<div class="col-12 col-lg-6 pb-5">
				<div class="event-wrap">
					<div class="card rounded-0">
							<div class="event-date">
								<?php if(!empty($item->thumb)) { ?>
									<a href="<?php echo JRoute::_($item->link)?>">
										<img class="card-img-top rounded-0" src="<?php echo $item->thumb; ?>" alt="<?php echo $item->title; ?>">
									</a>
								<?php } ?>
								<div class="month-day text-center mb-3">
									<div class="month bg-white py-2 px-2" style="width: 80px;"><strong class="font-weight-bold"><?php echo $day;  ?></strong>
											<br><?php echo $month;  ?></div>
									<div class="day bg-primary text-white py-2 px-2" style="width: 80px;"><?php echo $year;  ?></div>
								</div>
							</div>
							<div class="card-body">
								<p class="m-0"><strong class="font-weight-bold">Organized By: </strong><?php $user = JFactory::getUser($item->created_by); echo $user->name; ?></p>
								<h5 class="card-title"><a href="<?php echo JRoute::_($item->link)?>"><?php echo $item->title; ?></a></h5>
							</div>
							<div class="time-zone row m-0">
								<div class="col border-top border-right d-flex justify-content-center">
									<p class="m-0 py-4"><strong class="text-primary">Time :</strong> <span class="font-weight-bold"><?php if($start_t){echo $start_t;  } ?> - <?php if($start_t){echo $end_t;  } ?></span></p>
								</div>
								<div class="col border-top d-flex justify-content-center">
									<p class="m-0 py-4"><strong class="text-primary">Location :</strong>
										<span class="font-weight-bold">
											<?php if(!empty($item->city_name) || $item->location) { ?>

													<?php echo (!empty($item->city_name) ? $item->city_name : $item->location) ?>
							
											<?php } ?>
										</span>
									</p>
								</div>
							</div>
					</div>
				</div>
			</div>
			
		<?php } ?>
	</div>
<?php } ?>
