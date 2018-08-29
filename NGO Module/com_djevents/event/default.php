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

defined ('_JEXEC') or die('Restricted access'); 
$user		= JFactory::getUser();
$edit_auth = ($user->authorise('core.edit', 'com_djevents') || ($user->authorise('event.edit.own', 'com_djevents') && $user->id == $this->item->created_by)) ? true : false;

$nullDate = JFactory::getDbo()->getNullDate();
?>

<div id="djevents" class="djev_clearfix djev_event<?php echo $this->params->get( 'pageclass_sfx' ).' djev_theme_'.$this->params->get('theme','default'); if ($this->item->featured == 1) echo ' featured_item'; ?>">
    
    <?php 
    $displayData = array('item' => $this->item, 'params' => $this->params);
    $layout = new JLayoutFile('com_djevents.event_time', null, array('component'=> 'com_djevents'));

    //echo $layout->render($displayData); 
    $start  = JFactory::getDate($this->item->start);
    $end = JFactory::getDate($this->item->end);
    $year	=	 date_format($start,'Y');
    $month	=	 date_format($start,'M');
    $day	=	 date_format($start,'d');
    $start_t	=	 date_format($start,'h:i');
    $end_t	=	 date_format($end,'h:i');
                
    ?>
    <div class="container">
    <div class="row py-6 py-lg-6 py-xl-6">
        <!--Events Img-->
        <div class="event-wrap">
            <div class="card rounded-0">
                <div class="event-date">
                    <?php if (!empty($this->images)){  $image = $this->images[0]; ?>
                        <img src="<?php echo $this->item->thumb; ?>" class="card-img-top rounded-0"  src="images/events/img-3.jpg" alt="<?php echo $this->item->title; ?>">
                    <?php } ?>
            
                    <div class="month-day text-center mb-3">
                        <div class="month bg-white py-2 px-2" style="width: 80px;"><strong><?php echo $day; ?></strong>
                            <br><?php echo $month; ?></div>
                        <div class="day bg-primary text-white py-2 px-2" style="width: 80px;"><?php echo $year; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Events Img-->
    </div>
    <!--End Row-->
    <div class="row pb-5">
        <div class="col-12 col-lg-8">
                <h3 class="title-heading"><?php echo $this->item->title; ?></h3>
                <p>
                    <?php echo JHTML::_('content.prepare', $this->item->intro); ?>
                </p>
                <!--<a href="<?php echo JRoute::_(DJEventsHelperRoute::getEventsListRoute().'&cid='.$this->item->cat_id)?>" class="djev_category" style="<?php echo $this->item->category_style ?>">
                    <?php if($this->item->icon_type == 'fa') { ?>
                        <span class="<?php echo $this->item->fa_icon ?>" aria-hidden="true"></span>
                    <?php } else if($this->item->icon_type == 'image') { ?>
                        <img src="<?php echo JURI::root(true).'/'.$this->item->image_icon ?>" alt="" />
                    <?php } ?>
                    <span><?php echo $this->item->category_name ?></span>

                </a>-->

                <?php echo JHTML::_('content.prepare', $this->item->description); ?>  
                <?php if(!empty($this->tags)) { ?>
                    <div class="djev_tags mt-6">
                        <div class="djev_tags_label muted float-left mr-3 font-weight-bold"><?php echo JText::_('COM_DJEVENTS_TAGS') ?>:</div>
                        <?php foreach($this->tags as $tag) { ?>
                            <a class="djev_tag mr-3" href="<?php echo JRoute::_(DJEventsHelperRoute::getEventsListRoute().'&tag='.$tag->id.':'.$tag->alias); ?>"><?php echo $tag->name ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>     
            </div>
        <!--Left Col-->
        <div class="col-12 col-lg-4 pt-5 pt-lg-0 pt-xl-0">
            <div class="row border p-2">
                <div class="w-100 text-left py-3">
                            <h4 class="title-heading-two"> <?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_DETAILS' ); ?></h4>
                        </div><table class="table table-border">
                        
                        <tbody>
                            <tr>
                                <th scope="row" class="px-0"><?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_ORGANIZEDBY' ); ?></th>
                                <td class="text-left"><?php $user = JFactory::getUser($this->item->created_by); echo $user->name; ?></td>
                            </tr>
                            <?php if(!empty($this->item->price)) { ?>
                                <tr>
                                    <th scope="row" class="px-0"> <?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_PRICE' ); ?></th>
                                    <td class="text-left"><?php echo nl2br($this->item->price) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row" class="px-0"><?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_START' ); ?></th>
                                <td class="text-left"><?php echo $start; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-0"><?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_END' ); ?></th>
                                <td class="text-left"><?php echo $end; ?></td>
                            </tr>
                            <?php if(!empty($this->item->location)) { ?>
                                <tr>
                                    <th scope="row" class="px-0">Location  : <?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_LOCATION' ); ?></th>
                                    <td class="text-left"><?php echo $this->item->location ? $this->item->location.'<br />':'' ?></td>
                                </tr>
                            <?php } ?>
                
                            <?php if(!empty($this->item->city_name)) { ?>
                                <tr>
                                    <th scope="row" class="px-0"><?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_CITY' ); ?></th>
                                    <td class="text-left"><?php echo $this->item->city_name ?></td>
                                </tr>
                            <?php } ?>
                            <?php if(!empty($this->item->address)) { ?>
                                <tr>
                                    <th scope="row" class="px-0"><?php echo JText::_( 'TPL_JDDESIRE_DJEVENT_ADDRESS' ); ?></th>
                                    <td class="text-left"><?php echo $this->item->address ? $this->item->address.'<br />':'' ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row" class="px-0"></th>
                                <td class="text-left"></td>  
                            </tr>				                  
                        </tbody>
                </table>
                <?php if(!empty($this->item->external_url)) { ?>
                    <div class="col text-center pb-4">
                        <a href="<?php echo $this->item->external_url ?>"  class="btn jd btn-outline-primary" target="_blank"><?php echo JText::_('TPL_JDDESIRE_DJEVENT_BUTTON') ?></a>
                    </div>
                <?php } ?>
            </div>
            <div class="row text-center py-5">
                </iframe>
                <?php if($this->item->latitude!='0.000000000000000' && $this->item->longitude!='0.000000000000000'){ ?>
                    <div id="gmap" style="width: 100%; height: 300px"></div>
                    <script type="text/javascript">
                        jQuery(window).load(function(){
                            var adLatlng = new google.maps.LatLng(<?php echo $this->item->latitude.','.$this->item->longitude; ?>);
                            var MapOptions = {
                                zoom: <?php echo $this->item->zoom; ?>,
                                center: adLatlng,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                navigationControl: true,
                                scrollwheel: false
                            };
                            var map = new google.maps.Map(document.getElementById("gmap"), MapOptions);

                            var markerOptions = {
                                position: adLatlng,
                                map: map,
                                disableAutoPan: false,
                                animation: google.maps.Animation.DROP,
                                draggable: false
                            };
                            var marker = new google.maps.Marker(markerOptions);
                        });
                    </script>
                <?php } ?>
            </div>
        </div>
        <!--Right Col-->
    </div>
</div>
	
</div>
