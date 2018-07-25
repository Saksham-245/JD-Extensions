<?php

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$jinput = $app->input;
$menuId = $jinput->get('Itemid', 0, 'INT');


$menu = $app->getMenu();
$item = $menu->getItem($menuId);
if (empty($item)) {
   return;
}
$params = new JRegistry();
$params->loadString($item->params);

$show_title = $params->get('show_page_heading');
if ($show_title) {
   if (!empty($params->get('page_heading'))) {
      echo '<h3 class="text-white">' . $params->get('page_heading') . '</h3>';
   } else {
      echo '<h3 class="text-white">' . $item->title . '</h3>';
   }
}
?>
