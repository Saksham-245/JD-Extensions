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
	$doc->addStyleSheet('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
}
if($params->get('load_fontawesome', 1)){
	$doc->addStyleSheet('https://use.fontawesome.com/releases/v5.3.1/css/all.css');
}


class modJdCountdownHelper {
   
}
