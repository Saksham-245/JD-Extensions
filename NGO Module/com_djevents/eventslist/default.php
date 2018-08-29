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

$app = JFactory::getApplication();

$search = $app->input->get('search');
$category = $app->input->getInt('cid');
$city = $app->input->getInt('city');
$from = $app->input->get('from');
$to = $app->input->get('to');

$weekFrom = $from ? $from : JFactory::getDate()->format('Y-m-d');

$this->list_class = '';

echo DJEventsHelper::getModules('djevents-top');

?>
<?php if ($this->tag || !empty($search) || $category || $city || !empty($from) || !empty($to) || $this->params->get( 'show_page_heading', 1)) : ?>
<h1 id="sr" class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ) ?>"><?php 
	if($this->tag) {
		echo JText::sprintf('COM_DJEVENTS_TAG_FILTERING_HEADING', $this->tag->name);
		
	} else if(!empty($from) && !empty($to) && $from == $to) {

		echo JText::sprintf('COM_DJEVENTS_DAY_FILTERING_HEADING', JFactory::getDate($from)->format('l, d F Y'));
		
	} else if(!empty($search) || $category || $city || !empty($from) || !empty($to)) {

		echo JText::_('COM_DJEVENTS_SEARCH_FILTERING_HEADING');
		
	} else if($this->params->get( 'show_page_heading', 1)) {
		
		echo $this->escape($this->params->get('page_heading'));
	} ?>
</h1>
<?php endif; ?>

<div id="djevents" class="djev_list<?php echo $this->params->get( 'pageclass_sfx' ).' djev_theme_'.$this->params->get('theme','default') ?>">



<?php if(!empty($this->featured)) { 

	$this->list = $this->featured;
	$this->list_class = 'djev_items_featured';
	?>
	<h3><?php echo JText::_('COM_DJEVENTS_FEATURED_TOP_EVENTS_HEADING'); ?></h3>
	<?php
	echo $this->loadTemplate('items'); ?>
<?php } ?>

<?php 
	$this->list = $this->items;
	$this->list_class = '';
	?>
	<?php
	echo $this->loadTemplate('items'); ?>

<?php if ($this->pagination->total > 0) { ?>
<div class="djev_pagination pagination djev_clearfix">
<?php
	echo $this->pagination->getPagesLinks();
?>
</div>
<?php } ?>

</div>

<?php 
echo DJEventsHelper::getModules('djevents-bottom');
