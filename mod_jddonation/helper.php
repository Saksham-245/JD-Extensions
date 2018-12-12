<?php

/**
 * Helper class for Jd CountDown! module
 * @package     JD CountDown
 * @copyright   Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;
// Style Sheet
$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'media/mod_jdcountdown/css/mod_jdcountdown.css');
if($params->get('load_bootstrap', 1)){
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Satisfy');
}
class modJdCountdownHelper {
   
}
